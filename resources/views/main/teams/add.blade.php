@extends('layouts.main')
@section('title', "Создание команды")

@section('some_styles')
    <link rel="stylesheet" href="{{asset('stylesheets/main/create_team.css')}}" />
@endsection 

@section('content')
    @if ($tournament)
        <h1>Создание команды для турнира {{ $tournament->name }}</h1>
        <p class="message">Перед тем, как создавать команду, убедитесь, что она уже не создана другим членом Вашей команды.</p>
        <form method="POST" action="{{ route('teams.store') }}">
            @csrf

            <input type="hidden" name="tournament_id" value="{{ $tournament->id }}">
        
            <div class="form-group">
                <label for="team_name">Название команды:</label>
                <input type="text" id="team_name" name="team_name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="player_number">Ваш номер игрока:</label>
                <input type="text" id="player_number" name="player_number" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="main_form">Цвет основной формы:</label>
                <input type="text" id="main_form" name="main_form" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="second_form">Цвет дополнительной формы:</label>
                <input type="text" id="second_form" name="second_form" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="coach_surname">Фамилия тренера:</label>
                <input type="text" id="coach_surname" name="coach_surname" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="coach_name">Имя тренера:</label>
                <input type="text" id="coach_name" name="coach_name" class="form-control" required>
            </div>


            <div class="form-group">
                <label for="coach_midname">Отчество тренера:</label>
                <input type="text" id="coach_midname" name="coach_midname" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="coach_phone">Телефон тренера:</label>
                <input type="text" id="coach_phone" name="coach_phone" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="coach_email">Email тренера:</label>
                <input type="email" id="coach_email" name="coach_email" class="form-control" required>
            </div>

            @error('team_name')
            <p class="error">{{$message}}</p>
            @enderror

            @error('player_number')
                <p class="error">{{$message}}</p>
            @enderror

            @error('main_form')
                <p class="error">{{$message}}</p>
            @enderror

            @error('second_form')
                <p class="error">{{$message}}</p>
            @enderror

            @error('coach_name')
                <p class="error">{{$message}}</p>
            @enderror

            @error('coach_phone')
                <p class="error">{{$message}}</p>
            @enderror

            @error('coach_email')
                <p class="error">{{$message}}</p>
            @enderror

            <button type="submit" class="btn btn-primary">Создать команду</button>
        </form>
    @else
        <p class="message">Турнир не найден</p>
    @endif
@endsection