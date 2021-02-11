@extends('layouts.admin')

@section('title')
    Редактирование записи ресурса - @parent
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
    <h1>Редактировать запись</h1>
    <br>
    <form method="post" action="{{ route('sources.update', ['source' => $source->id]) }}">
        @method('put')
        @csrf
        <div class="form-group">
            <label for="title">Заголовок</label>
            <input type="text" class="form-control" name="title" value="{{ $source->title }}" id="title">
            @error('title') <div class="alert alert-danger">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label for="url">Источник информации</label>
            <input type="text" class="form-control" name="url" value="{{ $source->url }}" id="url">
            @error('url') <div class="alert alert-danger">{{ $message }}</div> @enderror
        </div>

        <br><button type="submit" class="btn btn-success">Изменить</button>
    </form>
@endsection
