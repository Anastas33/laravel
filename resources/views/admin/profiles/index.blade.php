@extends('layouts.admin')

@section('title')
    Все записи - @parent
@endsection
@section('content')
    @if(session()->has('success'))
        <div class="alert alert-success">{{ session()->get('success') }}</div>
    @endif
    <h1>Все учетные записи</h1>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Имя</th>
            <th>email</th>
            <th>Админ</th>
            <th>Дата обновления</th>
            <th>Управление</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->is_admin }}</td>
                <td>{{ $user->updated_at->format('d-m-Y H:i:s') }}</td>
                <td>
                    <a href="{{ route('profile.edit', ['profile' => $user->id]) }}">Редакировать</a>
                    <form method="post" action="{{ route('profile.destroy', ['profile' => $user]) }}">
                        @method('delete')
                        @csrf
                        <br><button type="submit" class="btn btn-success">Удалить</button>
                    </form>
                </td>
            </tr>
        @empty
            <h2>Нет записей</h2>
        @endforelse
        </tbody>
    </table>
    {{ $users->links() }}
@endsection
