<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use App\Models\AttendanceModel;
use App\Models\PresenceModel;
use App\Models\PresenceUserModel;
use CodeIgniter\I18n\Time;

class AttendanceFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $attendanceModel = new AttendanceModel();
        $presenceModel = new PresenceModel();
        $presenceUserModel = new PresenceUserModel();

        $currentTime = Time::now();
        $today = $currentTime->toDateString();

        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $users = $builder->select('id')->get()->getResultArray();

        foreach ($users as $user) {
            $userId = $user['id'];

            $alreadyCheckedIn = $attendanceModel
                ->where('user_id', $userId)
                ->where('status', 'Masuk')
                ->where('DATE(created_at)', $today)
                ->first();

            $alreadyCheckedOut = $attendanceModel
                ->where('user_id', $userId)
                ->where('status', 'Pulang')
                ->where('DATE(created_at)', $today)
                ->first();

            $alreadyCheckedLate = $attendanceModel
                ->where('user_id', $userId)
                ->where('status', 'Terlambat')
                ->where('DATE(created_at)', $today)
                ->first();

            $alreadyLost = $attendanceModel
                ->where('user_id', $userId)
                ->where('status', 'Tidak Masuk')
                ->where('DATE(created_at)', $today)
                ->first();

            $presenceUser = $presenceUserModel->where('user_id', $userId)->first();
            if (!$presenceUser) {
                continue;
            }

            $setting = $presenceModel->where('id', $presenceUser['presence_id'])->first();
            if (!$setting) {
                continue;
            }

            $maxEndTime = Time::parse($setting['max_end_time']);

            if ($currentTime->isAfter($maxEndTime) && !$alreadyCheckedIn && !$alreadyCheckedOut && !$alreadyCheckedLate && !$alreadyLost) {
                $data = [
                    'presence_id' => $setting['id'],
                    'user_id' => $userId,
                    'status' => 'Tidak Masuk',
                    'entry_time' => null,
                    'exit_time' => null,
                    'deduction' => 100000,
                ];

                $attendanceModel->save($data);
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here if needed
    }
}
