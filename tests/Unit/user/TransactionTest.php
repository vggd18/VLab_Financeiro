<?php

namespace Tests\Unit\user;

use App\Models\{Category, Pessoa};
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
        $pessoa = Pessoa::create([
            'full_name' => 'Vitor Dias',
            'cpf' => '011.111.111-01',
            'reg_date' => '2024-02-28 11:03:44',
            'email' => 'vd@mail.com',
            'password' => '1111'
        ]);

        $category = Category::create(['name' => 'compras']);

        $response = $this->post('/transaction', [
            'user' => $pessoa->id, 
            'category' => $category->name,
            'type' => 'payment',
            'value' => 100.50
        ]);

        $response->assertStatus(200);
        $response->assertJson(['message' => 'Transaction created successfuly']);

        $this->assertDatabaseHas('transactions', [
            'user' => $pessoa->id,
            'category' => $category->name,
            'type' => 'payment',
            'value' => 100.50
        ]);
    }

    // DESTROY TESTS
    public function test_transaction_removal()
    {
        $pessoa = Pessoa::create([
            'full_name' => 'Vitor Dias',
            'cpf' => '011.111.111-01',
            'reg_date' => '2024-02-28 11:03:44',
            'email' => 'vd@mail.com',
            'password' => '1111'
        ]);

        $category = Category::create(['name' => 'compras']);

        $transaction = Transaction::create([
            'user' => $pessoa->id, 
            'category' => $category->name,
            'type' => 'payment',
            'value' => 100.50
        ]);

        $response = $this->delete('/transaction/' . $transaction->id);

        $response->assertOk();
        $response->assertJson(['message' => 'Transaction removed successfuly']);

        $this->assertDatabaseMissing('transactions', [
            'id' => $transaction->id
        ]);
    }
}
