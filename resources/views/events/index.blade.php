@extends('layouts.main')

@section('title', 'Галерея')

@section('some_styles')
    <link rel="stylesheet" href="{{asset('stylesheets/main/gallery/categories.css')}}" />
@endsection

@section('content')
    <h1>Список мероприятий</h1>

    <div class="events">
        @if(Auth::user())
            @if(Auth::user()->role_id == 1)
                <a href="{{ route('events.create') }}" class="create-btn">Создать новое мероприятие</a>
            @endif
        @endif

        @foreach($events as $event)
            <div class="event">
                <h2>{{ $event->title }}</h2>
                <p>Дата проведения: {{ $event->date }}</p>
                <a href="{{ route('events.videos.index', $event) }}">Видео</a>
                <a href="{{ route('events.days', $event) }}">Фото</a>
                @if (Auth::user() && Auth::user()->isAdmin())
                    <form action="{{ route('events.destroy', ['event' => $event]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="admin__btn" type="submit">Удалить</button>
                    </form> 
                @endif
            </div>
        @endforeach
    </div>
@endsection
