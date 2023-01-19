@extends('layouts.main')

@section('categories')
    @foreach($categories as $cat)
        <a class="p-2 text-muted" href="{{ route('news.category', ['id' => $cat['id']]) }}"> {{ $cat['title'] }} </a>
    @endforeach
@endsection

@section('content')
@foreach($news as $i)
    <div class="col-md-6">
          <div class="card flex-md-row mb-4 box-shadow h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
              <strong class="d-inline-block mb-2 text-primary">{{ $i['author'] }}</strong>
              <h3 class="mb-0">
                <a class="text-dark" href="#">{{ $i['title'] }}</a>
              </h3>
              <div class="mb-1 text-muted">{{ $i['created_at'] }}</div>
              <p class="card-text mb-auto">{{ $i['description'] }}</p>
              <a href="{{ route('news.show', ['id' => $i['id']]) }}">Подробнее</a>
            </div>
            <img class="card-img-right flex-auto d-none d-md-block" data-src="holder.js/200x250?theme=thumb" alt="Card image cap">
          </div>
        </div>
@endforeach
@endsection