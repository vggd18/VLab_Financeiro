<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\User;

class UserPolicy
{
    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): Response
    {
        return $user->perfil == 'developer'
        ? Response::allow()
        : Response::deny('You do not have permission to this');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user): Response
    {
        //
        return $user->perfil == 'developer'
        ? Response::allow()
        : Response::deny('You do not have permission to this');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user): Response
    {
        //
        return $user->perfil == 'developer'
        ? Response::allow()
        : Response::deny('You do not have permission to this');
    }

}
