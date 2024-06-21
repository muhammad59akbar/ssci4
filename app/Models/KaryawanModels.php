<?php

namespace App\Models;

use CodeIgniter\Model;

class KaryawanModels extends Model
{
    protected $table = 'users';
    protected $useTimestamps = true;
    protected $allowedFields = ['username', 'email', 'fullname', 'usia_karyawan', 'nik_krywn', 'rek_karyawan', 'password_hash', 'image_karyawan', 'gmbr_rekktp', 'active'];

    public function createNew($userData)
    {
        $this->insert($userData);
        return $this->getInsertID();
    }

    public function deleteKaryawan($id_karyawan)
    {
        $this->delete($id_karyawan);
    }
}
