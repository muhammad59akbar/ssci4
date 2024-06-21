<?php

namespace App\Controllers;

class Test extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'PT. Corpec Inspeksi Utama'
        ];
        echo view('MyCorpec/Register', $data);
    }
}
