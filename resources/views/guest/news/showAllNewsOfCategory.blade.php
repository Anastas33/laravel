@extends('layouts.index')

@section('title')
    Новости - @parent
@endsection
@section('content')
    <h1>Новости из категории "{{ $category->title }}"</h1>
    @forelse ($newsList as $news)
        @isset($news->title)
            <h2>
                <a href="{{ route('categories.news.show', ['category' => $category->id, 'news' => $news->id]) }}">{{ $news->title }}</a>
            </h2>
            <hr>
        @endisset
    @empty
        <h2>Нет новостей</h2>
    @endforelse
@endsection
