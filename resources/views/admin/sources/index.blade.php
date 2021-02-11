@extends('layouts.admin')

@section('title')
    Все источники информации - @parent
@endsection
@section('content')
    @if(session()->has('success'))
        <div class="alert alert-success">{{ session()->get('success') }}</div>
    @endif
    <p><a href="{{ route('sources.create') }}">Создать источник информации</a></p>
    <h1>Все источники информации</h1>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Заголовок</th>
            <th>Источник информации</th>
            <th>Дата обновления</th>
            <th>Управление</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($sources as $source)
            <tr>
                <td>{{ $source->id }}</td>
                <td>{{ $source->title }}</td>
                <td>{{ $source->url }}</td>
                <td>{{ $source->updated_at }}</td>
                <td>
                    <a href="{{ route('sources.edit', ['source' => $source->id]) }}">Редакировать</a>
                </td>
            </tr>
        @empty
            <h2>Нет записей</h2>
        @endforelse
        </tbody>
    </table>
    {{ $sources->links() }}
@endsection
