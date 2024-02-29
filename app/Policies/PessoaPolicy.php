<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Pessoa;

class PessoaPolicy
{
    /**
     * DETERMINA QUEM PODE CRIAR/EDITAR/DELETAR 
     * O USUÁRIO (CLASSE PESSOA) 
     */
    public function createProfile(Pessoa $pessoa): Response
    {
    return $pessoa->perfil === 'developer'
                ? Response::allow()
                : Response::deny('You do not have permission to this');
    }

    public function update(Pessoa $pessoa): Response
    {
    return $pessoa->perfil === 'developer'
                ? Response::allow()
                : Response::deny('You do not have permission to this');
    }

    public function remove(Pessoa $pessoa): Response
    {
    return $pessoa->perfil === 'developer'
                ? Response::allow()
                : Response::deny('You do not have permission to this');
    }
}
