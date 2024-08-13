<?php

namespace App\Controllers;

use App\Models\HomeModel;
use App\Models\PartnersModel;

class MyHome extends BaseController
{
    protected $HomeModel;
    protected $categoryMapping;
    protected $PartnerModel;
    public function __construct()
    {
        $this->HomeModel = new HomeModel();
        $this->categoryMapping = [
            'engineering' => 1,
            'industrial' => 2,
            'consumer-goods' => 3,
            'audit' => 4
        ];
        $this->PartnerModel = new PartnersModel();
    }
    public function index()
    {

        $data = [
            'title' => 'PT. Corpec Inspeksi Utama',
            'news' => $this->HomeModel->getLatestNews(),
            'newsNav' => $this->HomeModel->findAll(),
            'partners' => $this->PartnerModel->findAll()
        ];
        return view('Home/Index', $data);
    }
    public function ProfileCompany()
    {
        $data = [
            'title' => 'Profile | PT. Corpec Inspeksi Utama'
        ];
        return view('Home/ProfileCorp', $data);
    }
    public function PartnerShip()
    {

        $data = [
            'title' => 'PT. Corpec Inspeksi Utama | Partnership',
            'partners' => $this->PartnerModel->findAll()

        ];
        return view('Home/Partnership', $data);
    }
    public function detailNewsCompany($url)
    {
        $data = [
            'title' => 'PT. Corpec Inspeksi Utama |' . $url . 'Detail',
            'news' => $this->HomeModel->getNews($url),
            'listNews' => $this->HomeModel->getRecentNews(),
        ];
        return view('Home/Detail_News', $data);
    }
    public function category($categoryName)
    {
        if (!array_key_exists($categoryName, $this->categoryMapping)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Category not found');
        }

        $categoryId = $this->categoryMapping[$categoryName];

        $data = [
            'title' => 'PT. Corpec Inspeksi Utama | ' . ucfirst(str_replace('-', ' ', $categoryName)),
            'news' => $this->HomeModel->getNewsByCategory($categoryId),
            'categoryName' => ucfirst(str_replace('-', ' ', $categoryName))
        ];
        return view('Home/Category', $data);
    }
}
