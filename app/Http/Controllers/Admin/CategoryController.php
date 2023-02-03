<?php declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\QueryBuilders\CategoryQueryBuilder;
use App\Models\Category as CategoryModel;
use App\Http\Requests\Categories\CreateRequest;
use App\Http\Requests\Categories\EditRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CategoryQueryBuilder $categoryQueryBuilder)
    {
        return \view('admin.categories.index', [
            'categoriesList' => $categoryQueryBuilder->getCategoriesWithPagination(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Categories\CreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        $category = CategoryModel::create($request->validated());

        if ($category->save()) {
            return \redirect()->route('admin.categories.index')->with('success', 'Категория добавлена');
        }
        return \back()->with('error', 'Не удалось сохранить категорию');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryModel $category)
    {
        return \view('admin.categories.edit', [
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Categories\EditRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequest $request, CategoryModel $category)
    {
        $category->fill($request->validated());
        if ($category->save()) {
            return \redirect()->route('admin.categories.index')->with('success', 'Категория обновлена');
        }
        return \back()->with('error', 'Не удалось сохранить категорию');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd('asdasdad');
    }
}
