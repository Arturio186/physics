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
</head>
<body>
    <header>
        <img src="{{asset('images/tumgu_logo.svg')}}" alt="Логотип ТюмГУ" class="logo"/>
        <img src="{{asset('images/logo.svg')}}" alt="Логотип" class="logo"/>
        <div class="hamburger-menu">
            <div class="auth__buttons">
                <a class="auth" href="#">Войти</a>
                <a class="auth" href="#">Зарегистрироваться</a>
            </div>
            <input id="menu__toggle" type="checkbox" />
            <label class="menu__btn" for="menu__toggle">
                <span></span>
            </label>
            <ul class="menu__box">
                <li><a class="menu__item" href="#">Главная</a></li>
                <li><a class="menu__item" href="{{route('news.index')}}">Новости</a></li>
                <li><a class="menu__item" href="#">Турниры</a></li>
                <li><a class="menu__item" href="#">Руководство</a></li>
                <li><a class="menu__item" href="{{route('partners.index')}}">Партнёры</a></li>
                <li><a class="menu__item" href="#">Проекты</a></li>
                <li><a class="menu__item" href="#">Коммерческие услуги</a></li>
            </ul>
        </div>
    </header>
    
    <div class="content">
        @yield('content')
    </div>
</body>
</html>