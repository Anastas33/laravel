<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\TestResponse;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_a_basic_request()
    {

        $response = $this->get('/categories');

        $response->assertStatus(200);
    }

    public function test_an_index_view_can_be_rendered()
    {
        $view = $this->view('guest.categories.index', ['categories' => [
                                                                [
                                                                    'title' => 'Политика'
                                                                ],
                                                                [
                                                                    'title' => 'Экономика'
                                                                ],
                                                            ]]);

        $view->assertSeeText('Политика');
    }
}
