@extends('layouts.main')

@section('title', 'Добавление видео')

@section('some_styles')
    <link rel="stylesheet" href="{{asset('stylesheets/main/gallery/category_add.css')}}" />
@endsection

@section('content')
    <h1>Добавление видео</h1>

    <div class="container">
        <form class="form" action="{{ route('events.videos.store', $event) }}" method="POST">
            @csrf
            <label for="title">Заголовок видео:</label>
            <input type="text" name="title" id="title" required>

            <label for="video_link">Ссылка на видео:</label>
            <input type="text" name="video_link" id="video_link" required>

            <button class="form__button" type="submit">Добавить видео</button>
        </form>

        <a class="link" href="{{ route('events.videos.index', $event) }}">Вернуться к видеозаписям</a>
    </div>
   
@endsection
