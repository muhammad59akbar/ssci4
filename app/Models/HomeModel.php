<?php

namespace App\Models;

use CodeIgniter\Model;

class HomeModel extends Model
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
    public function getLatestNews($limit = 3)
    {
        return $this->db->table('corpec_news')
            ->orderBy('created_at', 'DESC')
            ->limit($limit)
            ->get()
            ->getResultArray();
    }
    public function getRecentNews($limit = 5)
    {
        return $this->db->table('corpec_news')
            ->orderBy('created_at', 'DESC')
            ->limit($limit)
            ->get()
            ->getResultArray();
    }
    public function getNewsByCategory($categoryId)
    {
        return $this->where('category_News', $categoryId)
            ->orderBy('created_at', 'DESC')
            ->findAll();
    }
}
