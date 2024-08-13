<?php

namespace App\Models;

use CodeIgniter\Model;

class NewsCorpec extends Model
{
    protected $table = 'corpec_news';
    protected $useTimestamps = true;
    protected $primaryKey = 'news_id';
    protected $allowedFields = ['url_news', 'news_title', 'image_news', 'news_description', 'category_News'];

    public function getNews($url = false)
    {
        if ($url === false) {
            return $this->findAll();
        }
        return $this->where(['url_news' => $url])->first();
    }
}
