<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function canDo($permission, $require = False)
    {
        if(is_array($permission))
        {
            foreach ($permission as $permName){
                $permName = $this->canDo($permName);
                if($permName && !$require){
                    return true;
                }else if(!$permName && $require){
                    return false;
                }
            }
            return $require;
        }else{
            foreach ($this->roles as $role){
                foreach ($role->perms as $perm){
                    if (str_is($permission, $perm->name)){
                        return TRUE;
                    }
                }
            }
        }
        return FALSE;
    }


}
