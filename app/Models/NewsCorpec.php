<?php

namespace App\Models;

use CodeIgniter\Model;

class NewsCorpec extends Model
{
    protected $table = 'corpec_news';
    protected $useTimestamps = true;
    protected $allowedFields = ['url_news', 'news_title', 'image_news', 'news_description'];
}
