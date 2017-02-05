<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    protected $fillable = [
        'name'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function perms(){
        return $this->belongsToMany(Permission::class);
    }

    public function hasPermission($name, $require = false)
    {
        if(is_array($name))
        {
            foreach ($name as $permissionName){
                $hasPermission = $this->hasPermission($permissionName);
                if($hasPermission && !$require){
                    return true;
                }else if(!$hasPermission && $require){
                    return false;
                }
            }
            return $require;
        }else{
            foreach ($this->perms as $permission){
                if ($permission->name == $name){
                    return true;
                }
            }
        }
        return FALSE;
    }
}
