<?php

namespace Tests\Unit;

use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    /**
    * TESTES PARA VERIFICAR CADA FUNCIONALIDADE 
    * DAS CATEGORIAS QUE O USUÁRIO TEM PERMISSÃO
    */
    use RefreshDatabase;

    // CREATE TESTS
    public function test_create_category_succesffuly()
    {

        $auth_user = User::create([
            'name' => 'Gui Santos',
            'cpf' => '011.111.111-01',
            'email' => 'gs@mail.com',
            'password' => '1111',
            'perfil' => 'user'
        ]); 

        $response = $this->actingAs($auth_user)->post('/category', ['name' => 'internacional']);

        $response->assertStatus(200);
        $response->assertJson(['message' => 'Category created successfuly']);

        $this->assertDatabaseHas('categories', [
            'name' => 'internacional'
        ]);
    }

    // DESTROY TESTS
    public function test_delete_category_succesffuly()
    {
        $auth_user = User::create([
            'name' => 'Gui Santos',
            'cpf' => '011.111.111-01',
            'email' => 'gs@mail.com',
            'password' => '1111',
            'perfil' => 'user'
        ]); 

        $category = Category::create(['name' => 'nacional']);

        $response = $this->actingAs($auth_user)->delete('/category/' . $category->id);

        $response->assertStatus(200);
        $response->assertJson(['message' => 'Category removed successfuly']);

        $this->assertDatabaseMissing('categories', [
            'id' => $category->id
        ]);
    }

    // SHOW TESTS
    public function test_list_transaction_categories()
    {
        $auth_user = User::create([
            'name' => 'Gui Santos',
            'cpf' => '011.111.111-01',
            'email' => 'gs@mail.com',
            'password' => '1111',
            'perfil' => 'user'
        ]); 

        $category = Category::create(['name' => 'nacional']);

        $response = $this->actingAs($auth_user)->get('/category');
        
        $response->assertOk();

        $response->assertJsonFragment([
            'id' => $category->id,
            'name' => 'nacional'
        ]);
    }
}
