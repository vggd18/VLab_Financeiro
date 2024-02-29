<?php

namespace Tests\Unit\developer;

use App\Models\Pessoa;
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
        $response = $this->post('/user', [
            'full_name' => 'Gui Santos',
            'cpf' => '022.222.222-02',
            'reg_date' => '2024-02-28 11:03:44',
            'email' => 'gs@mail.com',
            'password' => '2222'
        ]);
    
        $response->assertStatus(201);
    
        $response->assertJson([
            'full_name' => 'Gui Santos',
            'cpf' => '022.222.222-02',
            'email' => 'gs@mail.com',
        ]);
    
        $this->assertDatabaseHas('pessoas', [
            'full_name' => 'Gui Santos',
            'cpf' => '022.222.222-02',
            'email' => 'gs@mail.com',
        ]);
    }

    // DESTROY TESTS
    public function test_delete_user_successfuly()
    {
        $pessoa = Pessoa::create([
            'full_name' => 'Gui Santos',
            'cpf' => '022.222.222-02',
            'reg_date' => '2024-02-28 11:03:44',
            'email' => 'gs@mail.com',
            'password' => '2222'
        ]);

        $response = $this->delete('/user/' . $pessoa->id);

        $response->assertStatus(200);
        $response->assertJson(['message' => 'User removed successfuly']);

        $this->assertDatabaseMissing('pessoas', [
            'id' => $pessoa->id,
            'full_name' => 'Gui Santos',
            'cpf' => '022.222.222-02',
            'email' => 'gs@mail.com',
        ]);
    }

    // UPDATE TESTS
    public function test_edit_user_successfuly()
    {
        $pessoa = Pessoa::create([
            'full_name' => 'Martha Reis',
            'cpf' => '022.222.222-02',
            'reg_date' => '2024-02-28 11:03:44',
            'email' => 'mr@mail.com',
            'password' => '2222'
        ]);
    
        $response = $this->put('/user/'. $pessoa->id, [
            'full_name' => 'Mario Silva',
            'cpf' => '033.333.333-03',
            'email' => 'ms@mail.com',
            'password' => '3333'
        ]);
    
        $response->assertStatus(200);
    
        $this->assertDatabaseHas('pessoas', [
            'id' => $pessoa->id,
            'full_name' => 'Mario Silva',
            'cpf' => '033.333.333-03',
            'email' => 'ms@mail.com',
            'password' => '3333'
        ]);
    }

    public function test_edit_user_full_name_successfuly()
    {
        $pessoa = Pessoa::create([
            'full_name' => 'Gui Santos',
            'cpf' => '022.222.222-02',
            'reg_date' => '2024-02-28 11:03:44',
            'email' => 'gs@mail.com',
            'password' => '2222'
        ]);

        $response = $this->put('/user/' . $pessoa->id, [
            'full_name' => 'Joao Pedro',
        ]);

        $response->assertStatus(200);

        $this->assertDatabaseHas('pessoas', [
            'id' => $pessoa->id,
            'full_name' => 'Joao Pedro',
        ]);
    }

    public function test_edit_user_cpf_successfuly()
    {
        $pessoa = Pessoa::create([
            'full_name' => 'Ana Silva',
            'cpf' => '033.333.333-03',
            'reg_date' => '2024-02-28 11:03:44',
            'email' => 'as@mail.com',
            'password' => '3333'
        ]);

        $response = $this->put('/user/' . $pessoa->id, [
            'cpf' => '044.444.444-04',
        ]);

        $response->assertStatus(200);

        $this->assertDatabaseHas('pessoas', [
            'id' => $pessoa->id,
            'cpf' => '044.444.444-04',
        ]);
    }
    public function test_edit_user_email_successfuly()
    {
        $pessoa = Pessoa::create([
            'full_name' => 'Carlos Costa',
            'cpf' => '077.777.777-07',
            'reg_date' => '2024-02-28 11:03:44',
            'email' => 'cc@mail.com',
            'password' => '7777'
        ]);

        $response = $this->put('/user/' . $pessoa->id, [
            'email' => 'ccosta@mail.com',
        ]);

        $response->assertStatus(200);

        $this->assertDatabaseHas('pessoas', [
            'id' => $pessoa->id,
            'email' => 'ccosta@mail.com',
        ]);
    }

    public function test_edit_user_password_successfuly()
    {
        $pessoa = Pessoa::create([
            'full_name' => 'Daniela Dias',
            'cpf' => '055.555.555-05',
            'reg_date' => '2024-02-28 11:03:44',
            'email' => 'dd@mail.com',
            'password' => '5555'
        ]);
    
        $response = $this->put('/user/' . $pessoa->id, [
            'password' => '6666',
        ]);
    
        $response->assertStatus(200);
    
        $this->assertDatabaseHas('pessoas', [
            'id' => $pessoa->id,
            'password' => '6666',
        ]);
    }
}
