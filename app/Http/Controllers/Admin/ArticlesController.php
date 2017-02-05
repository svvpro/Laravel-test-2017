<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Http\Requests\ArticleRequest;
use App\Repositories\ArticleRepository;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticlesController extends AdminController
{
    public function __construct(ArticleRepository $article_rep)
    {
        parent::__construct();
        $this->article_rep =$article_rep;
        $this->template = env('THEME').'.admin.articles.index';
    }

    public function index()
    {
        $artilesList = $this->article_rep->getArticles();
        $this->content = view(env('THEME').'.admin.articles.articles_list')->with('articles', $artilesList);

        return $this->renderTemplate();
    }

    public function create()
    {

        $tags = Tag::pluck('name', 'id');


//        dd($tags);

        $this->content = view(env('THEME').'.admin.articles.article_create')->with('tags', $tags);

//        dd($this->content);

        return $this->renderTemplate();
    }

    public function store(ArticleRequest $request)
    {
        dd($request->all());
        $result = $this->article_rep->addArticle($request);

        if (is_array($result) && !empty($result['error'])){
            return back()->with($result);
        }

        return redirect('admin/articles')->with($result);
    }


    public function show($id)
    {
        $article = Article::find($id);

        $this->content = view(env('THEME').'.admin.articles.article_show')->with('article', $article);

        return $this->renderTemplate();
    }

    public function edit($id)
    {
        $article = Article::find($id);

        $this->content = view(env('THEME').'.admin.articles.article_edit')->with('article', $article);

        return $this->renderTemplate();
    }



    public function update(ArticleRequest $request, $id)
    {
        return $this->renderTemplate();
    }
}
