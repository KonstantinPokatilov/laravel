@extends('layouts.main')
@section('content')
    <div class="blog-post">
        <h2 class="blog-post-title">{{ $news['title'] }}</h2>
        <p class="blog-post-meta">{{ $news['created_at'] }} by <a href="#">{{ $news['author'] }}</a></p>
        <p>{!! $news['description'] !!}</p>
    </div>
@endsection