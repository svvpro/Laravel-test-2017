<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Repositories\MenuRepository;
use App\Repositories\NewsRepository;
use Illuminate\Http\Request;

class NewsController extends SiteController
{
    public function __construct(NewsRepository $news_rep)
    {
        parent::__construct(new MenuRepository(new Menu()));
        $this->news_rep = $news_rep;
        $this->template = env('THEME').'.news_page';
    }

    public function index()
    {
        $news_list = $this->news_rep->getNews();
        $news = view(env('THEME').'.news')->with('news', $news_list);
        $this->vars = array_add($this->vars, 'news', $news);

        return $this->renderTemplate();
    }

    public function show($id)
    {

        $news_item = $this->news_rep->getSingleNewsItem($id);
        $news_it = view(env('THEME').'.news_full')->with('news', $news_item);
        $this->vars = array_add($this->vars, 'news', $news_it);

        return $this->renderTemplate();
    }
}
