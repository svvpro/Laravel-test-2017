<?php
/**
 * Created by PhpStorm.
 * User: SVV
 * Date: 04.02.2017
 * Time: 21:51
 */

namespace App\Repositories;


use App\Blog;

class BlogRepository extends Repository
{
    public function __construct(Blog $blog)
    {
        $this->model = $blog;
    }

    public function getBlog()
    {
        return $this->model->get();
    }
}