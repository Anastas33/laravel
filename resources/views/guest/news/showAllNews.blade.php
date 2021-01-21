@extends('layouts.index')

@section('title')
    Все новости - @parent
@endsection
@section('content')
    <h1>Все новости из всех категорий</h1>
    @forelse ($newsList as $news)
        @isset($news->title)
            <h2>
                <a href="{{ route('categories.news.show', ['category' => $news->category_id, 'news' => $news->id]) }}">{{ $news->title }}</a>
                <p>Новость из категории {{ $news->category_title }}</p>
            </h2>
            <hr>
        @endisset
    @empty
        <h2>Нет новостей</h2>
    @endforelse
    <p>
        <a href="{{ route('main') }}">Вернуться на главную страницу</a>
    </p>
@endsection
