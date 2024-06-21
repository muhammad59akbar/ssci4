<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthGroupsKaryawan extends Model
{
    protected $table = 'auth_groups_users';
    protected $allowedFields = ['group_id', 'user_id'];

    public function InsertAuthGroups($data)
    {
        return $this->insert($data);
    }
}
