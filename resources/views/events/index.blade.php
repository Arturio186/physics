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
            <a href="{{ route('events.days', $event) }}" class="event-link">
                <div class="event">
                    <h2>{{ $event->title }}</h2>
                    <p>Дата проведения: {{ $event->date }}</p>
                </div>
            </a>
        @endforeach
    </div>
@endsection
