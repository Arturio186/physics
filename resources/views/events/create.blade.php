<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавить мероприятие</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 0 20px;
        }
        h1 {
            text-align: center;
        }
        form {
            display: flex;
            flex-direction: column;
            max-width: 400px;
            margin: 0 auto;
        }
        label {
            margin-bottom: 5px;
        }
        input {
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            padding: 10px;
            cursor: pointer;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            text-align: center;
        }
        button:hover {
            background-color: #0056b3;
        }
        .success-message {
            color: #008000;
            margin-top: 10px;
        }
        a {
            display: block;
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Добавить мероприятие</h1>

    @if(session('success'))
        <div class="success-message">{{ session('success') }}</div>
    @endif

    <form action="{{ route('events.store') }}" method="post">
        @csrf
        <label for="title">Название мероприятия:</label>
        <input type="text" name="title" id="title" required>
        <label for="date">Дата мероприятия:</label>
        <input type="date" name="date" id="date" required>
        <button type="submit">Добавить мероприятие</button>
    </form>

    <a href="{{ route('events.index') }}">Вернуться к списку мероприятий</a>
</div>

</body>
</html>
