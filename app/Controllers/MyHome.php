<?php

namespace App\Controllers;

class MyHome extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'PT. Corpec Inspeksi Utama'
        ];
        echo view('Home/Index', $data);
    }
    public function ProfileCompany()
    {
        $data = [
            'title' => 'Profile | PT. Corpec Inspeksi Utama'
        ];
        echo view('Home/ProfileCorp', $data);
    }
}
