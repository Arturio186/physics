@extends('layouts.main')
@section('title', 'Личный кабинет')
@section('some_styles')
<link rel="stylesheet" href="{{asset('stylesheets/main/dashboard.css')}}" />
@endsection

@section('content')
<div class="container">
    <h2>Личный кабинет</h2>
 
    <img class="avatar" src="{{asset('images/ava_mock.png')}}" alt="User Avatar" width="200px">
 
    <p>Имя: {{$user->name}}</p>
    <p>Фамилия: {{$user->surname}}</p>
    <p>Отчество: {{$user->mid_name}}</p>
    <p>Возраст: {{$user->birthdate}}</p>
    <p>Номер телефона: {{$user->phone_number}}</p>
    <p>E-mail: {{$user->email}}</p>
    <p>Место работы: {{$user->work_space}}</p>
    <p>Место обучения: {{$user->study_place}}</p>
 
    <button id="changeDataBtn" onclick="window.location.href='{{ route('dashboard.edit') }}'">Изменить данные</button>
    <button id="changeAvatarBtn">Изменить аватарку</button>
 
    <div class="tournaments">
        <h3>Турниры</h3>
        <div class="tournament-item">
            Турнир 1
            <button class="details-button">Подробнее</button>
        </div>
        <div class="tournament-item">
            Турнир 2
            <button class="details-button">Подробнее</button>
        </div>
    </div>
</div>
@endsection