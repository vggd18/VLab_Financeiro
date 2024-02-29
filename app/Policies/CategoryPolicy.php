<?php

namespace App\Policies;

use App\Models\Pessoa;
use Illuminate\Auth\Access\Response;

class CategoryPolicy
{
    /**
     * Create a new policy instance.
     */
    public function show(Pessoa $pessoa): Response
    {
    return $pessoa->perfil === 'user'
                ? Response::allow()
                : Response::deny('You do not have permission to this');
    }

    public function create(Pessoa $pessoa): Response
    {
    return $pessoa->perfil === 'user'
                ? Response::allow()
                : Response::deny('You do not have permission to this');
    }

    public function delete(Pessoa $pessoa): Response
    {
    return $pessoa->perfil === 'user'
                ? Response::allow()
                : Response::deny('You do not have permission to this');
    }
}
