<?php

namespace Tests\Unit\developer;

use App\Models\{
    Category,
    User,
    Transaction
};
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TransacitonTest extends TestCase
{
    /**
    * TESTES PARA VERIFICAR CADA FUNCIONALIDADE 
    * DAS TRANSAÇÕES QUE O DESENVOLVEDOR TEM PERMISSÃO
    */
     use RefreshDatabase;
    
    // SHOW TESTS
     public function test_transaction_list_all()
     {
        
        $auth_user = User::create([
            'name' => 'Gui Santos',
            'cpf' => '011.111.111-01',
            'email' => 'gs@mail.com',
            'password' => '1111',
            'perfil' => 'developer'
        ]); 

        $category = Category::create(['name' => 'compras']);

        Transaction::create([
            'user' => $auth_user->id,
             'type' => 'payment',
             'category' => $category->name,
             'value' => 599.99
        ]);

        $response = $this->actingAs($auth_user)->get('/transaction');

        $response->assertOk();
        
        $response->assertJsonStructure([
            '*' => ['user', 'type', 'category', 'value', 'created_at', 'updated_at'],
        ]);
     }
 
     public function test_transaction_filter()
     {
        $auth_user = User::create([
            'name' => 'Gui Santos',
            'cpf' => '011.111.111-01',
            'email' => 'gs@mail.com',
            'password' => '1111',
            'perfil' => 'developer'
        ]); 
 
         $category = Category::create(['name' => 'ticket']);
 
         Transaction::create([
             'user' => $auth_user->id,
             'type' => 'payment',
             'category' => $category->name,
             'value' => 100.50
         ]);
 
 
         $response = $this->actingAs($auth_user)->get('/transaction/filter/?column=user&value='. $auth_user->id);
 
         $response->assertOk();

         $response->assertJsonStructure([
            '*' => ['user', 'type', 'category', 'value', 'created_at', 'updated_at'],
        ]);
     }
}
