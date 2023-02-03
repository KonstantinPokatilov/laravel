<?php

namespace Tests\Feature\Http\Controllers\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\News;

class NewsControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndexSuccessStatus()
    {
        $response = $this->get(route('admin.news.index'));

        $response->assertStatus(200);
    }

    public function testCreateSuccessStatus()
    {
        $response = $this->get(route('admin.news.create'));

        $response->assertStatus(200);
    }

    public function testCreateSaveSuccessData()
    {
        $news = News::factory()->definition();
        
        $response = $this->post(route('admin.news.store'), $news);

        $response->assertStatus(200);
    }

    public function testValidateTitleData()
    {
        $data = [
            'author' => \fake()->userName(),
            'description' => \fake()->text(100)
        ];
        $response = $this->post(route('admin.news.store'), $data);

        $response->assertRedirect('http://localhost');
            
    }
}
