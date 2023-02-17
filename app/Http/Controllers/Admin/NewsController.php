<?php declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Models\News as NewsModel;
use App\QueryBuilders\NewsQueryBuilder;
use App\QueryBuilders\CategoryQueryBuilder;
use App\Enums\NewsStatusEnum;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rules\Enum;
use App\Http\Requests\News\CreateRequest;
use App\Http\Requests\News\EditRequest;
use App\Services\UploadService;

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
     * @param  App\Http\Requests\News\CreateRequest  $request
     * @return \Illuminate\Http\RedirectResponce
     */
    public function store(CreateRequest $request) : RedirectResponse
    {       
        $news = NewsModel::create($request->validated());

        if ($news) {
            $news->categories()->attach($request->getCategoryIds());
            return \redirect()->route('admin.news.index')->with('success', __('messages.admin.news.success'));
        }
        return \back()->with('error', __('messages.admin.news.fail'));
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
     * @param  App\Http\Requests\News\EditRequest  $request
     * @param  NewsModel  $news
     * @param  App\Services\UploadService $uploadService
     * @return \Illuminate\Http\RedirectResponce
     */
    public function update(EditRequest $request, NewsModel $news, UploadService $uploadService) : RedirectResponse
    {
        $validated = $request->validated();
        
        if ($request->file('image')) {
            $validated['image'] = $uploadService->uploadImage($request->file('image'));
        }
        $news->fill($validated);
        if ($news->save()) {
            $news->categories()->sync($request->getCategoryIds());
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
