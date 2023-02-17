@extends('layouts.main')

@section('categories')
  @foreach($categories as $cat)
      <a class="p-2 text-muted" href="{{ route('news.category', ['id' => $cat->id]) }}"> {{ $cat->title }} </a>
  @endforeach
@endsection

@section('content')
@foreach($news as $i)
  <div class="col-md-6">
    <div class="card flex-md-row mb-4 box-shadow h-md-250">
      <div class="card-body d-flex flex-column align-items-start">
        <strong class="d-inline-block mb-2 text-primary">{{ $i->author }}</strong>
        <h3 class="mb-0">
          <a class="text-dark" href="#">{{ $i->title }}</a>
        </h3>
        <div class="mb-1 text-muted">{{ $i->created_at }}</div>
        <p class="card-text mb-auto">{{ $i->description }}</p>
        <a href="{{ route('news.show', ['news_id' => $i->id]) }}">Подробнее</a>
      </div>
      <img src="{{ Storage::disk('public')->url($i->image) }}">
    </div>
  </div>
@endforeach
  
  @if(method_exists($news, 'links'))
    {{ $news->links() }}
  @endif

@endsection

@section('feedback')
  <div class="form-container">
    @if($errors->any())
        @foreach($errors->all() as $error)
            <x-alert type="danger" :message="$error"></x-alert>
        @endforeach
    @endif
    <form method="post" action="{{ route('data.get.store') }}">
        @csrf
        <div class="form-group">
            <label for="user_name">Имя</label>
            <input type="text" id="user_name" name="user_name" class="form-control">
        </div>
        <div class="form-group">
            <label for="phone">Телефон</label>
            <input type="number" id="phone" name="phone" class="form-control">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="news_id">ID новости</label>
            <input type="number" id="news_id" name="news_id" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Получить данные</button>
    </form>
  </div>
@endsection