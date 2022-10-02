<?php

namespace Tests\Feature;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class crudCategoryTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_index()
    {
        $response = $this->get('/category');

        $response->assertStatus(200);
    }
    public function test_create()
    {
        $response = $this->get('/category/create');

        $response->assertStatus(200);
    }
    public function test_edit()
    {
        $response = $this->get('/category/3');

        $response->assertStatus(200);
    }
    public function test_store()
    {
        $response = Category::create([
            'nama' => 'test',
            'user_id' => 1
        ]);
        $redirect = $this->get('/category');
        return $redirect->assertStatus(200);
    }
    public function test_update()
    {
        $category = Category::find(1);
        $response = $category->update([
            'nama' => 'update',
            'user_id' => 1
        ]);
        $redirect = $this->get('/category');
        return $redirect->assertStatus(200);
    }
    public function test_delete()
    {
        $category = Category::find(4);
        $category->delete();
        $redirect = $this->get('/category');
        return $redirect->assertStatus(200);
    }
}
