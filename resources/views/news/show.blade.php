@extends('layouts.main')
@section('content')
    <div class="show-flex">
        <div class="blog-post">
            <h2 class="blog-post-title">{{ $news->title }}</h2>
            <p class="blog-post-meta">{{ $news->created_at }} by <a href="#">{{ $news->author }}</a></p>
            <p>{!! $news->description !!}</p>
        </div>
        <div class="comments">
            @foreach($comments as $comment)
            <div class="comment">
                <div class="user-name">
                    {{ $comment->user_name }} :
                </div>
                <div class="comment-description">
                        {{ $comment->comment }}
                </div>
                <div class="comment-date">
                    {{ $comment->created_at }}
                </div>
            </div>
            @endforeach
        </div>
        <div style="width: 300px">
            <div class="comment-title">Добавить комментарий: </div>
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <x-alert type="danger" :message="$error"></x-alert>
                    @endforeach
                @endif
                <form method="post" action="{{ route('comment.news.store', ['news_id' => $news->id]) }}">
                    @csrf
                    <div class="form-group">
                        <label for="user_name">Имя</label>
                        <input type="text" id="user_name" name="user_name" class="form-control">
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