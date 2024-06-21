<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\NewsCorpec;

class CorpecBlog extends BaseController
{
    protected $NewsModel;
    public function __construct()
    {
        $this->NewsModel = new NewsCorpec();
    }
    public function index()
    {
        $news = $this->NewsModel->findAll();
        $data = [
            'title' => 'My Corpec Blog',
            'news' => $news
        ];
        return view('MyCorpec/CorpecBlog', $data);
    }
    public function WriteNews()
    {
        $validasiInput = session()->getFlashdata('validNews');

        $data = [
            'title' => 'My Corpec Blog',
            'validationInput' => $validasiInput
        ];

        return view('MyCorpec/WriteNews', $data);
    }
    public function AddNews()
    {
        if (!$this->validate([

            'titleNews' => [
                'rules' => 'required|min_length[5]||is_unique[corpec_news.news_title]',
                'errors' => [
                    'required' => 'Title must be filled',
                    'is_unique' => 'Title already used',
                    'min_length' => 'Title field must be at least 5 characters'
                ]
            ],
            'content_news' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'This description must be filled'
                ]

            ]


        ])) {
            $validasiInput = \Config\Services::validation()->getErrors();

            return redirect()->to('CorpecBlog/Write_News')->withInput()->with('validNews', $validasiInput);
        }
        $url_news = url_title($this->request->getPost('titleNews') . '-' . true);
        $this->NewsModel->save([
            'news_title' => $this->request->getPost('titleNews'),
            'url_news' => $url_news,
            'news_description' => $this->request->getPost('content_news'),
        ]);
        return redirect()->to('CorpecBlog/ListBlog');
    }
}
