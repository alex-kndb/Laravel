<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">

            <li class="nav-item">
                <a class="nav-link @if (request()->routeIs('admin.index')) active @endif" href="{{ route('admin.index') }}">
                    <span data-feather="home"></span>
                    Главная
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link @if (request()->routeIs('admin.categories.*')) active @endif" href="{{ route('admin.categories.index') }}">
                    <span data-feather="shopping-cart"></span>
                    Категории
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link @if (request()->routeIs('admin.users.*')) active @endif" href="{{ route('admin.users.index') }}">
                    <span data-feather="users"></span>
                    Пользователи
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link @if (request()->routeIs('admin.news.*')) active @endif" href="{{ route('admin.news.index') }}">
                    <span data-feather="bar-chart-2"></span>
                    Новости
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link @if (request()->routeIs('admin.sources.*')) active @endif" href="{{ route('admin.sources.index') }}">
                    <span data-feather="bar-chart-2"></span>
                    Источники
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link @if (request()->routeIs('admin.feedbacks.*')) active @endif" href="{{ route('admin.feedbacks.index') }}">
                    <span data-feather="bar-chart-2"></span>
                    Отзывы
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link @if (request()->routeIs('admin.parser')) active @endif" href="{{ route('admin.parser') }}">
                    <span data-feather="bar-chart-2"></span>
                    Парсер
                </a>
            </li>


        </ul>
    </div>
</nav>
