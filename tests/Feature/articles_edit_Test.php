<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;


class articles_edit_Test extends TestCase
{
    /** @test */
    public function user_can_articles_store()
    {
        // $response = $this->post('articles.store', ['title' => 'New Title']);

        // // $response->assertStatus(302); // リダイレクトのステータスコード
        // // $user = User::factory()->create();
        // // $response = $this->actingAs($user)->post('articles.store', ['title' => 'New Title']);

        // $response->assertRedirect(route('home.index')); // home.index にリダイレクトされることを確認

    }
}
