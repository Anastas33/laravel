@extends('layouts.index')

@section('title')
    Категории - @parent
@endsection
@section('content')
    <h1>Категории новостей</h1>
    @forelse ($categories as $key => $category)
        @isset($category['title'])
            <h2>
                <a href="{{ route('categories.news.index', ['category' => $key]) }}">{{ $category['title'] }}</a>
            </h2>
        @endisset
    @empty
        <h2>Категорий новостей нет</h2>
    @endforelse
@endsection
