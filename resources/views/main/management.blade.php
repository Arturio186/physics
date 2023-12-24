@extends('layouts.main')
@section('title', 'Руководство')

@section('some_styles')
<link rel="stylesheet" href="{{asset('stylesheets/main/management.css')}}" />
@endsection

@section('content')
    <div class="management-container">
        <h1>Руководство</h1>
        <div class="people">
            <div class="person">
                <img src="./images/incognito.jpg" alt="Фото члена руководства"/>
                <div class="text">
                    <p class="stuff">Должность</p>
                    <p class="name">Имя Фамилия</p>
                    <p class="phone">Телефон: +79008888888</p>
                    <p class="email">E-mail: incognito@mail.ru</p>
                </div>
            </div>
            <div class="person">
                <img src="./images/incognito.jpg" alt="Фото члена руководства"/>
                <div class="text">
                    <p class="stuff">Должность</p>
                    <p class="name">Имя Фамилия</p>
                    <p class="phone">Телефон: +79008888888</p>
                    <p class="email">E-mail: incognito@mail.ru</p>
                </div>
            </div>
            <div class="person">
                <img src="./images/incognito.jpg" alt="Фото члена руководства"/>
                <div class="text">
                    <p class="stuff">Должность</p>
                    <p class="name">Имя Фамилия</p>
                    <p class="phone">Телефон: +79008888888</p>
                    <p class="email">E-mail: incognito@mail.ru</p>
                </div>
            </div>
            <div class="person">
                <img src="./images/incognito.jpg" alt="Фото члена руководства"/>
                <div class="text">
                    <p class="stuff">Должность</p>
                    <p class="name">Имя Фамилия</p>
                    <p class="phone">Телефон: +79008888888</p>
                    <p class="email">E-mail: incognito@mail.ru</p>
                </div>
            </div>
        </div>
    </div>
@endsection
