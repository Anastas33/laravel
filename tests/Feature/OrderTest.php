<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrderTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_redirect()
    {
        $response = $this->post('/order');

        $response->assertRedirect('/order');
    }

    public function test_a_basic_request()
    {

        $response = $this->get('/order');

        $response->assertStatus(200);
    }
}
