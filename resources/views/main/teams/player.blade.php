@extends('layouts.main')
@section('title', "Обновление информации об игроке")

@section('some_styles')
    <link rel="stylesheet" href="{{asset('stylesheets/main/create_team.css')}}" />
    <link rel="stylesheet" href="{{asset('stylesheets/main/form.css')}}" />
@endsection 

@section('content')
    <h1>Обновление информации об игроке</h1>
    <p class="message" >Игрок: {{ $player->surname }} {{ $player->name }} {{ $player->mid_name }}</p>
    @if (Auth::user() &&  Auth::user()->role_id == 1)
        {{ $teamUser->falls }}
        <form class="form" method="POST" action="{{ route('teams.playerInfoUpdate', ['team' => $team->id, 'player' => $player->id]) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="player_number">Нагрудный номер игрока:</label>
                <input type="number" id="player_number" name="player_number" class="form-control" required value="{{ $teamUser->pivot->player_number }}">
            </div>

            <div class="form-group">
                <label for="cought_balls">Количество пойманых мячей с лета:</label>
                <input type="number" id="cought_balls" name="cought_balls" class="form-control" required value="{{ $teamUser->pivot->cought_balls }}">
            </div>

            <div class="form-group">
                <label for="falls">Количество совершенных осаливаний:</label>
                <input type="number" id="falls" name="falls" class="form-control" required value="{{ $teamUser->pivot->falls }}">
            </div>

            <div class="form-group">
                <label for="good_shots">Количество совершенных правильных ударов в площадку:</label>
                <input type="number" id="good_shots" name="good_shots" class="form-control" required value="{{ $teamUser->pivot->good_shots }}">
            </div>

            <div class="form-group">
                <label for="total">Количество набраных очков в турнире:</label>
                <input type="number" id="total" name="total" class="form-control" required value="{{ $teamUser->pivot->total }}">
            </div>

            @error('player_number')
                <p class="error">{{$message}}</p>
            @enderror

            @error('cought_balls')
                <p class="error">{{$message}}</p>
            @enderror

            @error('falls')
                <p class="error">{{$message}}</p>
            @enderror

            @error('good_shots')
                <p class="error">{{$message}}</p>
            @enderror

            @error('total')
                <p class="error">{{$message}}</p>
            @enderror

            <button type="submit" class="button">Обновить</button>
        </form>
    @else
        <p class="message">Информацию об игроке может обновлять только администратор</p>
    @endif
@endsection