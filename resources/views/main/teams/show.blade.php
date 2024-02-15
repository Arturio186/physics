@extends('layouts.main')
@section('title', $team->name)

@section('some_styles')
    <link rel="stylesheet" href="{{asset('stylesheets/main/team.css')}}" />
@endsection 

@section('content')
    <h1>Команда "{{ $team->name }}"</h1>
    <h2>Турнир, в котором участвует команда: {{ $team->tournament->name }}</h2>
    <h2>Информация о команде</h2>
    <p class="team__info">
        Основной цвет формы: {{ $team->main_form  }}<br>
        Запасной цвет формы: {{ $team->second_form  }}<br>
        Тренер: {{ $team->coach_surname }} {{ $team->coach_name }} {{ $team->coach_midname }}<br>
        Телефон тренера: {{ $team->coach_phone }}<br>
        E-mail тренера: {{ $team->coach_email }}
    </p>
    <h2>Состав команды</h2>
    @if(count($team->players) != 0)
        <table>
            <tr>
                <th>ФИО</th>
                <th>E-mail</th>
                <th>Разряд</th>
                <th>Номер игрока</th>
                <th></th>
            </tr>
            @foreach($team->players as $player)
                <tr>
                    <td>{{ $player->surname }} {{ $player->name }} {{ $player->mid_name }}</td>
                    <td>{{ $player->email }}</td>
                    <td>{{ $player->rank }}</td>
                    <td>{{ $player->pivot->player_number }}</td>
                    <td><a class="button" href="{{ route('sportsmen.show', $player->id) }}">Подробнее</a></td>
                </tr>
            @endforeach
        </table>
        @if (Auth::user() && Auth::user()->id == $team->creator_id)
            <p class="message">Ссылка для приглашения других игроков: </p>
            <input type="text" class="invite-link" value="{{ route('teams.invite', $team->id) }}" readonly>
        @endif
    @else
        <p class="message">Игроки отсутсвуют</p>
    @endif
@endsection