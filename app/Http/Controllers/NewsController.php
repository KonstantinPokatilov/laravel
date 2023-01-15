<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    use NewsTrait;

    public function index()
    {
        return \view('news.index', ['news' => $this->getNews()]);
    }

    public function show(int $id)
    {
        return $this->getNews($id);
    }

    public function getCategories()
    {
        return \view('news.categories', ['categories' => $this->getNewsCategories()]);
    }

    public function getNewsByCategories(int $id)
    {
        return \view('news.index', ['news' => $this->getNewsByCategory($id)]);
    }
}
