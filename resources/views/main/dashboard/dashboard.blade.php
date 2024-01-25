@extends('layouts.main')
@section('title', 'Личный кабинет')
@section('some_styles')
<link rel="stylesheet" href="{{asset('stylesheets/main/dashboard.css')}}" />
@endsection

@section('content')
<div class="container">
    <h2 class="subtitle">Личный кабинет</h2>
 
    <img class="avatar" src="{{asset('images/ava_mock.png')}}" alt="User Avatar" width="200px">
 
    <p>Имя: {{ $user->name ?: 'Не указано' }}</p>
    <p>Фамилия: {{ $user->surname ?: 'Не указано' }}</p>
    <p>Отчество: {{ $user->mid_name ?: 'Не указано' }}</p>
    <p>Дата рождения: {{ $user->birthdate ?: 'Не указано' }}</p>
    <p>Номер телефона: {{ $user->phone_number ?: 'Не указано' }}</p>
    <p>E-mail: {{ $user->email ?: 'Не указано' }}</p>
    <p>Спортивный разряд/звание: {{ $user->rank ?: 'Не указано' }}</p>
    <p>Территориальная принадлежность: {{ $user->location ?: 'Не указано' }}</p>
    <p>Место работы: {{ $user->work_space ?: 'Не указано' }}</p>
    <p>Место обучения: {{ $user->study_place ?: 'Не указано' }}</p>


    <a class="dashboard__button" href="{{ route('dashboard.edit') }}">Изменить данные</a>
    <a class="dashboard__button" href="#">Изменить аватарку</a>
 
</div>

<h2 class="subtitle">Турниры</h3>
<div class="tournaments">
    <div class="tournament-item">
        <p>Турнир 1</p>
        <a class="dashboard__button">Подробнее</a>
    </div>
    <div class="tournament-item">
        <p>Турнир 2</p>
        <a class="dashboard__button">Подробнее</a>
    </div>
</div>
@endsection