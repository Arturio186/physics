@extends('layouts.main')

@section('title', 'Изменение видео')

@section('some_styles')
    <link rel="stylesheet" href="{{asset('stylesheets/main/gallery/category_add.css')}}" />
@endsection

@section('content')
    <h1>Изменение видео</h1>

    <div class="container">
        <form class="form" action="{{ route('events.videos.update', ['event' => $event, 'video' => $video]) }}" method="POST">
            @csrf
            @method('PUT')
            <label for="title">Заголовок видео:</label>
            <input type="text" name="title" id="title" value="{{ $video->title }}" required>

            <label for="video_link">Ссылка на видео:</label>
            <input type="text" name="video_link" id="video_link" value="{{ $video->video_link }}" required>

            <button class="form__button" type="submit">Изменить видео</button>
        </form>

        <a class="link" href="{{ route('events.videos.index', $event) }}">Вернуться к видеозаписям</a>
    </div>
   
@endsection
