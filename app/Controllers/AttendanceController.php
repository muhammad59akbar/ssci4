<?php

namespace App\Controllers;

use CodeIgniter\I18n\Time;
use App\Models\PresenceModel;
use App\Models\AttendanceModel;
use App\Models\PresenceUserModel;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class AttendanceController extends BaseController
{
    protected $attendanceModel;
    protected $presenceModel;
    protected $presenceUserModel;

    public function __construct()
    {
        $this->attendanceModel = new AttendanceModel();
        $this->presenceModel = new PresenceModel();
        $this->presenceUserModel = new PresenceUserModel();
    }

    public function index()
    {

        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $userId = user_id();

        $builder->select('users.id as userid, username, email, fullname, auth_groups.name as jabatan');
        $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $builder->where('users.id', $userId);
        $query = $builder->get();

        $data['user'] = $query->getRow();

        $attendanceBuilder = $db->table('attendances');
        $attendanceBuilder->select('attendances.*, users.username, users.fullname, presences.company_name as company_name');
        $attendanceBuilder->join('users', 'users.id = attendances.user_id');
        $attendanceBuilder->join('presences', 'presences.id = attendances.presence_id');

        if (in_array($this->userGroup, ['Admin', 'Direktur'])) {
            $data['attendances'] = $attendanceBuilder->get()->getResult();
        } else {
            $attendanceBuilder->where('attendances.user_id', $userId);
            $data['attendances'] = $attendanceBuilder->get()->getResult();
        }

        $data['userGroup'] = $this->userGroup;
        $data['title'] = 'Absensi';
        return view('MyCorpec/AttendanceIndex', $data);
    }

    public function create()
    {
        $validasiInput = session()->getFlashdata('validate');

        $data =
            [
                'title' => 'Ambil Absen',
                'validate' => $validasiInput,
                'userGroup' => $this->userGroup
            ];
        return view('MyCorpec/Attendance', $data);
    }

    public function store()
    {
        if (
            !$this->validate([
                'location' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} must be filled in.',
                    ]
                ],
                'photo' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Selected the image first',
                    ]
                ],
            ])
        ) {
            return redirect()->back()->withInput()->with('validate', $this->validator->getErrors());
        }

        $photo = $this->request->getPost('photo');
        $location = $this->request->getPost('location');
        $latitude = $this->request->getPost('latitude');
        $longitude = $this->request->getPost('longitude');
        $userId = user_id();
        $currentTime = Time::now();
        $today = $currentTime->toDateString();

        $alreadyCheckedIn = $this->attendanceModel
            ->where('user_id', $userId)
            ->where('DATE(entry_time)', $today)
            ->where('DATE(created_at)', $today)
            ->first();

        $alreadyCheckedOut = $this->attendanceModel
            ->where('user_id', $userId)
            ->where('DATE(exit_time)', $today)
            ->where('DATE(created_at)', $today)
            ->first();



        $presenceUser = $this->presenceUserModel->where('user_id', $userId)->first();
        if (!$presenceUser) {
            session()->setFlashdata('error', 'Anda Belum Bisa Melakukan Absen Saat Ini');
            return redirect()->to('/MyCorp/attendance');
        }
        $setting = $this->presenceModel->where('id', $presenceUser['presence_id'])->first();
        // $setting = $this->presenceModel->first();

        $startTime = Time::parse($setting['start_time']);
        $maxStartTime = Time::parse($setting['max_start_time']);
        $endTime = Time::parse($setting['end_time']);
        $maxEndTime = Time::parse($setting['max_end_time']);
        $parts = explode(',', $setting['location']);
        $centerLat = (float) trim($parts[0]);
        $centerLng = (float) trim($parts[1]);
        $radius = 10;

        if ($currentTime->isAfter($startTime) && $currentTime->isBefore($maxStartTime)) {
            if ($alreadyCheckedIn) {
                session()->setFlashdata('error', 'Anda sudah melakukan absen masuk hari ini');
                return redirect()->to('/MyCorp/attendance');
            }
        } else if ($currentTime->isAfter($maxStartTime) && $currentTime->isBefore($endTime)) {
            if ($alreadyCheckedIn) {
                session()->setFlashdata('error', 'Anda sudah melakukan absen masuk hari ini');
                return redirect()->to('/MyCorp/attendance');
            }
        } else if ($currentTime->isAfter($endTime) && $currentTime->isBefore($maxEndTime)) {
            if ($alreadyCheckedOut) {
                session()->setFlashdata('error', 'Anda sudah melakukan absen pulang hari ini');
                return redirect()->to('/MyCorp/attendance');
            }
        }

        $distance = $this->haversine($centerLat, $centerLng, $latitude, $longitude);

        if ($distance <= $radius) {
            $photo = $_POST['photo'];
            list($type, $photo) = explode(';', $photo);
            list(, $photo) = explode(',', $photo);
            $photo = base64_decode($photo);
            $photoName = uniqid() . '.jpg';
            file_put_contents('assets/images/absen/' . $photoName, $photo);

            if ($currentTime->isAfter($maxEndTime) || $currentTime->isBefore($startTime)) {
                session()->setFlashdata('error', 'Anda Tidak Bisa Melakukan Absen Saat Ini');
                return redirect()->to('/MyCorp/attendance');
            }

            $status = 'Masuk';
            $deduction = 0;
            $entry = NULL;
            $exit = NULL;

            if ($currentTime->isAfter($startTime) && $currentTime->isBefore($maxStartTime)) {
                $entry = Time::now();
            }

            if ($currentTime->isAfter($maxStartTime)) {
                $status = 'Terlambat';
                $minutesLate = $currentTime->difference($maxStartTime)->getMinutes();
                $deduction = ceil($minutesLate / 10) * 10000;
                $entry = Time::now();
            }

            if ($currentTime->isAfter($endTime) && $currentTime->isBefore($maxEndTime)) {
                $status = 'Pulang';
                $deduction = 0;
                $exit = Time::now();
            }


            $data = [
                'presence_id' => $setting['id'],
                'user_id' => $userId,
                'photo' => $photoName,
                'location' => $location,
                'status' => $status,
                'deduction' => $deduction,
                'entry_time' => $entry,
                'exit_time' => $exit,
            ];

            $this->attendanceModel->save($data);

            session()->setFlashdata('message', 'Absensi berhasil dilakukan');
            return redirect()->to('/MyCorp/attendance');
        } else {
            session()->setFlashdata('error', 'Anda berada di luar radius absen yang diizinkan');
            return redirect()->to('/MyCorp/attendance');
        }
    }



    private function haversine($centerLat, $centerLng, $absenLat, $absenLng)
    {
        $earthRadius = 6371;

        $deltaLat = deg2rad($absenLat - $centerLat);
        $deltaLng = deg2rad($absenLng - $centerLng);

        $a = sin($deltaLat / 2) * sin($deltaLat / 2) +
            cos(deg2rad($centerLat)) * cos(deg2rad($absenLat)) *
            sin($deltaLng / 2) * sin($deltaLng / 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        $distance = $earthRadius * $c;

        return $distance;
    }

    public function masuk()
    {

        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $userId = user_id();

        $builder->select('users.id as userid, username, email, fullname, auth_groups.name as jabatan');
        $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $builder->where('users.id', $userId);
        $query = $builder->get();

        $data['user'] = $query->getRow();

        $attendanceBuilder = $db->table('attendances');
        $attendanceBuilder->select('attendances.*, users.username, users.fullname, presences.company_name as company_name');
        $attendanceBuilder->join('users', 'users.id = attendances.user_id');
        $attendanceBuilder->join('presences', 'presences.id = attendances.presence_id');
        $attendanceBuilder->where('attendances.status', 'Masuk');

        if (in_array($this->userGroup, ['Admin', 'Direktur'])) {
            $data['attendances'] = $attendanceBuilder->get()->getResult();
        } else {
            $attendanceBuilder->where('attendances.user_id', $userId);
            $data['attendances'] = $attendanceBuilder->get()->getResult();
        }



        $data['userGroup'] = $this->userGroup;
        $data['title'] = 'Data Absensi Kehadiran';
        return view('MyCorpec/AttendanceMasuk', $data);
    }
    public function terlambat()
    {

        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $userId = user_id();

        $builder->select('users.id as userid, username, email, fullname, auth_groups.name as jabatan');
        $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $builder->where('users.id', $userId);
        $query = $builder->get();

        $data['user'] = $query->getRow();

        $attendanceBuilder = $db->table('attendances');
        $attendanceBuilder->select('attendances.*, users.username, users.fullname, presences.company_name as company_name');
        $attendanceBuilder->join('users', 'users.id = attendances.user_id');
        $attendanceBuilder->join('presences', 'presences.id = attendances.presence_id');
        $attendanceBuilder->where('attendances.status', 'Terlambat');
        if (in_array($this->userGroup, ['Admin', 'Direktur'])) {
            $data['attendances'] = $attendanceBuilder->get()->getResult();
        } else {
            $attendanceBuilder->where('attendances.user_id', $userId);
            $data['attendances'] = $attendanceBuilder->get()->getResult();
        }


        $data['userGroup'] = $this->userGroup;
        $data['title'] = 'Data Absensi Terlambat';
        return view('MyCorpec/AttendanceTerlambat', $data);
    }
    public function alpha()
    {

        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $userId = user_id();
        $builder->select('users.id as userid, username, email, fullname, auth_groups.name as jabatan');
        $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $builder->where('users.id', $userId);
        $query = $builder->get();

        $data['user'] = $query->getRow();

        $attendanceBuilder = $db->table('attendances');
        $attendanceBuilder->select('attendances.*, users.username, users.fullname, presences.company_name as company_name');
        $attendanceBuilder->join('users', 'users.id = attendances.user_id');
        $attendanceBuilder->join('presences', 'presences.id = attendances.presence_id');
        $attendanceBuilder->where('attendances.status', 'Tidak Masuk');
        if (in_array($this->userGroup, ['Admin', 'Direktur'])) {
            $data['attendances'] = $attendanceBuilder->get()->getResult();
        } else {
            $attendanceBuilder->where('attendances.user_id', $userId);
            $data['attendances'] = $attendanceBuilder->get()->getResult();
        }


        $data['userGroup'] = $this->userGroup;
        $data['title'] = 'Data Absensi Tidak Masuk';
        return view('MyCorpec/AttendanceAlpha', $data);
    }
}
