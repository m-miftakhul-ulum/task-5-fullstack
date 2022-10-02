<?php

namespace Tests\Feature;

use App\Models\Article;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class crudArticleTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_index()
    {
        $response = $this->get('/article');

        $response->assertStatus(200);
    }
    public function test_create()
    {
        $response = $this->get('/article/create');

        $response->assertStatus(200);
    }
    public function test_edit()
    {
        $response = $this->get('/article/3');

        $response->assertStatus(200);
    }
    public function test_store()
    {
        $response = Article::create([
            'title' => 'test',
            'content' => 'test',
            'image' => 'test',
            'category_id' => 2,
            'user_id' => 1
        ]);
        $redirect = $this->get('/article');
        return $redirect->assertStatus(200);
    }
    public function test_update()
    {
        $article = Article::find(1);
        $response = $article->update([
            'title' => 'update',
            'content' => 'update',
            'image' => 'update',
            'category_id' => 2,
            'user_id' => 1
        ]);
        $redirect = $this->get('/article');
        return $redirect->assertStatus(200);
    }
    public function test_delete()
    {
        $article = Article::find(1);
        $article->delete();
        $redirect = $this->get('/article');
        return $redirect->assertStatus(200);
    }
}
