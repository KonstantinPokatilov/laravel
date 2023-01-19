<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;


class NewsController extends Controller
{
    use NewsTrait;

    public function index() : View
    {
        return \view('news.index', ['news' => $this->getNews(), 'categories' => $this->getNewsCategories() ]);
    }

    public function show(int $id) : View
    {
        return \view('news.show', ['news' => $this->getNews($id)]);
    }

    public function getNewsByCategories(int $id) : View
    {
        return \view('news.index', ['news' => $this->getNewsByCategory($id), 'categories' => $this->getNewsCategories()]);
    }
}
