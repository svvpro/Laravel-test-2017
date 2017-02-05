<?php
/**
 * Created by PhpStorm.
 * User: SVV
 * Date: 05.02.2017
 * Time: 20:29
 */

namespace App\Repositories;


use App\Role;

class RoleRepository extends Repository
{
    public function __construct(Role $role)
    {
        $this->model = $role;
    }

    public function getRoles()
    {
        return $this->get();
    }
}