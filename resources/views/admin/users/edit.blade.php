@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Редактировать пользователя</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            
        </div>
    </div>
    <div>
        @if($errors->any())
            @foreach($errors->all() as $error)
                <x-alert type="danger" :message="$error"></x-alert>
            @endforeach
        @endif
        <form method="post" action="{{ route('admin.users.update', ['user' => $user]) }}">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="name">Имя</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ $user->name }}">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" class="form-control" value="{{ $user->email }}">
            </div>
            <div class="form-group">
                <label for="is_admin">Администратор</label>
                <select class="form-control" name="is_admin" id="is_admin">
                    <option @if($user->is_admin == 1) value="1" @else value="0" @endif>@if($user->is_admin == 1) 1 @else 0 @endif</option>
                    <option @if($user->is_admin == 1) value="0" @else value="1" @endif>@if($user->is_admin == 1) 0 @else 1 @endif</option>   
                </select>
            </div>
            <button type="submit" class="btn btn-success">Сохранить</button>
        </form>
    </div>
@endsection