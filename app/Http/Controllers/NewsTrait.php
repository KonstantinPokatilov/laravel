<?php
declare(strict_types=1);

namespace App\Http\Controllers;

trait NewsTrait
{   
    public function getNewsCategories() 
    {
        $categories = [];
        $quantityCategories = 5;
        
        for ($i = 1; $i <= $quantityCategories; $i++) {
            $categories[] = [
                'id' =>  $i,
                'title' => \fake()->jobTitle()
            ];
        }
        return $categories;
      
    }

    public function getNewsByCategory(int $id) {
        $news = $this->getNews();
        $newsByCategory;

        foreach ($news as $n) {
            if ($n['category'] == $id) {
                $newsByCategory[] = $n;
            }
        }
        return $newsByCategory;
    }

    public function getNews(int $id = null)
    {
        $news = [];
        $quantityNews = 10;

        if ($id === null) {
            
            $c = 0;
            for ($i = 1; $i <= $quantityNews; $i++) {
                
                $c++;
                if ($c == 6) { $c = 1; }

                $news[] = [
                    'id' => $i,
                    'category' => $c,
                    'title' => \fake()->jobTitle(),
                    'description' => \fake()->text(100),
                    'author' => \fake()->userName(),
                    'created_at' => \now()->format('d-m-Y H:i')
                ];
            }
            return $news;
        }
        return [
            'id' => $id,
            'title' => \fake()->jobTitle(),
            'description' => \fake()->text(100),
            'author' => \fake()->userName(),
            'created_at' => \now()->format('d-m-Y H:i')
        ];
    }
}