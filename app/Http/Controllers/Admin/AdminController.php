<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

abstract class AdminController extends Controller
{
    protected $template;
    protected $vars;
    protected $article_rep;
    protected $blog_rep;
    protected $perm_rep;
    protected $role_rep;
    protected $content;

    public function __construct()
    {

    }

    public function renderTemplate()
    {
        $this->vars = array_add($this->vars, 'content', $this->content);
        return view($this->template)->with($this->vars);
    }
}
