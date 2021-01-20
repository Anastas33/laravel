<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GuestNewsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_a_basic_request()
    {
        $response = $this->get('/categories/2/news');

        $response->assertStatus(200);
    }

    public function test_oneNews()
    {
        $response = $this->get('/categories/2/news/3');

        $response->assertStatus(302);
    }
}
