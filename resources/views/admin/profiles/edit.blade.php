@extends('layouts.admin')

@section('content')
    @if(session()->has('success'))
        <div class="alert alert-success">{{ session()->get('success') }}</div>
    @endif
    <h1>Изменение учетных данных</h1>
    <form method="post" action="{{ route('profiles.update', ['profile' => $user]) }}">
        @method('put')
        @csrf

        <label for="id">ID</label>
        @if($errors->has('id'))
            <div class="alert alert-danger">
                @foreach($errors->get('id') as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif
        <input class="form-control" name="id" value="{{ $user->id }}"> <br>

        <label for="name">Имя (E-mail)</label>
        @if($errors->has('name'))
            <div class="alert alert-danger">
                @foreach($errors->get('name') as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif
        <input class="form-control" name="name" value="{{ $user->name }}"> <br>

        <label for="email">E-mail</label>
        @if($errors->has('email'))
            <div class="alert alert-danger">
                @foreach($errors->get('name') as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif
        <input class="form-control" name="email" value="{{ $user->email }}"> <br>

        <label for="password">Пароль</label>
        @if($errors->has('password'))
            <div class="alert alert-danger">
                @foreach($errors->get('password') as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif
        <input class="form-control" name="password" type="password"> <br>

        <label for="is_admin">Является ли администратором</label>
        @if($errors->has('is_admin'))
            <div class="alert alert-danger">
                @foreach($errors->get('is_admin') as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif
        <select class="form-control" name="is_admin" id="is_admin">
            <option value="0" @if($user->is_admin == 0) selected @endif>Нет</option>
            <option value="1" @if($user->is_admin == 1) selected @endif>Да</option>
        </select> <br>

        <button type="submit" class="form-control">
            Изменить
        </button>
    </form>
@endsection
