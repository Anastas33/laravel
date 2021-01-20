
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@section('title') Админка @show</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @include('guest.news.inc.css')

    @include('guest.news.inc.jsBegin')

</head>

<body>

<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container-fluid">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand" href="{{ route('main') }}">Новостной агрегатор</a>
            <div class="nav-collapse">
                <ul class="nav">
                    <li class="active"><a href="{{ route('main') }}">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
                <p class="navbar-text pull-right">Logged in as <a href="#">username</a></p>
            </div><!--/.nav-collapse -->
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row-fluid">
        <div class="span3">
            <div class="well sidebar-nav">
                <ul class="nav nav-list">
                    <li class="@if(request()->is('/')) active @endif"><a href="{{ route('main') }}">Приветствие</a></li>
                    <li class="@if(request()->is('categories')) active @endif"><a href="{{ route('categories.index') }}">Категории новостей</a></li>
                    <li class="@if(request()->is('allNews')) active @endif"><a href="{{ route('allNews') }}">Все новости</a></li>
                    <li class="@if(request()->is('feedback')) active @endif"><a href="{{ route('feedback.index') }}">Обратная связь</a></li>
                    <li class="@if(request()->is('order')) active @endif"><a href="{{ route('order.index') }}">Сделать заказ</a></li>
                </ul>
            </div><!--/.well -->
        </div><!--/span-->
        <div class="span9">
            @yield('content')
        </div><!--/span-->
    </div><!--/row-->

    <hr>

    <footer>
        <p>&copy; Company 2021</p>
    </footer>

</div><!--/.fluid-container-->

@include('guest.news.inc.jsEnd')

</body>
</html>
