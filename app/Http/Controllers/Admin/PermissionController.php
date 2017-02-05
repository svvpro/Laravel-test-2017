<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\PermissionRepository;
use App\Repositories\RoleRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PermissionController extends AdminController
{
    public function __construct(RoleRepository $role_rep, PermissionRepository $permission_rep)
    {
        parent::__construct();
        $this->role_rep = $role_rep;
        $this->perm_rep = $permission_rep;
        $this->template = env('THEME').'.admin.permission.permission_template';

    }

    public function index()
    {

        $roles = $this->role_rep->getRoles();
        $perms = $this->perm_rep->getPermission();

        $this->content = view(env('THEME').'.admin.permission.permission_form')
            ->with('roles', $roles)
            ->with('perms', $perms)
            ->render();
        return $this->renderTemplate();
    }

    public function store(Request $request)
    {
        $data = $request->except('_token');

        $roles = $this->role_rep->getRoles();

        foreach ($roles as $role){
            if (isset($data[$role->id])){
                $role->perms()->sync($data[$role->id]);
            }else{
                $role->perms()->detach();
            }
        }

        return back();
    }
}
