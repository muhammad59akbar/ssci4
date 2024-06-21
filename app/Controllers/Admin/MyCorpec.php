<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AuthGroupsKaryawan;
use App\Models\KaryawanModels;
use Myth\Auth\Password;


class MyCorpec extends BaseController
{
    protected $KaryawanModels;

    public function __construct()
    {
        $this->KaryawanModels = new KaryawanModels();
    }

    public function index()
    {
        $data = [
            'title' => 'Admin Dashboard'
        ];
        return view('MyCorpec/Dashboard', $data);
    }


    public function List_Karyawan()
    {
        $data['title'] = 'List Karyawan';

        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->select('users.id as userid, username, email, fullname, auth_groups.name as jabatan');
        $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $query = $builder->get();

        $data['karyawan'] = $query->getResultArray();
        return view('MyCorpec/ListKaryawan', $data);
    }

    public function NewKaryawan()
    {

        $validasiInput = session()->getFlashdata('ValidNewKaryawan');


        $data =
            [
                'title' => 'Tambah Karyawan',
                'ValidNewKaryawan' =>  $validasiInput,

                // 'redirectedErrors' => session()->getFlashdata("redirectedErrors") ?: "",
                // 'redirectedInput' => session()->getFlashdata("redirectedInput") ?? [],
            ];
        return view('MyCorpec/AddKaryawan', $data);
    }

    public function AddNewKaryawan()
    {
        if (!$this->validate([
            'email' => [
                'rules' => 'required|valid_email|is_unique[users.email,id,{id}]',
                'errors' => [
                    'required' => '{field} must be filled in.',
                    'is_unique' => '{field} already registered.'
                ]
            ],
            'username' => [
                'rules' => 'required|min_length[5]|max_length[30]|is_unique[users.username,id,{id}]',
                'errors' => [
                    'is_unique' => '{field} already registered.'
                ]
            ],
            'namaLengkap' => [
                'rules' => 'required|min_length[5]',
                'errors' => [
                    'required' => 'Nama Lengkap must be filled in',
                    'min_length' => 'Nama Lengkap field must be at least 5 characters'
                ]
            ],
            'foto_krywn' => [
                'rules' => 'uploaded[foto_krywn]|max_size[foto_krywn,1024]|is_image[foto_krywn]|mime_in[foto_krywn,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Selected the image first',
                    'max_size' => 'this file very big',
                    'is_image' => 'this is not image',
                    'mime_in' => 'this is not image',

                ]

            ],
            'nik_karyawan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nik must be filled in'
                ]
            ],
            'usia' => 'required|integer',
            'norekening' => 'required|numeric',
            'password' => 'required',
            'rekktp' => [
                'rules' => 'uploaded[rekktp]|max_size[rekktp,1024]|is_image[rekktp]|mime_in[rekktp,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Selected the image first',
                    'max_size' => 'this file very big',
                    'is_image' => 'this is not image',
                    'mime_in' => 'this is not image',

                ]

            ],

            'jabatan' => 'required'
        ])) {
            $validasiInput = \Config\Services::validation()->getErrors();
            // dd($validasiInput);


            return redirect()->to('MyCorpec/Add_Karyawan')->withInput()->with('ValidNewKaryawan', $validasiInput);

            // return redirect()->to('MyCorpec/Add_Karyawan')->withInput()->with("redirectedErrors", $validasiInput->listErrors())
            //     ->with("redirectedInput", $this->request->getVar());
        }


        $fotoKaryawan = $this->request->getFile('foto_krywn');
        $NFotorKrywn = $fotoKaryawan->getRandomName();
        $fotoKaryawan->move('assets/images/karyawan/', $NFotorKrywn);

        $gmbrrektp = $this->request->getFile('rekktp');
        $nrekktp = $gmbrrektp->getRandomName();
        $gmbrrektp->move('assets/images/rek/', $nrekktp);
        $authgroupModels = new AuthGroupsKaryawan();


        $userData = [
            'username' => $this->request->getVar('username'),
            'email' => $this->request->getVar('email'),
            'fullname' => $this->request->getVar('namaLengkap'),
            'image_karyawan' => $NFotorKrywn,
            'nik_krywn' => $this->request->getVar('nik_karyawan'),
            'usia_karyawan' => $this->request->getVar('usia'),
            'rek_karyawan' => $this->request->getVar('norekening'),
            'gmbr_rekktp' => $nrekktp,
            'active' => 1,

            'password_hash' => Password::hash($this->request->getVar('password'))
        ];

        $userId = $this->KaryawanModels->createNew($userData);

        $groupId = $this->request->getVar('jabatan');
        $authGroupsUserData = [
            'group_id' => $groupId,
            'user_id' => $userId
        ];
        $authgroupModels->InsertAuthGroups($authGroupsUserData);
        // dd($authgroupModels);
        session()->setFlashdata('message', 'Data berhasil ditambahkan !!!');
        return redirect()->to('/MyCorpec/List_Karyawan');
    }

    public function Detail_Karyawan($id_karyawan)
    {
        $validasiInput = session()->getFlashdata('validationupdate');

        $data = [
            'title' => 'Edit Karyawan',
            'validationupdate' => $validasiInput
        ];
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->select('users.id as userid, username, email, fullname, nik_krywn, usia_karyawan,gaji_karyawan, rek_karyawan, image_karyawan, gmbr_rekktp, auth_groups.name as jabatan');
        $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $builder->where('users.id', $id_karyawan);
        $query = $builder->get();

        $karyawan = $query->getRow();

        $jabatanQuery = $db->table('auth_groups')->get();
        $jabatan = $jabatanQuery->getResult();
        $data['jabatan'] = $jabatan;


        $data['karyawan'] = $karyawan;
        return view('MyCorpec/EditKaryawan', $data);
    }

    public function EditKaryawan($id_karyawan)
    {
        if (!$this->validate([
            'email' => [
                'rules' => 'required|valid_email|is_unique[users.email,id,' . $id_karyawan . ']',
                'errors' => [
                    'required' => '{field} must be filled in.',
                    'is_unique' => '{field} already registered.'
                ]
            ],
            'username' => [
                'rules' => 'required|min_length[4]|max_length[30]|is_unique[users.username,id,' . $id_karyawan . ']',
                'errors' => [
                    'required' => '{field} must be filled in.',
                    'is_unique' => '{field} already registered.',

                ]
            ],
            'namaLengkap' => [
                'rules' => 'required|min_length[4]',
                'errors' => [
                    'required' => 'Nama Lengkap must be filled in',
                    'min_length' => 'Nama Lengkap field must be at least 5 characters'
                ]
            ],
            'jabatan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jabatan must be filled in'
                ]
            ],
            'nik' => 'required|numeric',
            'usia' => 'required|numeric',
            'norekening' => 'required|numeric',
            'foto_krywn' => [
                'rules' => 'max_size[foto_krywn,1024]|is_image[foto_krywn]|mime_in[foto_krywn,image/jpg,image/jpeg,image/png]',
                'errors' => [

                    'max_size' => 'this file very big',
                    'is_image' => 'this is not image',
                    'mime_in' => 'this is not image',

                ]

            ],
            'rekktp' => [
                'rules' => 'max_size[rekktp,1024]|is_image[rekktp]|mime_in[rekktp,image/jpg,image/jpeg,image/png]',
                'errors' => [

                    'max_size' => 'this file very big',
                    'is_image' => 'this is not image',
                    'mime_in' => 'this is not image',

                ]

            ],
        ])) {
            $validationErrors = \Config\Services::validation()->getErrors();
            dd($validationErrors);


            return redirect()->back()->withInput()->with('validationupdate', $validationErrors);
        }

        $fotoKaryawan = $this->request->getFile('foto_krywn');
        $rekKTP = $this->request->getFile('rekktp');

        // Proses file foto_krywn jika ada
        if ($fotoKaryawan && !$fotoKaryawan->hasMoved() && $fotoKaryawan->isValid()) {
            $NFotoKrywn = $fotoKaryawan->getRandomName();
            $fotoKaryawan->move('assets/images/karyawan/', $NFotoKrywn);
            // Hapus file lama jika ada
            $oldFotoPath = 'assets/images/karyawan/' . $this->request->getVar('fotolama');
            if (file_exists($oldFotoPath) && !empty($this->request->getVar('fotolama'))) {
                unlink($oldFotoPath);
            }
        } else {
            $NFotoKrywn = $this->request->getVar('fotolama');
        }

        // Proses file rekktp jika ada
        if ($rekKTP && !$rekKTP->hasMoved() && $rekKTP->isValid()) {
            $NRekKTP = $rekKTP->getRandomName();
            $rekKTP->move('assets/images/rek/', $NRekKTP);
            // Hapus file lama jika ada
            $oldRekPath = 'assets/images/rek/' . $this->request->getVar('rektplama');
            if (file_exists($oldRekPath) && !empty($this->request->getVar('rektplama'))) {
                unlink($oldRekPath);
            }
        } else {
            $NRekKTP = $this->request->getVar('rektplama');
        }

        $data = [
            'email' => $this->request->getVar('email'),
            'username' => $this->request->getVar('username'),
            'fullname' => $this->request->getVar('namaLengkap'),
            'nik_krywn' => $this->request->getVar('nik'),
            'usia_karyawan' => $this->request->getVar('usia'),
            'rek_karyawan' => $this->request->getVar('norekening'),
            'image_karyawan' => $NFotoKrywn,
            'gmbr_rekktp' => $NRekKTP
        ];

        // Update the karyawan data
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->where('id', $id_karyawan);
        $builder->update($data);

        // Update the jabatan data
        $builderAuthGroupsUsers = $db->table('auth_groups_users');
        $builderAuthGroupsUsers->where('user_id', $id_karyawan);
        $builderAuthGroupsUsers->update([
            'group_id' => $this->request->getVar('jabatan')
        ]);

        return redirect()->to("/MyCorpec/{$id_karyawan}/edit_karyawan")->with('message', 'Karyawan updated successfully.');
    }



    public function DKarywanCorp($id_karyawan)
    {
        $karyawan = $this->KaryawanModels->find($id_karyawan);

        unlink('assets/images/rek/' . $karyawan['gmbr_rekktp']);
        unlink('assets/images/karyawan/' . $karyawan['image_karyawan']);


        $this->KaryawanModels->deleteKaryawan($id_karyawan);

        return redirect()->to('/MyCorpec/List_Karyawan')->with('message', 'Karyawan berhasil dihapus');
    }
}
