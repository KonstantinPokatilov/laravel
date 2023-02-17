@extends('layouts.admin')
@section('content')   
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Список источников</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('admin.sources.create') }}">Добавить источник</a>
        </div>
    </div>
    
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Краткое наименование</th>
                    <th>Ссылка на источник</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                @forelse($sourcesList as $source)
                <tr param="news" item>
                    <td class="id" id="{{ $source->id }}" >{{$source->id}}</td>
                    <td>{{$source->title}}</td>
                    <td>{{$source->link}}</td>
                    <td class="actions-td"><a href="{{ route('admin.sources.edit', ['source' => $source]) }}">Изм.</a> &nbsp; 
                    <div class="delete">Уд.</div>
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