<?php

namespace App\Models;

use CodeIgniter\Model;

class PresenceModel extends Model
{
    protected $table = 'presences';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'user_id',
        'company_name',
        'location',
        'start_time',
        'max_start_time',
        'end_time',
        'max_end_time'
    ];
    protected $useTimestamps = true;

    public function getPresenceWithUsers($id)
    {
        return $this->select('presences.*, users.id as user_id, users.fullname')
            ->join('users', 'users.id = presences.user_id')
            ->where('presences.id', $id)
            ->findAll();
    }
}
