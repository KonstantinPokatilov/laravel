<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Models\News as NewsModel;
use App\Models\Category as CategoryModel;


class NewsController extends Controller
{
    public function index() : View
    {
        $newsModel = new NewsModel();
        $newsList = $newsModel->getNews();

        $categoryModel = new CategoryModel();
        $categoryList = $categoryModel->get();

        return \view('news.index', ['news' => $newsList, 'categories' => $categoryList ]);
    }

    public function show(int $id) : View
    {
        $newsModel = new NewsModel();
        $news = $newsModel->getNewsById($id);

        return \view('news.show', ['news' => $news]);
    }

    public function getNewsByCategories(int $id) : View
    {
        $newsModel = new NewsModel();
        $news = $newsModel->getNewsByCategoryId($id);

        $categoryModel = new CategoryModel();
        $categoryList = $categoryModel->get();

        return \view('news.index', ['news' => $news, 'categories' => $categoryList]);
    }
}
