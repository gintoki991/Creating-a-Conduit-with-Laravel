<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class homeTest extends TestCase
{
    /** @test */
    public function user_can_get_all_articles()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
