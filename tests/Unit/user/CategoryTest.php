<?php

namespace Tests\Unit;

use App\Models\Category;
use App\Models\Pessoa;
use App\Models\Transaction;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $this->assertTrue(true);
    }

    public function test_create_category_succesffuly()
    {
        $response = $this->post('/category', ['name' => 'internacional']);

        $response->assertStatus(200);
    }

    public function test_create_category_fail_existing_category()
    {
        $response = $this->post('/category', ['name' => 'internacional']);

        $response->assertStatus(500);
    }

    public function test_create_category_fail_no_category()
    {
        $response = $this->post('/category');

        $response->assertStatus(500);
    }

    public function test_delete_category_succesffuly()
    {
        $response = $this->delete('/category/1');

        $response->assertStatus(200);
    }

    public function test_delete_category_fail()
    {
        $response = $this->delete('/category/99999');

        $response->assertStatus(500);
    }

    public function test_list_transaction_categories()
    {
        Category::create(['name' => 'nacional']);
        $response = $this->get('/category');
        
        $response->assertOk();

        $response->assertJsonStructure([
            '*' => ['id', 'name', 'created_at', 'updated_at'],
        ]);
    }
}
