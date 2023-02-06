@extends('layouts.admin')
@section('content')   
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Список пользователей</h1>
    </div>
    
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Имя</th>
                    <th>Статус</th>
                    <th>Почта</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                @forelse($usersList as $user)
                <tr param="categories" item>
                    <td class="id" id="{{ $user->id }}">{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->is_admin}}</td> 
                    <td>{{$user->email}}</td> 
                    <td class="actions-td"><a href="{{ route('admin.users.edit', ['user' => $user]) }}">Изм.</a> &nbsp; 
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