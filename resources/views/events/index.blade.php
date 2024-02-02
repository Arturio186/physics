@extends('layouts.main')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Список мероприятий</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
        }
        .container {
            max-width: 800px;
            margin: 80px auto 20px; /* Измененный отступ сверху */
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: flex-start;
            padding: 0 20px;
        }
        .event {
            width: 48%;
            margin-bottom: 20px;
        }
        .event h2 {
            margin-bottom: 5px;
        }
        .event p {
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
            width: 100%; /* Ширина на 100% для центрирования */
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Список мероприятий</h1>

    <a href="{{ route('events.create') }}" class="create-btn">Создать новое мероприятие</a>

    @foreach($events as $event)
        <div class="event">
            <h2><a href="{{ route('events.days', $event) }}">{{ $event->title }}</a></h2>
            <p>Дата: {{ $event->date }}</p>
        </div>
    @endforeach
</div>

</body>
</html>
