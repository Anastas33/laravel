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
            <th>Дата обновления</th>
            <th>Управление</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($newsList as $news)
            <tr>
                <td>{{ $news->id }}</td>
                <td>{{ $news->category->title }}</td>
                <td>{{ $news->title }}</td>
                <td>{{ $news->updated_at->format('d-m-Y H:i:s') }}</td>
                <td>
                    <a href="{{ route('news.edit', ['news' => $news->id]) }}">Редакировать</a>
                    <form method="post" action="{{ route('news.destroy', ['news' => $news]) }}">
                        @method('delete')
                        @csrf
                        <br><button type="submit" class="btn btn-success">Удалить</button>
                    </form>
                </td>
            </tr>
        @empty
            <h2>Нет новостей</h2>
        @endforelse
        </tbody>
    </table>
    {{ $newsList->links() }}
@endsection
