@extends('layouts.admin')

@section('title')
    Создание новости - @parent
@endsection
@section('content')
    <h1>Добавить новую запись</h1>
    <br>
    <form method="post">
        <div class="form-group">
            <label for="category_id">Категория</label>
            <select class="form-control" name="category_id" id="category_id">
                <option value="0">Политика</option>
                <option value="1">Экономика</option>
                <option value="2">Спорт</option>
                <option value="3">Культура</option>
                <option value="4">Технологии</option>
            </select>
        </div>
        <div class="form-group">
            <label for="title">Заголовок</label>
            <input type="text" class="form-control" name="title" id="title">
        </div>
        <div class="form-group">
            <label for="slug">Слаг</label>
            <input type="text" class="form-control" name="slug" id="slug">
        </div>
        <div class="form-group">
            <label for="description">Текст</label>
            <textarea type="text" class="form-control" name="description" id="description"></textarea>
        </div>

        <br><button type="submit" class="btn btn-success">Сохранить</button>
    </form>
@endsection
