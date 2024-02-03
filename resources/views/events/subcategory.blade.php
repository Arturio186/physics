@extends('layouts.main')

@section('title', 'Подкатегории ' . $event->title)

@section('some_styles')
    <link rel="stylesheet" href="{{ asset('stylesheets/main/gallery/subcategories.css') }}" />
@endsection

@section('content')
    <h1>Подкатегории {{ $event->title }}</h1>

    <div class="days-container">
        @if(Auth::user())
            @if(Auth::user()->role_id == 1)
            <div class="new-category">
                <h2 class="new-category__title">Добавить новую подкатегорию</h2>

                <form action="{{ route('events.days.store', $event) }}" method="POST">
                    @csrf
                    <label for="title">Название подкатегории:</label>
                    <input type="text" id="title" name="title" required>

                    <button type="submit" class="admin__btn">Добавить</button>
                </form>
            </div>
            @endif
        @endif
        <div class="days">
            @foreach($event->days as $day)
            <a href="{{ route('events.show', $day) }}">
                <div class="day">
                    @if (isset($day->galleryItems[0]) && isset($day->galleryItems[0]->filename))
                        <img src="{{ asset('uploads/' . $day->galleryItems[0]->filename) }}" alt="Обложка">
                    @else
                        <img src="{{ asset('images/empty_photo.png') }}" alt="заглушка облошки">
                    @endif
                    
                    <h2>{{ $day->title }}</h2>

                    @if (Auth::user())
                        @if (Auth::user()->role_id == 1)
                        <form action="{{ route('events.days.destroy', ['event' => $event, 'EventDay' => $day]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="admin__btn" type="submit">Удалить</button>
                        </form>
                        @endif  
                    @endif
                </div>
            </a>
            @endforeach
        </div>
    </div>
    <a class="back__link" href="{{ route('events.index') }}">К спискам мероприятий</a>
@endsection
