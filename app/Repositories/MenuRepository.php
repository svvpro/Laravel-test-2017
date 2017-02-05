<?php
/**
 * Created by PhpStorm.
 * User: SVV
 * Date: 30.01.2017
 * Time: 13:04
 */

namespace App\Repositories;


use App\Menu;

class MenuRepository extends Repository
{
    public function __construct(Menu $menu)
    {
        $this->model = $menu;
    }

    public function getMenu()
    {
        return $this->get();
    }
}