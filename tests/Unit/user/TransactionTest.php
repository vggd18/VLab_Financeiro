<?php

namespace Tests\Unit\user;

use App\Models\Category;
use App\Models\Pessoa;
use Tests\TestCase;

class TransactionTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $this->assertTrue(true);
    }
    // CREATE FUNCTION TESTS
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

        //  Assert that the response status is not successful 
        $response->assertStatus(204);
    }

    public function test_create_transaction_fail_due_to_nonexist_category()
    {
        $pessoa = Pessoa::create([
            'full_name' => 'Gui Santos',
            'cpf' => '011.111.111-02',
            'reg_date' => '2024-02-28 11:03:44',
            'email' => 'gs@mail.com',
            'password' => '2222'
        ]);

        $response = $this->post('/transaction', [
                            'user' => $pessoa->id,
                            'type' => 'payment',
                            'category' => 'blusa',
                            'value' => 100.50
        ]);

        
        $response->assertStatus(500);
    }

    public function test_create_transaction_fail_whith_incomplete_values()
    {
        $pessoa = Pessoa::create([
            'full_name' => 'Luciano Andrade',
            'cpf' => '011.111.111-03',
            'reg_date' => '2024-02-28 11:03:44',
            'email' => 'la@mail.com',
            'password' => '333'
        ]);

        $response = $this->post('/transaction', [
                            'user' => $pessoa->id,
                            'type' => 'payment'
        ]);

        
        $response->assertStatus(500);
    }

    public function test_create_transaction_fail_without_user()
    {
        $category = Category::create(['name' => 'vendas']);

        $response = $this->post('/transaction', [ 
                            'category' => $category->name,
                            'type' => 'payment',
                            'value' => 100.50
        ]);

        
        $response->assertStatus(500);
    }

    public function test_transaction_removal()
    {
        $response = $this->delete('/transaction/1');

        $response->assertStatus(205);
    }

    public function test_transaction_fail_removal()
    {
        $response = $this->delete('/transaction/9999999');

        $response->assertStatus(500);
    }
}
