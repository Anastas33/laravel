@extends('layouts.index')

@section('title')
    Новость - @parent
@endsection
@section('content')
    <h1>{{ $news['title'] }}</h1>
    <div>{{ $news['text'] }}</div>
    <p>
        <a href="{{ route('categories.id', ['id' => $categoryId]) }}">Вернуться назад</a>
    </p>
@endsection
