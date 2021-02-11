@extends('layouts.admin')

@section('title')
    Новость - @parent
@endsection
@section('content')
    <h1>{{ $news->title }}</h1>
    <p>Категория: {{ $news->category->title }}</p>
    <img src="{{ \Storage::url($news->image) }}" alt="image" style="width: 500px">
    <p>{!! $news->description !!}</p>
    <p>Статус: {{ $news->status }}</p>
    <p>Источник: {{ $news->source->url }}</p>
    <p>
        <a href="{{ route('news.index') }}">Вернуться назад</a>
    </p>
@endsection
