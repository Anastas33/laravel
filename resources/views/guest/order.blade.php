@extends('layouts.index')

@section('title')
    Сделать заказ - @parent
@endsection
@section('content')
    @if(session()->has('success'))
        <div class="alert alert-success">{{ session()->get('success') }}</div>
    @endif
    <h1>Сделайте заказ на получение выгрузки данных из какого-либо источника</h1>
    <br>
    <form method="post" action="{{ route('order.store') }}">
        @csrf
        <div class="form-group">
            <label for="user_name">Имя</label>
            <input type="text" class="form-control" name="user_name" value="{{ old('user_name') }}" id="user_name">
        </div>
        <div class="form-group">
            <label for="phone">Номер телефона</label>
            <input type="tel" class="form-control" name="phone" value="{{ old('phone') }}" id="phone">
        </div>
        <div class="form-group">
            <label for="email">Email-адрес</label>
            <input type="email" class="form-control" name="email" value="{{ old('email') }}" id="email">
        </div>
        <div class="form-group">
            <label for="info">Информация о том, что хотите получить</label>
            <textarea type="text" class="form-control" name="info" value="{!! old('info') !!}" id="info"></textarea>
        </div>

        <br><button type="submit" class="btn btn-success">Отправить</button>
    </form>
@endsection

