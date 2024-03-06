<?php

namespace App\Controllers;

class MyCorpec extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Admin Dashboard'
        ];
        echo view('MyCorpec/Dashboard', $data);
    }
}
