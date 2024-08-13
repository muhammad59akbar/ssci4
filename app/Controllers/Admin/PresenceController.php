<?php

namespace App\Controllers\Admin;

use App\Models\PresenceModel;
use App\Models\PresenceUserModel;
use App\Controllers\BaseController;
use Myth\Auth\Models\UserModel;
use App\Models\AttendanceModel;

use CodeIgniter\HTTP\ResponseInterface;


class PresenceController extends BaseController
{
    protected $presenceModel;
    protected $userModel;
    protected $presenceUserModel;
    protected $attandanceModel;

    public function __construct()
    {
        $this->presenceModel = new PresenceModel();
        $this->userModel = new UserModel();
        $this->presenceUserModel = new PresenceUserModel();
        $this->attandanceModel = new AttendanceModel();
    }

    public function index()
    {
        if (in_array($this->userGroup, ['Mandor', 'Teknisi'])) {
            return redirect()->to('/MyCorpec/Dashboard');
        }

        $data['presences'] = $this->presenceModel->findAll();
        $data['userGroup'] = $this->userGroup;
        $data['title'] = 'Pengaturan Presensi';
        return view('MyCorpec/PresenceIndex', $data);
    }

    public function create()
    {
        if (in_array($this->userGroup, ['Mandor', 'Teknisi'])) {
            return redirect()->to('/MyCorpec/Dashboard');
        }
        $validasiInput = session()->getFlashdata('validate');

        $data['userGroup'] = $this->userGroup;
        $data['title'] = 'Tambah Presensi';

        $assignedUserIds = $this->presenceUserModel->select('user_id')->get()->getResultArray();
        $assignedUserIds = array_column($assignedUserIds, 'user_id');

        if ($assignedUserIds) {
            $data['users'] = $this->userModel
                ->join('auth_groups_users', 'auth_groups_users.user_id = users.id')
                ->whereNotIn('users.id', $assignedUserIds)
                ->whereNotIn('auth_groups_users.group_id', [1, 2])
                ->findAll();
        } else {
            $data['users'] = $this->userModel
                ->join('auth_groups_users', 'auth_groups_users.user_id = users.id')
                ->whereNotIn('auth_groups_users.group_id', [1])
                ->findAll();
        }
        $data['validate'] = $validasiInput;
        return view('MyCorpec/PresenceCreate', $data);
    }

    public function store()
    {
        if (
            !$this->validate([
                'user_ids' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Karyawan must be filled in',
                    ]
                ],
                'company_name' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} must be filled in.',
                    ]
                ],
                'location' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} must be filled in.',
                    ]
                ],
                'start_time' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} must be filled in.',
                    ]
                ],
                'max_start_time' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} must be filled in.',
                    ]
                ],
                'end_time' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} must be filled in.',
                    ]
                ],
                'max_end_time' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} must be filled in.',
                    ]
                ],
            ])
        ) {
            $validasiInput = \Config\Services::validation()->getErrors();

            return redirect()->to('MyCorp/presence/create')->withInput()->with('validate', $validasiInput);
        }

        $data = [
            'company_name' => $this->request->getPost('company_name'),
            'location' => $this->request->getPost('location'),
            'start_time' => $this->request->getPost('start_time'),
            'max_start_time' => $this->request->getPost('max_start_time'),
            'end_time' => $this->request->getPost('end_time'),
            'max_end_time' => $this->request->getPost('max_end_time'),
        ];

        $this->presenceModel->save($data);
        $presenceId = $this->presenceModel->insertID();

        $userIds = $this->request->getPost('user_ids');
        foreach ($userIds as $userId) {
            $this->presenceUserModel->save([
                'presence_id' => $presenceId,
                'user_id' => $userId,
            ]);
        }

        session()->setFlashdata('message', 'Data berhasil disimpan !!!');
        return redirect()->to('/MyCorp/presence');
    }

    public function edit($id)
    {
        if (in_array($this->userGroup, ['Admin', 'Mandor', 'Teknisi'])) {
            return redirect()->to('/MyCorpec/Dashboard');
        }
        $validasiInput = session()->getFlashdata('validate');


        $data = [
            'title' => 'Edit Presensi',
            'userGroup' => $this->userGroup,
            'validate' =>  $validasiInput

        ];

        $presence = $this->presenceModel->find($id);
        if (!$presence) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data presensi tidak ditemukan');
        }

        $availableUser = $this->presenceUserModel->whereNotIn('presence_id', [$id])->select('user_id')->findAll();
        $availableUser = array_column($availableUser, 'user_id');

        $assignedUserIds = $this->presenceUserModel->where('presence_id', $id)->select('user_id')->findAll();
        $assignedUserIds = array_column($assignedUserIds, 'user_id');


        if ($availableUser) {
            $data['users'] = $this->userModel
                ->whereNotIn('users.id', $availableUser)
                ->whereNotIn('auth_groups_users.group_id', [1, 2])
                ->join('auth_groups_users', 'auth_groups_users.user_id = users.id')
                ->findAll();
        } else {
            $data['users'] = $this->userModel
                ->whereNotIn('auth_groups_users.group_id', [1, 2])
                ->join('auth_groups_users', 'auth_groups_users.user_id = users.id')
                ->findAll();
        }



        $data['presence'] = $presence;
        $data['assignedUserIds'] = $assignedUserIds;

        return view('MyCorpec/PresenceEdit', $data);
    }

    public function update($id)
    {
        if (
            !$this->validate([
                'user_ids' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Karyawan is required',
                    ]
                ],
                'company_name' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama Perusahaan is required',
                    ]
                ],
                'location' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Lokasi is required',
                    ]
                ],
                'start_time' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Waktu Masuk Awal is required',
                    ]
                ],
                'max_start_time' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Waktu Masuk Akhir is required',
                    ]
                ],
                'end_time' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Waktu Pulang Awal is required',
                    ]
                ],
                'max_end_time' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Waktu Pulang Akhir is required',
                    ]
                ],
            ])
        ) {
            $validasiInput = \Config\Services::validation()->getErrors();
            return redirect()->back()->withInput()->with('validate', $validasiInput);
        }

        $data = [
            'company_name' => $this->request->getPost('company_name'),
            'location' => $this->request->getPost('location'),
            'start_time' => $this->request->getPost('start_time'),
            'max_start_time' => $this->request->getPost('max_start_time'),
            'end_time' => $this->request->getPost('end_time'),
            'max_end_time' => $this->request->getPost('max_end_time'),
        ];

        $this->presenceModel->update($id, $data);

        $this->presenceUserModel->where('presence_id', $id)->delete();

        $userIds = $this->request->getPost('user_ids');
        foreach ($userIds as $userId) {
            $this->presenceUserModel->save([
                'presence_id' => $id,
                'user_id' => $userId,
            ]);
        }

        session()->setFlashdata('message', 'Data berhasil diperbarui !!!');
        return redirect()->to('/MyCorp/presence');
    }

    public function destroy($id)
    {
        if (in_array($this->userGroup, ['Mandor', 'Teknisi'])) {
            return redirect()->to('/MyCorpec/Dashboard');
        }

        $presence = $this->attandanceModel->where('presence_id', $id)->first();
        unlink('assets/images/absen/' . $presence['photo']);


        $this->presenceModel->delete($id);




        $this->presenceUserModel->where('presence_id', $id)->delete();

        session()->setFlashdata('message', 'Data berhasil dihapus');
        return redirect()->to('/MyCorp/presence');
    }
}
