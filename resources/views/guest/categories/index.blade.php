@extends('layouts.index')

@section('title')
    Категории - @parent
@endsection
@section('content')
    @if(session()->has('success'))
        <div class="alert alert-success">{{ session()->get('success') }}</div>
    @endif
    <h1>Категории новостей</h1>
    @forelse ($categories as $category)
        @isset($category->title)
            <h2>
                <a href="{{ route('categories.news.index', ['category' => $category->id]) }}">{{ $category->title }}</a>
            </h2>
        @endisset
    @empty
        <h2>Категорий новостей нет</h2>
    @endforelse
@endsection
