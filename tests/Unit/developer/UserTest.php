<?php

namespace Tests\Unit\developer;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
    * TESTES PARA VERIFICAR CADA FUNCIONALIDADE 
    * DOS USUARIOS QUE O DESENVOLVEDOR TEM PERMISSÃO
    */
    use RefreshDatabase;

    // CREATE TESTS
    public function test_create_user_successfully()
    {   
        $auth_user = User::create([
            'name' => 'Gui Santos',
            'cpf' => '022.222.222-02',
            'email' => 'gs@mail.com',
            'password' => '2222',
            'perfil' => 'developer'
        ]);

        $response = $this->actingAs($auth_user)->post('/user', [
            'name' => 'Joao Pedro',
            'cpf' => '033.333.333-03',
            'email' => 'jp@mail.com',
            'password' => '3333',
            'perfil' => 'user'
        ]);
    
        $response->assertStatus(201);
    
        $response->assertJson([
            'name' => 'Joao Pedro',
            'cpf' => '033.333.333-03',
            'email' => 'jp@mail.com',
            'perfil' => 'user'
        ]);
    
        $this->assertDatabaseHas('users', [
            'name' => 'Joao Pedro',
            'cpf' => '033.333.333-03',
            'email' => 'jp@mail.com',
            'perfil' => 'user'
        ]);
    }

    // DESTROY TESTS
    public function test_delete_user_successfuly()
    {

        $auth_user = User::create([
            'name' => 'Gui Santos',
            'cpf' => '022.222.222-02',
            'email' => 'gs@mail.com',
            'password' => '2222',
            'perfil' => 'developer'
        ]);

        $user = User::create([
            'name' => 'Martha Reis',
            'cpf' => '033.333.333-03',
            'email' => 'mr@mail.com',
            'password' => '3333',
            'perfil' => 'user'
        ]);

        $response = $this->actingAs($auth_user)->delete('/user/' . $user->id);

        $response->assertStatus(200);
        $response->assertJson(['message' => 'User removed successfuly']);

        $this->assertSoftDeleted('users', [
            'id' => $user->id,
        ]);
    }

    // UPDATE TESTS
    public function test_edit_user_successfuly()
    {
        $auth_user = User::create([
            'name' => 'Gui Santos',
            'cpf' => '011.111.111-01',
            'email' => 'gs@mail.com',
            'password' => '1111',
            'perfil' => 'developer'
        ]); 

        $user = User::create([
            'name' => 'Martha Reis',
            'cpf' => '022.222.222-02',
            'email' => 'mr@mail.com',
            'password' => '2222',
            'perfil' => 'user'
        ]);
    
        $response = $this->actingAs($auth_user)->put('/user/'. $user->id, [
            'name' => 'Mario Silva',
            'cpf' => '033.333.333-03',
            'email' => 'ms@mail.com',
            'password' => '3333',
            'perfil' => 'user'
        ]);
    
        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'name' => 'Mario Silva',
            'cpf' => '033.333.333-03',
            'email' => 'ms@mail.com',
            'perfil' => 'user'
        ]);

        $response->assertStatus(200);
    }
}
