@extends('layouts.index')

@section('title')
    Все отзывы - @parent
@endsection
@section('content')
    @if(session()->has('success'))
        <div class="alert alert-success">{{ session()->get('success') }}</div>
    @endif
    <h1>Все отзывы</h1>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Имя</th>
            <th>Отзыв</th>
            <th>Дата обновления</th>
            <th>Управление</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($feedbacks as $feedback)
            <tr>
                <td>{{ $feedback->id }}</td>
                <td>{{ $feedback->user_name }}</td>
                <td>{{ $feedback->comment }}</td>
                <td>{{ $feedback->updated_at->format('d-m-Y H:i:s') }}</td>
                <td>
                    <a href="{{ route('allFeedbacks.edit', ['allFeedback' => $feedback->id]) }}">Редакировать</a>
                    <form method="post" action="{{ route('allFeedbacks.destroy', ['allFeedback' => $feedback]) }}">
                        @method('delete')
                        @csrf
                        <br><button type="submit" class="btn btn-success">Удалить</button>
                    </form>
                </td>
            </tr>
        @empty
            <h2>Нет отзывов</h2>
        @endforelse
        </tbody>
    </table>
    {{ $feedbacks->links() }}
@endsection
