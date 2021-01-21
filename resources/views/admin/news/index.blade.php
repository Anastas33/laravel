@extends('layouts.admin')

@section('title')
    Все новости - @parent
@endsection
@section('content')
    @if(session()->has('success'))
        <div class="alert alert-success">{{ session()->get('success') }}</div>
    @endif
    <h1>Все новости из всех категорий</h1>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Категория</th>
            <th>Новость</th>
            <th>Дата добавления</th>
            <th>Управление</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($newsList as $news)
            <tr>
                <td>{{ $news->id }}</td>
                <td>{{ $news->category_title }}</td>
                <td>{{ $news->title }}</td>
                <td>{{ now()->format('d-m-Y H:i:s') }}</td>
                <td><a href="{{ route('news.edit', ['news' => $news->id]) }}">Редакировать</a></td>
            </tr>
        @empty
            <h2>Нет новостей</h2>
        @endforelse
        </tbody>
    </table>
@endsection
