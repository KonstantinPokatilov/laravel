<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Models\News as NewsModel;
use App\QueryBuilders\NewsQueryBuilder;
use App\QueryBuilders\CategoryQueryBuilder;
use App\Enums\NewsStatusEnum;
use Illuminate\Http\RedirectResponse;


class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(NewsQueryBuilder $newsQueryBuilder) : View
    {
        return \view('admin.news.index', [
            'newsList' => $newsQueryBuilder->getNewsWithPagination(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CategoryQueryBuilder $categoryQueryBuilder) : View
    {
        return \view('admin.news.create', [
            'categories' => $categoryQueryBuilder->get(),
            'statuses' => NewsStatusEnum::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponce
     */
    public function store(Request $request) : RedirectResponse
    {
        $request->validate([
            'title' => 'required'
        ]);

        $news = new NewsModel($request->except('_token', 'category_id', 'image')); //News::create

        if ($news->save()) {
            return \redirect()->route('admin.news.index')->with('success', 'Новость добавлена');
        }
        return \back()->with('error', 'Не удалось сохранить запись');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  NewsModel  $news
     * @param  CategoryQueryBuilder  $categoryQueryBuilder
     * @return View
     */
    public function edit(NewsModel $news, CategoryQueryBuilder $categoryQueryBuilder) : View
    {
        return \view('admin.news.edit', [
            'news' => $news,
            'categories' => $categoryQueryBuilder->get(),
            'statuses' => NewsStatusEnum::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  NewsModel  $news
     * @return \Illuminate\Http\RedirectResponce
     */
    public function update(Request $request, NewsModel $news) : RedirectResponse
    {
        $news->fill($request->except('_token', 'category_ids', 'image'));
        if ($news->save()) {
            $news->categories()->sync((array)$request->input('category_ids'));
            return \redirect()->route('admin.news.index')->with('success', 'Новость обновлена');
        }
        return \back()->with('error', 'Не удалось сохранить запись');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        
    }
}
