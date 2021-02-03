@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Подтвердите ваш Email адрес') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Новая ссылка для подверждения была отправлена на ваш email адрес.') }}
                        </div>
                    @endif

                    {{ __('Пожалуйста, проверьте ссылку для подтверждения на вашем email.') }}
                    {{ __('Емли вы не получили email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('нажмите здесь, чтобы запросить новую') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
