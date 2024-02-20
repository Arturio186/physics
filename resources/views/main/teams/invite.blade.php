@extends('layouts.main')
@section('title', "Создание команды")

@section('some_styles')
    <link rel="stylesheet" href="{{asset('stylesheets/main/invite_team.css')}}" />
    <link rel="stylesheet" href="{{asset('stylesheets/main/form.css')}}" />
@endsection 

@section('content')
    <h1>Приглашение в команду</h1>
    @if (auth()->user()->teams->contains($team->id))
        <p class="message">Вы уже находитесь в данной команде</p>
    @else
        @if(!$isInTeam)
            <p class="message">Вас пригласили в команду {{ $team->name }}</p>
            <p class="message">Команда участвует в турнире {{ $team->tournament->name }}</p>
            <form class="form" method="POST" action="{{ route('teams.join', $team) }}">
                @csrf
                <div class="form-group">
                    <label for="player_number">Ваш номер игрока:</label>
                    <input type="text" id="player_number" name="player_number" class="form-control" required>
                </div>

                @error('player_number')
                    <p class="error-message">{{ $message }}</p>
                @enderror
                @error('team_id')
                    <p class="error-message">{{ $message }}</p>
                @enderror

                <button type="submit" class="button">Присоединиться к команде</button>
            </form>
        @else
            <p class="message">Вы уже находитесь в команде на данном турнире!</p>
        @endif
    @endif
@endsection