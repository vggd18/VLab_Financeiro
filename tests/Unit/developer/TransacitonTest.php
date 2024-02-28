<?php

namespace Tests\Unit\developer;

use App\Models\{
    Category,
    Pessoa,
    Transaction
};
use Tests\TestCase;

class TransacitonTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    
     public function test_transaction_list_all()
     {
        $pessoa = Pessoa::create([
            'full_name' => 'Vitor Dias',
            'cpf' => '011.111.111-01',
            'reg_date' => '2024-02-28 11:03:44',
            'email' => 'vd@mail.com',
            'password' => '1111'
        ]);

        $category = Category::create(['name' => 'compras']);

        Transaction::create([
            'user' => $pessoa->id,
             'type' => 'payment',
             'category' => $category->name,
             'value' => 599.99
        ]);

        $response = $this->get('/transaction');

        $response->assertOk();
        
        $response->assertJsonStructure([
            '*' => ['user', 'type', 'category', 'value', 'created_at', 'updated_at'],
        ]);
     }
 
     public function test_transaction_filter()
     {
         $pessoa = Pessoa::create([
             'full_name' => 'Vitor Junior',
             'cpf' => '044.444.444-01',
             'reg_date' => '2024-02-28 11:03:44',
             'email' => 'vj@mail.com',
             'password' => '4444'
         ]);
 
         $category = Category::create(['name' => 'ticket']);
 
         Transaction::create([
             'user' => $pessoa->id,
             'type' => 'payment',
             'category' => $category->name,
             'value' => 100.50
         ]);
 
 
         $response = $this->get('/transaction/filter/?column=user&value='. $pessoa->id);
 
         $response->assertOk();

         $response->assertJsonStructure([
            '*' => ['user', 'type', 'category', 'value', 'created_at', 'updated_at'],
        ]);
     }
}
