<?php

namespace App\Http\Controllers;

use App\Article;
use App\Menu;
use App\Repositories\ArticleRepository;
use App\Repositories\MenuRepository;
use Illuminate\Http\Request;

class IndexController extends SiteController
{
    public function __construct(ArticleRepository $article_rep)
    {
        parent::__construct(new MenuRepository(new Menu()));
        $this->article_rep = $article_rep;
        $this->template = env('THEME').'.index';
    }

    public function index()
    {

        $articlesList = $this->article_rep->getArticles();
        dump($articlesList);
        $articleLists = Article::pluck('title', 'text');
        dump($articleLists);

        $articles = view(env('THEME').'.articles')->with('articles', $articlesList);
        $this->vars = array_add($this->vars, 'articles', $articles);

        return $this->renderTemplate();
    }
}
