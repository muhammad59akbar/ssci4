<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class MyLogin extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Admin Dashboard'
        ];
        echo view('MyCorpec/Dashboard', $data);
    }
}
