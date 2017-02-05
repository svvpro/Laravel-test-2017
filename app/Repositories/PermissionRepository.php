<?php
/**
 * Created by PhpStorm.
 * User: SVV
 * Date: 05.02.2017
 * Time: 20:31
 */

namespace App\Repositories;


use App\Permission;

class PermissionRepository extends  Repository
{
    public function __construct(Permission $permission)
    {
        $this->model = $permission;
    }

    public function getPermission()
    {
        return $this->get();
    }
}