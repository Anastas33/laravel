@extends('layouts.index')

@section('title')
    Редактирование заказа - @parent
@endsection
@section('content')
    @if(session()->has('success'))
        <div class="alert alert-success">{{ session()->get('success') }}</div>
    @endif
    <h1>Редактировать заказ</h1>
    <br>
    <form method="post" action="{{ route('allOrders.update', ['allOrder' => $order->id]) }}">
        @method('put')
        @csrf
        <div class="form-group">
            <label for="user_name">Имя</label>
            <input type="text" class="form-control" name="user_name" value="{{ $order->user_name }}" id="user_name">
        </div>
        <div class="form-group">
            <label for="phone">Номер телефона</label>
            <input type="tel" class="form-control" name="phone" value="{{ $order->phone }}" id="phone">
        </div>
        <div class="form-group">
            <label for="email">Email-адрес</label>
            <input type="email" class="form-control" name="email" value="{{ $order->email }}" id="email">
        </div>
        <div class="form-group">
            <label for="info">Информация о том, что хотите получить</label>
            <textarea type="text" class="form-control" name="info" id="info">{{ $order->info }}</textarea>
        </div>

        <br><button type="submit" class="btn btn-success">Сохранить</button>
    </form>
@endsection
