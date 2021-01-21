@extends('layouts.index')

@section('title')
    Новость - @parent
@endsection
@section('content')
    <h1>{{ $news->title }}</h1>
    <div>{{ $news->description }}</div>
    <p>
        <a href="{{ route('categories.news.index', ['category' => $category->id]) }}">Вернуться назад</a>
    </p>
@endsection
