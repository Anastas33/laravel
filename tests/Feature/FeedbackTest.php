<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FeedbackTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_a_basic_request()
    {
        $response = $this->get('/feedback');

        $response->assertStatus(200);
    }

    public function test_post()
    {
        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])->post('/feedback', ['name' => 'Настя', 'comment' => 'Комментарий']);

        $response->assertStatus(200);
    }

    public function test_an_index_view_can_be_rendered()
    {
        $view = $this->view('guest.feedback', ['name' => 'Имя']);

        $view->assertSee('Имя');
    }
}
