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
                <label for="player_number">Номер игрока:</label>
                <input type="text" id="player_number" name="player_number" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Создать команду</button>
        </form>
    @else
        <p class="message">Турнир не найден</p>
    @endif
@endsection