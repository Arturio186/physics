@extends('layouts.main')
@section('title', 'Карточка спортсмена')
@section('some_styles')
    <link rel="stylesheet" href="{{ asset('stylesheets/main/sportsmen.css') }}" />
@endsection

@section('content')
    <h1 class="subtitle">Карточка спортсмена</h1>
    <div class="card">
        <div class="avatar-section">
            @if ($sportsman->photo_path)
                <img class="avatar" src="{{ asset($sportsman->photo_path) }}" alt="User Avatar">
            @else
                <img class="avatar" src="{{ asset('images/incognito.jpg') }}" alt="User Avatar">
            @endif
        </div>
        <div class="info-section">
            <p class="name">{{ $sportsman->surname }} {{ $sportsman->name }} {{ $sportsman->mid_name }}</p>
            <div class="details">
                <p><strong>Дата рождения:</strong> {{ $sportsman->birthdate ?: 'Не указано' }}</p>
                <p><strong>Номер телефона:</strong> {{ $sportsman->phone_number ?: 'Не указано' }}</p>
                <p><strong>E-mail:</strong> {{ $sportsman->email ?: 'Не указано' }}</p>
                <p><strong>Спортивный разряд/звание:</strong> {{ $sportsman->rank ?: 'Не указано' }}</p>
                <p><strong>Территориальная принадлежность:</strong> {{ $sportsman->location ?: 'Не указано' }}</p>
                <p><strong>Место работы:</strong> {{ $sportsman->work_space ?: 'Не указано' }}</p>
                <p><strong>Место обучения:</strong> {{ $sportsman->study_place ?: 'Не указано' }}</p>
            </div>
        </div>
    </div>
@endsection
