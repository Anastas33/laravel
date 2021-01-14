@extends('layouts.admin')

@section('title')
    Все новости - @parent
@endsection
@section('content')
    @if(session()->has('success'))
        <div class="alert alert-success">{{ session()->get('success') }}</div>
    @endif
    <h1>Все новости из всех категорий</h1>
    @forelse ($news as $key => $value)
        @isset($value['title'])
            <h2>
                <a href="{{ route('categories.news.index', ['category' => $value['category_id'], 'news' => $key]) }}">{{ $value['title'] }}</a>
                <p>Новость из категории {{ $categories[$value['category_id']]['title'] }}</p>
            </h2>
            <p>
                <a href="{{ route('news.edit', ['news' => $key]) }}">Редакировать новость</a>
            </p>
            <hr>
        @endisset
    @empty
        <h2>Нет новостей</h2>
    @endforelse
@endsection
