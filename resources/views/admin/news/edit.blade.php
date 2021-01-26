@extends('layouts.admin')

@section('title')
    Редактирование новости - @parent
@endsection
@section('content')

    <h1>Редактировать запись</h1>
    <br>
    <form method="post" action="{{ route('news.edit', ['news' => $news->id]) }}">
        @csrf
        <div class="form-group">
            <label for="category_id">Категория</label>
            <select class="form-control" name="category_id" id="category_id">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" @if($category->id == $news->category_id) selected @endif>{{ $category->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="title">Заголовок</label>
            <input type="text" class="form-control" name="title" value="{{ $news->title }}" id="title">
        </div>
        <div class="form-group">
            <label for="description">Текст</label>
            <textarea type="text" class="form-control" name="description" id="description">{!! $news->description !!}</textarea>
        </div>

        <br><button type="submit" class="btn btn-success">Сохранить</button>
    </form>
@endsection
