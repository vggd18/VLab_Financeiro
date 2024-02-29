<?php

namespace App\Policies;

use App\Models\Pessoa;
use Illuminate\Auth\Access\Response;

class TransactionPolicy
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
    public function update(Pessoa $pessoa): Response
    {
    return $pessoa->perfil === 'developer'
                ? Response::allow()
                : Response::deny('You do not have permission to this');
    }
}
