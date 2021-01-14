@extends('layouts.index')

@section('title')
    Обратная связь - @parent
@endsection
@section('content')
    <h1>Оставьте свой отзыв или комментарий</h1>
    <br>
    <form method="post" action="{{ route('feedback.store') }}">
        @csrf
        <div class="form-group">
            <label for="name">Имя</label>
            <input type="text" class="form-control" name="name" value="{{ old('name') }}" id="name">
        </div>
        <div class="form-group">
            <label for="comment">Отзыв или комментарий</label>
            <textarea type="text" class="form-control" name="comment" value="{!! old('comment') !!}" id="comment"></textarea>
        </div>

        <br><button type="submit" class="btn btn-success">Отправить</button>
    </form>
@endsection

