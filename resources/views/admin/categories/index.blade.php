@extends('layouts.admin')
@section('content')   
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Список категорий</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('admin.categories.create') }}">Добавить категорию</a>
        </div>
    </div>
    
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Название</th>
                    <th>Описание</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categoriesList as $category)
                <tr param="categories" item>
                    <td class="id" id="{{ $category->id }}">{{$category->id}}</td>
                    <td>{{$category->title}}</td>
                    <td>{{$category->description}}</td> 
                    <td class="actions-td"><a href="{{ route('admin.categories.edit', ['category' => $category]) }}">Изм.</a> &nbsp; 
                    <div class="delete">Уд.</div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4">Записей нет</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        
    </div>
@endsection        