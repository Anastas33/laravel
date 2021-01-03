@extends('layouts.index')

@section('title')
    Новости - @parent
@endsection
@section('content')
    <h1>Новости из категории {{ $categories[$id]['title'] }}</h1>
    @forelse ($news as $key => $value)
        @isset($value['title'])
            <h2>
                <a href="{{ route('categories.categoryId.news.id', ['categoryId' => $id, 'id' => $key]) }}">{{ $value['title'] }}</a>
            </h2>
            <hr>
        @endisset
    @empty
        <h2>Нет новостей</h2>
    @endforelse
@endsection
