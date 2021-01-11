<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link @if(request()->is('admin/news')) active @endif" href="{{ route('admin.news') }}">
                    <span data-feather="file"></span>
                    Новости
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->is('admin/news/create')) active @endif" aria-current="page" href="{{ route('admin.news.create') }}">
                    <span data-feather="home"></span>
                    Создать новость
                </a>
            </li>
        </ul>
    </div>
</nav>
