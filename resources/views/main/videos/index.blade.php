@extends('layouts.main')
@section('title', 'Видеозаписи')

@section('some_styles')
    <link rel="stylesheet" href="{{asset('stylesheets/main/video.css')}}" />
@endsection

@section('content')
    <h1 class="title">Видеозаписи</h1>
    @if (Auth::user() && Auth::user()->isAdmin())
        <a class="button__header" href="{{ route('events.videos.add', ['event' => $event]) }}">Добавить</a>
    @endif
    <div class="videos">
        @foreach($event->videos as $video)
            <div class="video__container">
                <p class="video__title">{{ $video->title }}</p>
                <div class="video">
                    <iframe src="{{ $video->video_link }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
                @if (Auth::user() && Auth::user()->isAdmin())
                    <div class="buttons">
                        <a class="button" href="{{ route('events.videos.edit', ['event' => $event, 'video' => $video]) }}">Изменить</a>
                        <form action="{{ route('events.videos.destroy', ['event' => $event, 'video' => $video]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="button" type="submit" class="delete-button">Удалить</button>
                        </form>
                    </div>
                @endif
            </div>
        @endforeach
    </div>
@endsection