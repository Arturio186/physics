@extends('layouts.main')
@section('title', 'Личный кабинет')
@section('some_styles')
<link rel="stylesheet" href="{{asset('stylesheets/main/dashboard.css')}}" />
@endsection

@section('content')
<div class="container">
    <h2 class="subtitle">Личный кабинет</h2>
 
    @if($user->photo_path)
    <img class="avatar" src="{{ asset($user->photo_path) }}" alt="User Avatar" width="200px">
    @else
        <img class="avatar" src="{{asset('images/ava_mock.png')}}" alt="User Avatar" width="200px">
    @endif
 
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
    <form id="avatar-form" enctype="multipart/form-data" method="post" action="{{ route('uploadAvatar') }}"> 
        @csrf
        <input type="file" name="avatar" id="avatar-input" style="display: none;"> 
        <label for="avatar-input" class="dashboard__button">Изменить аватарку</label> 
    </form>
 
</div>

<h2 class="subtitle">Турниры</h3>
@if (count($user->teams) != 0)
    <div class="tournaments">
        @foreach($user->teams as $team)
            <div class="tournament-item">
                <p>Турнир: {{ $team->tournament->name }}</p>
                <p>Команда: {{ $team->name}}</p>
                <a class="dashboard__button" href="{{ route('tournaments.show', $team->tournament->id)}}">Подробнее</a>
            </div>
        @endforeach
    </div>
@else
    <p class="message">Вы не участвуете ни в одном турнире</p>
@endif
<script> 
        document.getElementById('avatar-input').addEventListener('change', () => { 
            document.getElementById('avatar-form').submit(); 
        }); 
    </script>
@endsection