@extends('layouts.app')
@section('content')
<div class="col-8 offset-2">
    <div>Даров {{ Auth::user()->name }}</div>
    <br>
    
    @if(Auth::user()->is_admin === true)
    <div style="display: flex; flex-direction: column">
        <a href="{{ route('admin.index') }}">В админку</a>
        <a href="{{ route('news') }}">На главную</a>
    </div>
    @else
    <div style="display: flex; flex-direction: column">
        <a href="{{ route('news') }}">На главную</a>
    </div>
    @endif
</div>
@endsection