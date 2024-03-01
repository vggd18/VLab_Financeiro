<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Category;
use App\Models\User;

class CategoryPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): Response
    {
        return $user->perfil == 'user'
        ? Response::allow()
        : Response::deny('You do not have permission to this');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): Response
    {
        return $user->perfil == 'user'
        ? Response::allow()
        : Response::deny('You do not have permission to this');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user): Response
    {
        return $user->perfil == 'user'
        ? Response::allow()
        : Response::deny('You do not have permission to this');
    }
}
