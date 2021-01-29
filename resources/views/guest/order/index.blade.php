@extends('layouts.index')

@section('title')
    Все заказы - @parent
@endsection
@section('content')
    @if(session()->has('success'))
        <div class="alert alert-success">{{ session()->get('success') }}</div>
    @endif
    <h1>Все заказы</h1>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Имя</th>
            <th>Телефон</th>
            <th>email</th>
            <th>Информация</th>
            <th>Дата обновления</th>
            <th>Управление</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->user_name }}</td>
                <td>{{ $order->phone }}</td>
                <td>{{ $order->email }}</td>
                <td>{{ $order->info }}</td>
                <td>{{ $order->updated_at->format('d-m-Y H:i:s') }}</td>
                <td>
                    <a href="{{ route('allOrders.edit', ['allOrder' => $order->id]) }}">Редакировать</a>
                    <form method="post" action="{{ route('allOrders.destroy', ['allOrder' => $order]) }}">
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
    {{ $orders->links() }}
@endsection
