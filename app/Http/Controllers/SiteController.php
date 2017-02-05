<?php

namespace App\Http\Controllers;

use App\Repositories\MenuRepository;
use Illuminate\Http\Request;

abstract class SiteController extends Controller
{
    protected $template;
    protected $vars;
    protected $menu_rep;
    protected $news_rep;
    protected $article_rep;

    public function __construct(MenuRepository $menu_rep)
    {
        $this->menu_rep = $menu_rep;

        $menuList = $this->menu_rep->getMenu();
        $navigation = view(env('THEME').'.navigation')->with('menus', $menuList);
        $this->vars = array_add($this->vars, 'navigation', $navigation);
    }

    protected function renderTemplate()
    {
        return view($this->template)->with($this->vars);
    }
}
