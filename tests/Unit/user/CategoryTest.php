<?php

namespace Tests\Unit;

use App\Models\Category;
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
        $response = $this->post('/category', ['name' => 'internacional']);

        $response->assertStatus(200);
        $response->assertJson(['message' => 'Category created successfuly']);

        $this->assertDatabaseHas('categories', [
            'name' => 'internacional'
        ]);
    }

    // DESTROY TESTS
    public function test_delete_category_succesffuly()
    {
        $category = Category::create(['name' => 'nacional']);

        $response = $this->delete('/category/' . $category->id);

        $response->assertStatus(200);
        $response->assertJson(['message' => 'Category removed successfuly']);

        $this->assertDatabaseMissing('categories', [
            'id' => $category->id
        ]);
    }

    // SHOW TESTS
    public function test_list_transaction_categories()
    {
        $category = Category::create(['name' => 'nacional']);

        $response = $this->get('/category');
        
        $response->assertOk();

        $response->assertJsonFragment([
            'id' => $category->id,
            'name' => 'nacional'
        ]);
    }
}
