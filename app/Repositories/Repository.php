<?php
/**
 * Created by PhpStorm.
 * User: SVV
 * Date: 30.01.2017
 * Time: 13:03
 */

namespace App\Repositories;


abstract class Repository
{
    protected $model;

    protected function get($fields = '*')
    {
        $builder = $this->model->select($fields);

        return $builder->get();
    }
}