@extends('layouts.main')

@section('title', 'Добавление категории в галерею')

@section('some_styles')
    <link rel="stylesheet" href="{{asset('stylesheets/main/gallery/category_add.css')}}" />
@endsection

@section('content')
    <h1>Добавление категории в галерею</h1>
    
    @if(session('success'))
        <div class="success-message">{{ session('success') }}</div>
    @endif
    <div class="container">
        <form action="{{ route('events.store') }}" method="POST">
            @csrf
            <label for="title">Название категории:</label>
            <input type="text" name="title" id="title" required>

            <label for="date">Дата мероприятия:</label>
            <input type="date" name="date" id="date" required>

            <button type="submit">Добавить категорию</button>
        </form>

        <a href="{{ route('events.index') }}">Вернуться к списку мероприятий</a>
    </div>
   
@endsection
