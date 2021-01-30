@extends('layouts.admin')

@section('title')
    Создание новости - @parent
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
            @error('category_id') <div class="alert alert-danger">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label for="title">Заголовок</label>
            <input type="text" class="form-control" name="title" value="{{ old('title') }}" id="title">
            @error('title') <div class="alert alert-danger">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label for="description">Текст</label>
            <textarea type="text" class="form-control" name="description" id="description">{!! old('description') !!}</textarea>
            @error('description') <div class="alert alert-danger">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label for="source">Источник информации</label>
            <select class="form-control" name="source" id="source">
                @foreach($sources as $source)
                    <option value="{{ $source->id }}">{{ $source->url }}</option>
                @endforeach
            </select>
            @error('source') <div class="alert alert-danger">{{ $message }}</div> @enderror
        </div>

        <br><button type="submit" class="btn btn-success">Сохранить</button>
    </form>
@endsection
