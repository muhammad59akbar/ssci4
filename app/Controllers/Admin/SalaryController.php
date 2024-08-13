<?php

namespace App\Controllers\Admin;

use Myth\Auth\Models\UserModel;
use CodeIgniter\I18n\Time;
use App\Models\SalaryModel;
use App\Models\PresenceModel;
use App\Models\AttendanceModel;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class SalaryController extends BaseController
{
    protected $userModel;
    protected $attendanceModel;
    protected $presenceModel;
    protected $salaryModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->presenceModel = new PresenceModel();
        $this->attendanceModel = new AttendanceModel();
        $this->salaryModel = new SalaryModel();
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

        $salaryBuilder = $db->table('salaries');
        $salaryBuilder->select('salaries.*, users.username, users.fullname');
        $salaryBuilder->join('users', 'users.id = salaries.user_id');

        if (in_array($this->userGroup, ['Admin', 'Direktur'])) {
            $data['salaries'] = $salaryBuilder->get()->getResult();
        } else {
            $salaryBuilder->where('salaries.user_id', $userId);
            $data['salaries'] = $salaryBuilder->get()->getResult();
        }

        $data['userGroup'] = $this->userGroup;
        $data['title'] = 'Gaji';

        return view('MyCorpec/SalaryIndex', $data);
    }

    public function create()
    {
        $validasiInput = session()->getFlashdata('validate');

        if (in_array($this->userGroup, ['Admin', 'Mandor', 'Teknisi'])) {
            return redirect()->to('/MyCorpec/Dashboard');
        }

        $data['userGroup'] = $this->userGroup;
        $data['users'] = $this->userModel
            ->join('auth_groups_users', 'auth_groups_users.user_id = users.id')
            ->whereNotIn('auth_groups_users.group_id', [1])
            ->findAll();

        $data['title'] = 'Tambah Gaji';
        $data['validate'] = $validasiInput;
        return view('MyCorpec/SalaryCreate', $data);
    }

    public function store()
    {
        if (
            !$this->validate([

                'user_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} must be filled in.',
                    ]
                ],
                'total_salary' => [
                    'rules' => 'required|numeric',
                    'errors' => [
                        'required' => '{field} must be filled in.',
                        'numeric' => '{field} must be a number.',
                    ]
                ],
                'transfer_photo' => [
                    'rules' => 'uploaded[transfer_photo]|max_size[transfer_photo,2048]|is_image[transfer_photo]',
                    'errors' => [
                        'uploaded' => 'Selected the image first',
                        'max_size' => 'this file very big',
                        'is_image' => 'this is not image',
                    ]
                ],
                'note' => 'permit_empty|string',
            ])
        ) {
            $validasiInput = \Config\Services::validation()->getErrors();
            return redirect()->back()->withInput()->with('validate', $validasiInput);
        }

        $userId = $this->request->getPost('user_id');
        $totalSalary = $this->request->getPost('total_salary');
        $note = $this->request->getPost('note');
        $transferPhoto = $this->request->getFile('transfer_photo');

        $photoName = $transferPhoto->getRandomName();
        $transferPhoto->move('assets/images/transfers/', $photoName);

        $deductions = $this->attendanceModel->where('user_id', $userId)->selectSum('deduction')->get()->getRow()->deduction;

        $data = [
            'user_id' => $userId,
            'total_salary' => $totalSalary,
            'deduction' => $deductions ?? 0,
            'transfer_photo' => $photoName,
            'transfer_date' => Time::now(),
            'note' => $note,
            'created_at' => date('Y-m-d H:i:s'),
        ];

        $this->salaryModel->save($data);

        session()->setFlashdata('message', 'Data gaji berhasil ditambahkan');
        return redirect()->to('/MyCorp/salary');
    }

    public function edit($id)
    {
        if (in_array($this->userGroup, ['Admin', 'Mandor', 'Teknisi'])) {
            return redirect()->to('/MyCorpec/Dashboard');
        }
        $data['userGroup'] = $this->userGroup;
        $data['salary'] = $this->salaryModel->find($id);


        $data['users'] = $this->userModel
            ->join('auth_groups_users', 'auth_groups_users.user_id = users.id')
            ->whereNotIn('auth_groups_users.group_id', [1])
            ->findAll();
        $data['title'] = 'Edit Gaji';
        return view('MyCorpec/SalaryEdit', $data);
    }

    public function update($id)
    {

        if (
            !$this->validate([
                'user_id' => 'required',
                'total_salary' => 'required|numeric',
                'transfer_photo' => [
                    'rules' => 'is_image[transfer_photo]|max_size[transfer_photo,2048]',
                    'errors' => [
                        'is_image' => 'this is not an image',
                        'max_size' => 'this file is very big',
                    ]
                ],
                'note' => 'permit_empty|string',
            ])
        ) {
            return redirect()->back()->withInput()->with('validate', $this->validator->getErrors());
        }

        $userId = $this->request->getPost('user_id');
        $totalSalary = $this->request->getPost('total_salary');
        $note = $this->request->getPost('note');
        $transferPhoto = $this->request->getFile('transfer_photo');

        $deductions = $this->attendanceModel->where('user_id', $userId)->selectSum('deduction')->get()->getRow()->deduction;

        $data = [
            'user_id' => $userId,
            'total_salary' => $totalSalary,
            'deduction' => $deductions ?? 0,
            'note' => $note,
        ];

        if ($transferPhoto && $transferPhoto->isValid()) {
            $photoName = $transferPhoto->getRandomName();
            $transferPhoto->move('assets/images/transfers/', $photoName);
            $data['transfer_photo'] = $photoName;
        }

        $this->salaryModel->update($id, $data);

        session()->setFlashdata('message', 'Data gaji berhasil diupdate');
        return redirect()->to('/MyCorp/salary');
    }

    public function show($id)
    {
        $data['userGroup'] = $this->userGroup;
        $data['salary'] = $this->salaryModel->find($id);
        $data['user'] = $this->userModel->find($data['salary']['user_id']);
        $data['title'] = 'Detail Gaji';
        return view('MyCorpec/SalaryShow', $data);
    }

    public function destroy($id)
    {
        $salary = $this->salaryModel->find($id);
        unlink('assets/images/transfers/' . $salary['transfer_photo']);
        if ($salary) {
            $this->salaryModel->delete($id);
            session()->setFlashdata('message', 'Data gaji berhasil dihapus');
        } else {
            session()->setFlashdata('error', 'Data gaji tidak ditemukan');
        }
        return redirect()->to('/MyCorp/salary');
    }

    public function getSalaryAndDeduction($userId)
    {
        $user = $this->userModel->find($userId);
        $totalSalary = $user->gaji_karyawan;

        $deductions = $this->attendanceModel
            ->where('user_id', $userId)
            ->selectSum('deduction')
            ->get()
            ->getRow()
            ->deduction;

        return $this->response->setJSON([
            'total_salary' => $totalSalary,
            'deduction' => $deductions,
            'rek_karyawan' => $user->rek_karyawan
        ]);
    }
}
