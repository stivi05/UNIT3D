<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ArticleController
 */
class ArticleControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function index_returns_an_ok_response()
    {
        $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

        $articles = \App\Models\Article::factory()->times(3)->create();

        $response = $this->get(route('articles.index'));

        $response->assertOk();
        $response->assertViewIs('article.index');
        $response->assertViewHas('articles', $articles);

        // TODO: perform additional assertions
    }

    /**
     * @test
     */
    public function show_returns_an_ok_response()
    {
        $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

        $article = \App\Models\Article::factory()->create();

        $response = $this->get(route('articles.show', ['id' => $article->id]));

        $response->assertOk();
        $response->assertViewIs('article.show');
        $response->assertViewHas('article', $article);

        // TODO: perform additional assertions
    }

    // test cases...
}
