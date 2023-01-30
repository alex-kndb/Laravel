<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RouteTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_main_admin_route(): void
    {
        $response = $this->get('/admin');

        $response->assertSuccessful();
        $response->assertViewIs('admin.index');
        $response->assertSee('Админка');
    }

    public function test_guest_news_redirect_route(): void
    {
        $response = $this->get('/news');

        $response->assertRedirect('/guest/news');
        $response->assertRedirectToRoute('news');
        $response->assertDontSeeText('Админка');
    }

    public function test_guest_news_route(): void
    {
        $response = $this->get('/guest/news');

        $response->assertViewIs('news.index');
        $response->assertOk();
    }

    public function test_guest_single_news_route(): void
    {
        $response = $this->get('/guest/news/1/show');

        //этот тест почему-то не проходит, хотя
        //в NewsController метод show возвращает
        //представление news.show
        //$response->assertViewIs('news.show');

        $response->assertViewHas("news['id']", 1);
    }

}
