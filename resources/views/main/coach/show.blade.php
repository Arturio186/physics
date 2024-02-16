@extends('layouts.main')
@section('title', 'Карточка спортсмена')
@section('some_styles')
    <link rel="stylesheet" href="{{ asset('stylesheets/main/sportsmen.css') }}" />
@endsection

@section('content')
    <h1 class="subtitle">Карточка тренера</h1>
    <div class="card">
        <div class="avatar-section">
            @if ($coach->photo_path)
                <img class="avatar" src="{{ asset($coach->photo_path) }}" alt="User Avatar">
            @else
                <img class="avatar" src="{{ asset('images/incognito.jpg') }}" alt="User Avatar">
            @endif
        </div>
        <div class="info-section">
            <p class="name">{{ $coach->surname }} {{ $coach->name }} {{ $coach->mid_name }}</p>
            <div class="details">
                <p><strong>Дата рождения:</strong> {{ $coach->birthdate ?: 'Не указано' }}</p>
                <p><strong>Спортивный разряд/звание:</strong> {{ $coach->rank ?: 'Не указано' }}</p>
                <p><strong>Территориальная принадлежность:</strong> {{ $coach->location ?: 'Не указано' }}</p>
                <p><strong>Место работы:</strong> {{ $coach->work_space ?: 'Не указано' }}</p>
            </div>
        </div>
    </div>
@endsection
