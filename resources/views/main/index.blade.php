<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('stylesheets/normalize.css')}}" />
    <link rel="stylesheet" href="{{asset('stylesheets/main/burger.css')}}" />
    <link rel="stylesheet" href="stylesheets/main/index.css">
    <title>Главная</title>
</head>
<body>
    <div class="title__block">
        <header>
            <div class="hamburger-menu">
                @auth

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
                    <li><a class="menu__item" href="{{ route('main.index') }}">Главная</a></li>
                    <li><a class="menu__item" href="{{route('news.index')}}">Новости</a></li>
                    <li><a class="menu__item" href="{{ route('tournaments.active') }}">Турниры</a></li>
                    <li><a class="menu__item" href="#">Галерея</a></li>
                    <li><a class="menu__item" href="{{route('management.index')}}">Руководство</a></li>
                    <li><a class="menu__item" href="{{route('partners.index')}}">Партнёры</a></li>
                    <li><a class="menu__item" href="#">Проекты</a></li>
                    <li><a class="menu__item" href="#">Коммерческие услуги</a></li>
                    @auth
                        <li><a class="menu__item menu__dashboard" href="{{ route('dashboard.index') }}">Личный кабинет</a></li>
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

        <div class="title__smooth"></div>
        <div class="title__content">
            <img class="title__logo" src="{{ asset('images/logo.svg') }}" alt="Логотип">
            <h1 class="title__text">Общественная организация<br>«Федерация лапты города Тюмени»</h1>
        </div>
    </div>
    
    <div class="content">
        <section class="partners">
            <h2>ПРИ ПОДДЕРЖКЕ</h2>
            <div class="partners_img">
                <a href="https://soc.admtyumen.ru/">
                    <img src="{{ asset('images/partners/gerb_tum.svg') }}" alt="Правительство тюменской области">
                </a>
                <a href="https://sport.admtyumen.ru/">
                    <img src="{{ asset('images/partners/dep_sport.png') }}" alt="Департамент по спорту г.Тюмени">
                </a>
                <a href="https://sport.tyumen-city.ru/">
                    <img src="{{ asset('images/partners/dep_smp.svg') }}" alt="Департамент">
                </a>
                <a href="https://президентскиегранты.рф/">
                    <img src="{{ asset('images/partners/fpg.svg') }}" alt="Фонд президентских грантов">
                </a>
                <a href="https://www.utmn.ru/">
                    <img src="{{ asset('images/partners/tumgu.svg') }}" alt="ТюмГУ">
                </a>
                <a href="https://tkpst.ru/">
                    <img src="{{ asset('images/partners/tkpst.svg') }}" alt="ТКПСТ">
                </a>
                <a href="https://www.utmn.ru/">
                <img src="{{ asset('images/partners/school.png') }}" alt="Школа">
                </a>

                <a href="https://school56-tmn.ru/">
                    <img src="{{ asset('images/partners/rus_lapta.png') }}" alt="Федерация русской лапты России">
                </a>
            </div>
        </section>
        <section class="about">
            <h2>ЛАПТУ В МАССЫ!</h2>
            <p>
                <div class="about__list">
                    <h3 class="about__subtitle">Организация создана в целях:</h3>
                    - объединения и мобилизации усилий спортсменов по развитию лапты в городе Тюмени<br><br>
                    - ведения пропаганды по физической культуре и спорту, здорового образа жизни<br><br>
                    - вовлечения населения в активные занятия лаптой<br><br>
                    - оказания организационно-методической помощи общественным организациям, учебным заведениям различного уровня по развитию лапты<br><br>
                    - открытия спортивных секций лапты в городе Тюмени, Тюменской области<br><br>
                    - поиска необходимых внешних контрагентов имеющих,  физкультурно-спортивную принадлежность, а также с коммерческими и производственными предприятиями для достижения поставленных перед Федерацией задач<br><br>
                    - состоять членом других общественных объединений<br><br>
                    - создания и совершенствования системы подготовки высококвалифицированных спортсменов, тренеров, инструкторов, судей по лапте<br><br>
                    - комплектация сборной команды города Тюмени для участия в региональных, всероссийских и международных соревнованиях по лапте<br><br>
                    - проведение соревнований, спортивных праздников, фестивалей по лапте<br><br>
                    - обобщения и распространения передового опыта работы, участия в разработке и издании программно-нормативных документов, методических рекомендаций, учебных пособий, информационных материалов по лапте совместно с другими физкультурно-спортивными организациями<br><br>
                    - проведения соревнований, показательных выступлений<br><br>
                    - проведения лекций, семинаров, конференций и учебно-тренировочных сборов по обучению и повышению профессионального мастерства<br><br>
                </div>
            </p>
            <div class="about__smooth"></div>
        </section>
    </div>
    
    <footer>
        <h2>Контакты</h2>
        <div class="footer__row">
            <div class="footer_email">
                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M3.75 5.25L3 6V18L3.75 18.75H20.25L21 18V6L20.25 5.25H3.75ZM4.5 7.6955V17.25H19.5V7.69525L11.9999 14.5136L4.5 7.6955ZM18.3099 6.75H5.68986L11.9999 12.4864L18.3099 6.75Z" fill="#00ABED"/>
                </svg>
                <p>Если у Вас есть какие-либо вопросы, свяжитесь с нами на lapta.tymen72@mail.ru</p>
            </div>
            <img class="footer__logo" src="{{ asset('images/logo.svg') }}" alt="Логотип">
            <div class="footer_vk">
                <svg viewBox="0 0 47 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M23.1506 25.3725H25.7543C25.7543 25.3725 26.5257 25.2808 26.9115 24.9142C27.2972 24.5476 27.2972 23.8143 27.2972 23.8143C27.2972 23.8143 27.2008 20.5147 28.8401 20.0564C30.383 19.5981 32.5045 23.2644 34.626 24.6392C36.2653 25.7391 37.5189 25.4641 37.5189 25.4641L43.3048 25.3725C43.3048 25.3725 46.2942 25.1892 44.8477 22.8978C44.7513 22.7144 43.9798 21.2479 40.6047 18.1316C36.9403 14.9236 37.5189 15.4736 41.8583 9.88249C44.462 6.49118 45.5227 4.47473 45.2334 3.55817C44.9442 2.73325 42.9191 2.91657 42.9191 2.91657L36.3618 3.09988C36.3618 3.09988 35.8796 3.00823 35.4939 3.2832C35.1081 3.46651 34.9153 3.92479 34.9153 3.92479C34.9153 3.92479 33.951 6.58284 32.5045 8.7826C29.6115 13.4571 28.4544 13.7321 27.9722 13.4571C26.815 12.8155 27.1043 10.7074 27.1043 9.24089C27.1043 4.7497 27.7793 2.82491 25.6579 2.27497C24.9828 2.09166 24.4042 2 22.572 2C20.2577 2 18.3291 2 17.1719 2.45828C16.4004 2.82491 15.9183 3.55817 16.2076 3.64982C16.5933 3.74148 17.654 3.83314 18.1362 4.56639C18.8112 5.3913 18.8112 7.3161 18.8112 7.3161C18.8112 7.3161 19.1969 12.6322 17.9433 13.2738C17.0755 13.7321 15.9183 12.8155 13.3146 8.59929C11.9646 6.39953 11.0003 4.01645 11.0003 4.01645C11.0003 4.01645 10.8074 3.55817 10.5181 3.37485C10.1324 3.09988 9.5538 3.00823 9.5538 3.00823L3.38218 3.09988C3.38218 3.09988 2.41787 3.09988 2.12858 3.46651C1.83928 3.83314 2.12858 4.56639 2.12858 4.56639C2.12858 4.56639 6.95015 15.3819 12.4467 20.7896C17.3647 25.7391 23.1506 25.3725 23.1506 25.3725Z" stroke="#00ABED" stroke-width="2.47313" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
                <a class="vk__link" href="https://vk.com/lapta_utmn_pro">Наша группа в социальной сети Вконтакте</a>
            </div>
        </div>
    </footer>
</body>
</html>