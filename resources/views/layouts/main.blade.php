<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('stylesheets/normalize.css')}}" />
    <link rel="stylesheet" href="{{asset('stylesheets/main/burger.css')}}" />
    <link rel="stylesheet" href="{{asset('stylesheets/main/main.css')}}" />
    @yield('some_styles')
    <title>@yield('title')</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>
    <header>
        <img src="{{asset('images/tumgu_logo.svg')}}" alt="Логотип ТюмГУ" class="logo"/>
        <img src="{{asset('images/logo.svg')}}" alt="Логотип" class="logo"/>
        <div class="hamburger-menu">
            @auth
                <p class="user-name">Приветствую, {{ Auth::user()->name }}</p>
            @else
                <div class="auth__buttons">
                    <a class="auth" href="{{route('page.login')}}">Войти</a>
                    <a class="auth" href="{{route('page.register')}}">Зарегистрироваться</a>
                </div>
            @endauth
            <input id="menu__toggle" type="checkbox" />
            <label class="menu__btn" for="menu__toggle">
                <span></span>
            </label>
            <ul class="menu__box">
                <li><a class="menu__item" href="#">Главная</a></li>
                <li><a class="menu__item" href="{{route('news.index')}}">Новости</a></li>
                <li><a class="menu__item" href="#">Турниры</a></li>
                <li><a class="menu__item" href="{{route('management.index')}}">Руководство</a></li>
                <li><a class="menu__item" href="{{route('partners.index')}}">Партнёры</a></li>
                <li><a class="menu__item" href="#">Проекты</a></li>
                <li><a class="menu__item" href="#">Коммерческие услуги</a></li>
                @auth
                    <li><a class="menu__item menu__dashboard" href="{{ route('news.index') }}">Личный кабинет</a></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="menu__item menu__button" type="submit">Выйти из аккаунта</button>
                        </form>
                    </li>
                @endauth
            </ul>
        </div>
    </header>
    
    <div class="content">
        @yield('content')
    </div>
    <script>
        $(document).ready(function () {
            // Скрыть меню при загрузке страницы
            $('.user-menu').hide();

            // Показываем/скрываем меню при клике на имя пользователя
            $('.user-name').click(function () {
                $('.user-menu').toggle();
            });

            // Скрытие меню при клике вне него
            $(document).mouseup(function (e) {
                var container = $(".user-menu");
                if (!container.is(e.target) && container.has(e.target).length === 0) {
                    container.hide();
                }
            });
        });
    </script>
</body>
</html>