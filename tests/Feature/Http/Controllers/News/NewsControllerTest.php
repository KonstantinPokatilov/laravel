<?php

namespace Tests\Feature\Http\Controllers\News;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsControllerTest extends TestCase
{
    public function testIndexSuccessStatus()
    {
        $response = $this->get(route('news'));

        $response->assertStatus(200);
    }

    public function testGetNewsDataSuccessStatus()
    {
        $data = [
            'username' => \fake()->userName(),
            'phone' => \fake()->numberBetween(),
            'email' => \fake()->email(),
            'newsId' => \fake()->randomDigit()
        ];
        
        $response = $this->post(route('data.get.store'), $data);
        
        $response->assertStatus(200)
            ->json($data);
    }

    public function testIsGetNewsDataReturnedJson()
    {
        $data = [
            'username' => \fake()->userName(),
            'phone' => \fake()->numberBetween(),
            'email' => \fake()->email(),
            'newsId' => \fake()->randomDigit()
        ];
        
        $response = $this->post(route('data.get.store'), $data);
        
        $response->assertJson($data);
    }

    public function testIsCommentSaved()
    {
        $data = [
            'username' => \fake()->userName(),
            'comment' => \fake()->text(5),
        ];

        $id = \fake()->randomDigit();
        
        $response = $this->post(route('comment.create.store', ['id' => $id]), $data);
        
        $response->assertStatus(200);
    }

    public function testNewsCategoriesSuccess()
    {
        $id = \fake()->numberBetween(1, 4);
        
        $response = $this->get(route('news.category', ['id' => $id]));
        
        $response->assertStatus(200);
    }
}
