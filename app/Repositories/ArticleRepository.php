<?php
/**
 * Created by PhpStorm.
 * User: SVV
 * Date: 30.01.2017
 * Time: 13:06
 */

namespace App\Repositories;


use App\Article;
use Illuminate\Support\Facades\Auth;

class ArticleRepository extends Repository
{
    public function __construct(Article $article)
    {
        $this->model = $article;
    }

    public function getArticles()
    {
        return $this->get();
    }

    public function addArticle($request)
    {
        $user = Auth::user();
        $data = $request->except('image', '_token');

        if(empty($data))
        {
            return array('error' => 'Нет данных');
        }

        $data['image'] = 'image';
        $data['user_id'] = 3;
        $this->model->fill($data);


        $user->articles()->save($this->model);
        return array('status'=>'Статья добавлена');
    }

    public function updateArticle($request, $id)
    {
        $user =Auth::user();

        $data = $request->except('image', '_token');

        if(empty($data))
        {
            return array('error' => 'Нет данных');
        }

        $data['image'] = 'image';
        $data['user_id'] = 3;
        $this->model->fill($data);
    }


}