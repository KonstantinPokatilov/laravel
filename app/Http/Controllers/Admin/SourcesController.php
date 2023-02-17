<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sources as SourcesModel;
use App\Http\Requests\Sources\CreateRequest;
use App\Http\Requests\Sources\EditRequest;

class SourcesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SourcesModel $sourcesModel)
    {
        return \view('admin.sources.index', [
            'sourcesList' => $sourcesModel->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \view('admin.sources.create');

    }

    public function store(CreateRequest $request)
    {
        $source = SourcesModel::create($request->validated());

        if ($source->save()) {
            return \redirect()->route('admin.sources.index')->with('success', 'Источник добавлен');
        }
        return \back()->with('error', 'Не удалось сохранить источник');
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

    public function edit(SourcesModel $source)
    {
        return \view('admin.sources.edit', [
            'source' => $source,
        ]);
    }

    public function update(EditRequest $request, SourcesModel $source)
    {
        $source->fill($request->validated());
        if ($source->save()) {
            return \redirect()->route('admin.sources.index')->with('success', 'Источник обновлен');
        }
        return \back()->with('error', 'Не удалось сохранить источник');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
