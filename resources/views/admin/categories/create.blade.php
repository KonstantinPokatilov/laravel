@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Добавить категорию</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            
        </div>
    </div>
    <div>
        @if($errors->any())
            @foreach($errors->all() as $error)
                <x-alert type="danger" :message="$error"></x-alert>
            @endforeach
        @endif
        <form method="post" action="{{ route('admin.categories.store') }}">
            @csrf
            <div class="form-group">
                <label for="title">Название</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}">
            </div>
            <div class="form-group">
                <label for="desctription">Описание</label>
                <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{ old('description') }}</textarea>
            </div>
            <button type="submit" class="btn btn-success">Сохранить</button>
        </form>
    </div>
@endsection