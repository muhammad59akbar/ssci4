<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;


class MyCorpec extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Admin Dashboard'
        ];
        return view('MyCorp/Dashboard', $data);
    }


    public function List_Karyawan()
    {
        $data['title'] = 'List Karyawan';

        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->select('users.id as userid, username, email, auth_groups.name as jabatan');
        $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $query = $builder->get();

        $data['karyawan'] = $query->getResultArray();
        return view('MyCorp/ListKaryawan', $data);
    }

    public function NewKaryawan()
    {
        $data = ['title' => 'Tambah Karyawan'];
        return view('MyCorp/AddKaryawan', $data);
    }

    public function AddNewKaryawan()
    {
        $db = \Config\Database::connect();


        // Data pengguna yang akan dimasukkan
        $userData = [
            'username' => $this->request->getVar('username'),
            'email' => $this->request->getVar('email'),
            'password_hash' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),

        ];

        $db->transStart();

        // Insert data pengguna
        $db->table('users')->insert($userData);

        // Melihat pesan error jika ada
        var_dump($db->error());

        // Ambil ID pengguna yang baru saja dimasukkan
        $userId = $db->insertID();

        $groupId = $this->request->getVar('jabatan');

        // Insert data ke dalam tabel auth_groups_users
        $authGroupsUserData = [
            'group_id' => $groupId,
            'user_id' => $userId
        ];
        $db->table('auth_groups_users')->insert($authGroupsUserData);

        // Melihat pesan error jika ada
        var_dump($db->error());

        // Commit transaksi
        $db->transComplete();

        // Periksa apakah transaksi berhasil
        if ($db->transStatus() === false) {
            return "Gagal menambahkan pengguna!";
        } else {
            return "Pengguna telah ditambahkan ke dalam grup dengan group_id $groupId!";
        }
    }

    public function Detail_Karyawan($id_karyawan)
    {
        $data = [
            'title' => 'Edit Karyawan'
        ];
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->select('users.id as userid, username, email, fullname, nik_krywn,usia_karyawan,gaji_karyawan,rek_karyawan, auth_groups.name as jabatan');
        $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $builder->where('users.id', $id_karyawan); // Filter berdasarkan ID
        $query = $builder->get();

        $karyawan = $query->getRow(); // Mengambil satu baris data

        // Menambahkan data karyawan ke dalam data yang akan dikirim ke view
        $data['karyawan'] = $karyawan;
        return view('MyCorp/EditKaryawan', $data);
    }
}
