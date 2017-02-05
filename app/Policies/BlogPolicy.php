<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BlogPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function edit(User $user)
    {
        return $user->canDo('EDIT_BLOG');
    }

    public function destroy(User $user)
    {
        return $user->canDo('DELETE_BLOG');
    }
}
