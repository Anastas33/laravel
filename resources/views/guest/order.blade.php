@extends('layouts.index')

@section('title')
    Сделать заказ - @parent
@endsection
@section('content')
    <br>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
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
            @error('user_name') <div class="alert alert-danger">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label for="phone">Номер телефона</label>
            <input type="tel" class="form-control" name="phone" value="{{ old('phone') }}" id="phone">
            @error('phone') <div class="alert alert-danger">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label for="email">Email-адрес</label>
            <input type="email" class="form-control" name="email" value="{{ old('email') }}" id="email">
            @error('email') <div class="alert alert-danger">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label for="info">Информация о том, что хотите получить</label>
            <textarea type="text" class="form-control" name="info" id="info">{!! old('info') !!}</textarea>
            @error('info') <div class="alert alert-danger">{{ $message }}</div> @enderror
        </div>

        <br><button type="submit" class="btn btn-success">Отправить</button>
    </form>
@endsection

