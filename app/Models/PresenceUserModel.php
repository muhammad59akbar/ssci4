<?php

namespace App\Models;

use CodeIgniter\Model;

class PresenceUserModel extends Model
{
    protected $table = 'presence_users';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $protectFields = true;
    protected $allowedFields = ['user_id', 'presence_id'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

}
