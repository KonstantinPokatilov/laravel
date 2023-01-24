@extends('layouts.main')
@section('content')
    <div class="show-flex">
        <div class="blog-post">
            <h2 class="blog-post-title">{{ $news['title'] }}</h2>
            <p class="blog-post-meta">{{ $news['created_at'] }} by <a href="#">{{ $news['author'] }}</a></p>
            <p>{!! $news['description'] !!}</p>
        </div>

        <div>
            <div class="comment-title">Добавить комментарий: </div>
                <form method="POST" action="{{ route('comment.create.store', ['id' => $news['id']]) }}">
                    @csrf
                    <div class="form-group">
                        <label for="username">Имя</label>
                        <input type="text" id="username" name="username" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="comment">Описание</label>
                        <textarea class="form-control" name="comment" id="comment" cols="30" rows="10"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Сохранить</button>
                </form>
        </div>
    </div>
@endsection