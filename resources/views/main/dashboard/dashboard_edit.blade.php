@extends('layouts.main')
@section('title', 'Личный кабинет')

@section('some_styles')
<link rel="stylesheet" href="{{asset('stylesheets/main/dashboard_edit.css')}}" />
@endsection

@section('content')
<div class="container">
        <h1>Изменение данных пользователя</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('dashboard.update') }}" method="POST" class="formContainer">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="surname" class="form-label">Фамилия:</label>
                <input type="text" class="form-control" id="surname" name="surname" value="{{ $user->surname }}" >
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Имя:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" >
            </div>

            <div class="mb-3">
                <label for="mid_name" class="form-label">Отчество:</label>
                <input type="text" class="form-control" id="mid_name" name="mid_name" value="{{ $user->mid_name }}">
            </div>

            <div class="mb-3">
                <label for="birthdate" class="form-label">Дата рождения:</label>
                <input type="date" class="form-control" id="birthdate" name="birthdate" value="{{ $user->birthdate }}" >
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" >
            </div>

            <div class="mb-3">
                <label for="rank" class="form-label">Спортивный разряд/звание:</label>
                <input type="text" class="form-control" id="rank" name="rank" value="{{ $user->rank }}" >
            </div>

            <div class="mb-3">
                <label for="location" class="form-label">Территориальная принадлежность:</label>
                <input type="text" class="form-control" id="location" name="location" value="{{ $user->location }}" >
            </div>

            <div class="mb-3">
                <label for="phone_number" class="form-label">Номер телефона:</label>
                <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ $user->phone_number }}" >
            </div>

            <div class="mb-3">
                <label for="work_space" class="form-label">Место работы:</label>
                <input type="text" class="form-control" id="work_space" name="work_space" value="{{ $user->work_space }}">
            </div>

            <div class="mb-3">
                <label for="study_place" class="form-label">Место учебы:</label>
                <input type="text" class="form-control" id="study_place" name="study_place" value="{{ $user->study_place }}">
            </div>
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>
@endsection