@extends('layouts.admin')

@section('title')
    Все новости - @parent
@endsection
@section('content')
    <h1>Все новости из всех категорий</h1>
    @forelse ($news as $key => $value)
        @isset($value['title'])
            <h2>
                <a href="{{ route('categories.categoryId.news.id', ['categoryId' => $value['category_id'], 'id' => $key]) }}">{{ $value['title'] }}</a>
                <p>Новость из категории {{ $categories[$value['category_id']]['title'] }}</p>
            </h2>
            <p>
                <a href="{{ route('admin.news.edit', ['id' => $key]) }}">Редакировать новость</a>
            </p>
            <hr>
        @endisset
    @empty
        <h2>Нет новостей</h2>
    @endforelse
@endsection
