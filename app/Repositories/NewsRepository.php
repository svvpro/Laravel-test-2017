<?php
/**
 * Created by PhpStorm.
 * User: SVV
 * Date: 01.02.2017
 * Time: 20:58
 */

namespace App\Repositories;


use App\News;

class NewsRepository extends Repository
{
    public function __construct(News $news)
    {
        $this->model = $news;
    }

    public function getNews()
    {
        return $this->get();
    }

    public function getSingleNewsItem($id)
    {
        return $this->model->select('*')->where('id',$id)->get();
    }
}