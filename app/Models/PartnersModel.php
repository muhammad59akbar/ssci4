<?php

namespace App\Models;

use CodeIgniter\Model;

class PartnersModel extends Model
{
    protected $table = 'partnercorp';
    protected $useTimestamps = true;
    protected $primaryKey = 'partnerid';
    protected $allowedFields = ['imagepartner'];
}
