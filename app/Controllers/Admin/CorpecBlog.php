<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\NewsCorpec;
use App\Models\PartnersModel;

class CorpecBlog extends BaseController
{
    protected $NewsModel;
    protected $PartnersModel;
    public function __construct()
    {
        $this->NewsModel = new NewsCorpec();
        $this->PartnersModel = new PartnersModel();
    }
    public function index()
    {
        if (in_array($this->userGroup, ['Mandor', 'Teknisi'])) {
            return redirect()->to('/MyCorpec/Dashboard');
        }

        $data = [
            'title' => 'My Corpec Blog',
            'news' => $this->NewsModel->getNews(),
            'userGroup' => $this->userGroup
        ];
        return view('MyCorpec/CorpecBlog', $data);
    }
    public function WriteNews()
    {
        if (in_array($this->userGroup, ['Mandor', 'Teknisi'])) {
            return redirect()->to('/MyCorpec/Dashboard');
        }
        $validasiInput = session()->getFlashdata('validNews');

        $data = [
            'title' => 'My Corpec Blog',
            'validationInput' => $validasiInput,
            'userGroup' => $this->userGroup
        ];

        return view('MyCorpec/WriteNews', $data);
    }
    public function AddNews()
    {

        if (!$this->validate([

            'titleNews' => [
                'rules' => 'required|min_length[5]|max_length[45]|is_unique[corpec_news.news_title]',
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

            ],
            'category_news' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'This description must be filled'
                ]

            ],
            'image_news' => [
                'rules' => 'max_size[image_news,1024]|is_image[image_news]|mime_in[image_news,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'this file very big',
                    'is_image' => 'this is not image',
                    'mime_in' => 'this is not image',

                ]

            ],

        ])) {
            $validasiInput = \Config\Services::validation()->getErrors();


            return redirect()->to('CorpecBlog/Write_News')->withInput()->with('validNews', $validasiInput);
        }

        $imageNews = $this->request->getFile('image_news');

        if ($imageNews->getError() === 4) {
            $NimageNews = 'corpecLogo.jpg';
        } else {

            $NimageNews = $imageNews->getRandomName();
            $imageNews->move('assets/images/news/', $NimageNews);
        }


        $url_news = url_title((string)$this->request->getPost('titleNews'), '-', true);

        $this->NewsModel->save([
            'news_title' => $this->request->getPost('titleNews'),
            'url_news' => $url_news,
            'image_news' =>  $NimageNews,
            'news_description' => $this->request->getPost('content_news'),
            'category_News' => $this->request->getPost('category_news'),
        ]);
        return redirect()->to('CorpecBlog/ListBlog')->with('message', 'Data berhasil ditambahkan !!!');
    }

    public function detailNews($url)
    {
        if (in_array($this->userGroup, ['Mandor', 'Teknisi'])) {
            return redirect()->to('/MyCorpec/Dashboard');
        }
        $validasiInput = session()->getFlashdata('validNews');

        $data = [
            'title' => 'Detail Berita',
            'userGroup' => $this->userGroup,
            'validationInput' => $validasiInput,
            'news' => $this->NewsModel->getNews($url)
        ];

        return view('MyCorpec/News_Detail', $data);
    }

    public function updateNews($news_id)
    {

        if (!$this->validate([

            'titleNews' => [

                'rules' => 'required|min_length[5]|max_length[45]|is_unique[corpec_news.news_title,news_id,' . $news_id . ']',
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

            ],
            'image_news' => [
                'rules' => 'max_size[image_news,1024]|is_image[image_news]|mime_in[image_news,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'this file very big',
                    'is_image' => 'this is not image',
                    'mime_in' => 'this is not image',
                ]
            ],
            'category_news' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'This description must be filled'
                ]
            ],

        ])) {
            $validasiInput = \Config\Services::validation()->getErrors();
            return redirect()->back()->withInput()->with('validNews', $validasiInput);
        }

        $nameFileImageNews = $this->request->getFile('image_news');
        $oldFileImages = $this->request->getPost('newsImageOld');
        if ($nameFileImageNews->getError() == 4) {
            $name_newsImage = $oldFileImages;
        } else if ($oldFileImages == 'corpecLogo.jpg') {
            $name_newsImage = $nameFileImageNews->getRandomName();
            $nameFileImageNews->move('assets/images/news/', $name_newsImage);
        } else {
            $name_newsImage = $nameFileImageNews->getRandomName();
            $nameFileImageNews->move('assets/images/news/', $name_newsImage);
            unlink('assets/images/news/' . $oldFileImages);
        }


        $url_news = url_title((string)$this->request->getPost('titleNews'), '-', true);

        $this->NewsModel->save([
            'news_id' => $news_id,
            'image_news' =>   $name_newsImage,
            'news_title' => $this->request->getPost('titleNews'),
            'url_news' => $url_news,
            'category_News' => $this->request->getPost('category_news'),
            'news_description' => $this->request->getPost('content_news'),
        ]);

        return redirect()->to('CorpecBlog/ListBlog')->with('message', 'Data berhasil diubah !!!');
    }

    public function destroyNews($news_id)
    {
        $findNewstoDestroy = $this->NewsModel->find($news_id);
        if ($findNewstoDestroy['image_news'] != 'corpecLogo.jpg') {
            unlink('assets/images/news/' . $findNewstoDestroy['image_news']);
        }
        $this->NewsModel->delete($news_id);

        return redirect()->to('/CorpecBlog/ListBlog')->with('message', 'News Has Been Deleted !!!');
    }


    public function ListPartnerShip()
    {
        $validasiInput = session()->getFlashdata('validPartner');
        $partners = $this->PartnersModel->findAll();
        $data = [
            'title' => 'Partnership With Corpec',
            'userGroup' => $this->userGroup,
            'partners' => $partners,
            'validasi' =>  $validasiInput
        ];
        return view('MyCorpec/PartnershipIndex', $data);
    }

    public function AddPartnership()
    {
        if (!$this->validate([
            'imagePartner' => [
                'rules' => 'uploaded[imagePartner]|max_size[imagePartner,1024]|is_image[imagePartner]|mime_in[imagePartner,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'this file very big',
                    'is_image' => 'this is not image',
                    'mime_in' => 'this is not image',
                ]
            ],
        ])) {
            $validasiInput = \Config\Services::validation()->getErrors();
            return redirect()->back()->withInput()->with('validPartner', $validasiInput);
        };

        $FileImagepartner = $this->request->getFile('imagePartner');
        $NimagePartner = $FileImagepartner->getRandomName();
        $FileImagepartner->move('assets/images/partners/', $NimagePartner);

        $this->PartnersModel->save([
            'imagepartner' =>  $NimagePartner,
        ]);

        return redirect()->to('/CorpecBlog/Partnership')->with('message', 'Data berhasil ditambahkan !!!');
    }

    public function EditPartner($partner_id)
    {
        if (!$this->validate([
            'imagePartner' => [
                'rules' => 'uploaded[imagePartner]|max_size[imagePartner,1024]|is_image[imagePartner]|mime_in[imagePartner,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'this file very big',
                    'is_image' => 'this is not image',
                    'mime_in' => 'this is not image',
                ]
            ],
        ])) {
            $validasiInput = \Config\Services::validation()->getErrors();
            return redirect()->back()->withInput()->with('validPartner', $validasiInput);
        };


        $FileImagepartner = $this->request->getFile('imagePartner');
        $OldFileImagepartner = $this->request->getPost('imagepartnerOld');

        if ($FileImagepartner->getError() === 4) {
            $NimagePartner = $OldFileImagepartner;
        } else {
            $NimagePartner = $FileImagepartner->getRandomName();
            $FileImagepartner->move('assets/images/partners/', $NimagePartner);
            unlink('assets/images/partners/' .  $OldFileImagepartner);
        }
        $this->PartnersModel->save([
            'partnerid' => $partner_id,
            'imagepartner' => $NimagePartner,
        ]);
        return redirect()->to('/CorpecBlog/Partnership')->with('message', 'Data berhasil diubah !!!');
    }

    public function destroyPartner($idImagePartner)
    {
        $imagepartner = $this->PartnersModel->find($idImagePartner);

        unlink('assets/images/partners/' . $imagepartner['imagepartner']);

        $this->PartnersModel->delete($idImagePartner);

        return redirect()->to('/CorpecBlog/Partnership')->with('message', 'Data berhasil dihapus !!!');
    }
}
