@extends('layouts.admin')

@section('title')
    Создание новости - @parent
@endsection
@section('content')
    <h1>Добавить новую запись</h1>
    <br>
    <form method="post" action="{{ route('news.store') }}">
        @csrf
        <div class="form-group">
            <label for="category_id">Категория</label>
            <select class="form-control" name="category_id" id="category_id">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="title">Заголовок</label>
            <input type="text" class="form-control" name="title" value="{{ old('title') }}" id="title">
        </div>
        <div class="form-group">
            <label for="description">Текст</label>
            <textarea type="text" class="form-control" name="description" value="{!! old('description') !!}" id="description"></textarea>
        </div>

        <br><button type="submit" class="btn btn-success">Сохранить</button>
    </form>
@endsection
