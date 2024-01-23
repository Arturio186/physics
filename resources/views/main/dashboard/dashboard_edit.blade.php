@extends('layouts.main')
@section('title', 'Личный кабинет')

@section('some_styles')
<link rel="stylesheet" href="{{asset('stylesheets/main/dashboard.css')}}" />
@endsection

@section('content')
<div class="container">
        <h1>Изменение данных пользователя</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('dashboard.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Фамилия -->
            <div class="mb-3">
                <label for="surname" class="form-label">Фамилия:</label>
                <input type="text" class="form-control" id="surname" name="surname" value="{{ $user->surname }}" required>
            </div>

            <!-- Имя -->
            <div class="mb-3">
                <label for="name" class="form-label">Имя:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
            </div>

            <!-- Отчество -->
            <div class="mb-3">
                <label for="mid_name" class="form-label">Отчество:</label>
                <input type="text" class="form-control" id="mid_name" name="mid_name" value="{{ $user->mid_name }}">
            </div>

            <!-- Дата рождения -->
            <div class="mb-3">
                <label for="birthdate" class="form-label">Дата рождения:</label>
                <input type="date" class="form-control" id="birthdate" name="birthdate" value="{{ $user->birthdate }}" required>
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
            </div>

            <!-- Номер телефона -->
            <div class="mb-3">
                <label for="phone_number" class="form-label">Номер телефона:</label>
                <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ $user->phone_number }}" required>
            </div>

            <!-- Место работы -->
            <div class="mb-3">
                <label for="work_space" class="form-label">Место работы:</label>
                <input type="text" class="form-control" id="work_space" name="work_space" value="{{ $user->work_space }}">
            </div>

            <!-- Место учебы -->
            <div class="mb-3">
                <label for="study_place" class="form-label">Место учебы:</label>
                <input type="text" class="form-control" id="study_place" name="study_place" value="{{ $user->study_place }}">
            </div>

            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>
@endsection