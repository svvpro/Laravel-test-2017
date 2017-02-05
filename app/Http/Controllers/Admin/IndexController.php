<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class IndexController extends AdminController
{
    public function __construct(Request $request)
    {
        $this->middleware(function($request, $next){
            if(Gate::denies('VIEW_ADMIN')){
                abort(403);
            }
            return $next($request);
        });


        parent::__construct();
        $this->template = env('THEME').'.admin.index';
    }

    public function index()
    {
        $content = view(env('THEME').'.admin.navigation')->render();
        $this->vars = array_add($this->vars, 'content', $content);
        return $this->renderTemplate();
    }
}
