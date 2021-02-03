@extends('layouts.index')

@section('title')
    Редактирование отзыва - @parent
@endsection
@section('content')
    <br>
    @if($errors->all())
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
    <h1>Редактировать отзыв</h1>
    <br>
    <form method="post" action="{{ route('allFeedbacks.update', ['allFeedback' => $feedback]) }}">
        @method('put')
        @csrf
        <div class="form-group">
            <label for="user_name">Имя</label>
            <input type="text" class="form-control" name="user_name" value="{{ $feedback->user_name }}" id="user_name">
            @error('user_name') <div class="alert alert-danger">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label for="comment">Отзыв или комментарий</label>
            <textarea type="text" class="form-control" name="comment" id="comment">{{ $feedback->comment }}</textarea>
            @error('comment') <div class="alert alert-danger">{{ $message }}</div> @enderror
        </div>

        <br><button type="submit" class="btn btn-success">Сохранить</button>
    </form>
@endsection
