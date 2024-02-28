<?php

namespace Tests\Unit\developer;

use App\Models\Pessoa;
use Tests\TestCase;

class UserTest extends TestCase
{
    public function test_create_user_succesffuly()
    {
        $response = $this->post('/user', [
                                'full_name' => 'Vitor Dias',
                                'cpf' => '011.111.111-01',
                                'reg_date' => '2024-02-28 11:03:44',
                                'email' => 'vd@mail.com',
                                'password' => '1111'
        ]);

        $response->assertStatus(200);
    }

    public function test_delete_user_successfuly()
    {
        $response = $this->delete('/user/1');

        $response->assertStatus(200);
    }

    public function test_edit_user_successfuly()
    {
        $pessoa = Pessoa::create([
            'full_name' => 'Gui Santos',
            'cpf' => '022.222.222-02',
            'reg_date' => '2024-02-28 11:03:44',
            'email' => 'gs@mail.com',
            'password' => '2222'
        ]);
    
        $response = $this->put('/user/1', [
            'full_name' => 'Joao Pedro',
            'cpf' => '033.333.333-03',
            'email' => 'jp@mail.com',
            'password' => '3333'
        ]);
    
        $response->assertStatus(200);
    
        $this->assertDatabaseHas('pessoas', [
            'id' => $pessoa->id,
            'full_name' => 'Joao Pedro',
            'cpf' => '033.333.333-03',
            'email' => 'jp@mail.com',
            'password' => '3333'
        ]);
    }
    
}
