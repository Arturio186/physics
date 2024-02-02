@extends('layouts.main')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Дни мероприятия: {{ $event->title }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
        }
        .container {
            max-width: 800px;
            margin: 80px auto 20px; /* Измененный отступ сверху */
            padding: 0 20px;
        }
        .days-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: flex-start;
            margin-top: 20px; /* Добавлен отступ сверху для контейнера дней */
        }
        .day {
            width: 48%; /* Ширина блока дня */
            margin-bottom: 20px;
            border: 1px solid #ccc; /* Добавлено граница для блока дня */
            padding: 10px; /* Добавлено внутреннее заполнение для блока дня */
            box-sizing: border-box; /* Учитываем границы в общей ширине блока */
        }
        .day h2 {
            margin-bottom: 5px;
        }
        .day p {
            margin-bottom: 10px;
        }
        .create-btn {
            display: block;
            width: 100%;
            padding: 10px 20px;
            cursor: pointer;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            text-align: center;
            margin-bottom: 20px; /* Добавлен отступ снизу для кнопки */
        }
        .create-btn:hover {
            background-color: #0056b3;
        }
        h1 {
            text-align: center; /* Выравнивание заголовка по центру */
            margin-bottom: 20px; /* Добавлен отступ снизу для заголовка */
        }
    </style>
</head>
<body>
<h1>Дни мероприятия: {{ $event->title }}</h1>
<div class="container">
    @if(Auth::user())
            @if(Auth::user()->role_id == 1)
        <h2>Добавить новый день:</h2>
        <form action="{{ route('events.days.store', $event) }}" method="POST">
            @csrf
            <label for="title">Название дня:</label>
            <input type="text" id="title" name="title" required>
            <button type="submit">Добавить</button>
        </form>
            @endif
    @endif
    <h2>Список дней:</h2>
    <div class="days-container">
        @foreach($event->days as $day)
            <div class="day">
                <h2><a href="{{ route('events.show', $day) }}">{{ $day->title }}</a></h2>
            </div>
        @endforeach
    </div>

</div>

</body>
</html>
@endsection
