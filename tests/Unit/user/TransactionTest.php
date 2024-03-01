<?php

namespace Tests\Unit\user;

use App\Models\{Category, User};
use App\Models\Transaction;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TransactionTest extends TestCase
{
    /**
    * TESTES PARA VERIFICAR CADA FUNCIONALIDADE 
    * DAS TRANSAÇÕES QUE O USUÁRIO TEM PERMISSÃO
    */
    use RefreshDatabase;

    // CREATE TESTS
    public function test_create_transaction_succesfully()
    {
        $auth_user = User::create([
            'name' => 'Gui Santos',
            'cpf' => '011.111.111-01',
            'email' => 'gs@mail.com',
            'password' => '1111',
            'perfil' => 'user'
        ]); 

        $category = Category::create(['name' => 'compras']);

        $response = $this->actingAs($auth_user)->post('/transaction', [
            'user' => $auth_user->id, 
            'category' => $category->name,
            'type' => 'payment',
            'value' => 100.50
        ]);

        $response->assertStatus(200);
        $response->assertJson(['message' => 'Transaction created successfuly']);

        $this->assertDatabaseHas('transactions', [
            'user' => $auth_user->id,
            'category' => $category->name,
            'type' => 'payment',
            'value' => 100.50
        ]);
    }

    // DESTROY TESTS
    public function test_transaction_removal()
    {
        $auth_user = User::create([
            'name' => 'Gui Santos',
            'cpf' => '011.111.111-01',
            'email' => 'gs@mail.com',
            'password' => '1111',
            'perfil' => 'user'
        ]); 

        $category = Category::create(['name' => 'compras']);

        $transaction = Transaction::create([
            'user' => $auth_user->id, 
            'category' => $category->name,
            'type' => 'payment',
            'value' => 100.50
        ]);

        $response = $this->actingAs($auth_user)->delete('/transaction/' . $transaction->id);

        $response->assertOk();
        $response->assertJson(['message' => 'Transaction removed successfuly']);

        $this->assertDatabaseMissing('transactions', [
            'id' => $transaction->id
        ]);
    }
}
