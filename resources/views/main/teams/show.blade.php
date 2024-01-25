@extends('layouts.main')
@section('title', $team->name)

@section('some_styles')
    <link rel="stylesheet" href="{{asset('stylesheets/main/team.css')}}" />
@endsection 

@section('content')
    <h1>Команда "{{ $team->name }}"</h1>
    <h2>Турнир, в котором участвует команда: {{ $team->tournament->name }}</h2>
    @if(count($team->players) != 0)
        <table>
            <tr>
                <th>E-mail</th>
                <th>ФИО</th>
                <th>Разряд</th>
                <th>Номер игрока</th>
            </tr>
            @foreach($team->players as $player)
                <tr>
                    <td>{{ $player->email }}</td>
                    <td>{{ $player->surname }} {{ $player->name }} {{ $player->mid_name }}</td>
                    <td>{{ $player->rank }}</td>
                    <td>{{ $player->pivot->player_number }}</td>
                </tr>
            @endforeach
        </table>
        @if (auth()->user()->id == $team->creator_id)
            <p class="message">Ссылка для приглашения других игроков: </p>
            <input type="text" class="invite-link" value="{{ route('teams.invite', $team->id) }}" readonly>
        @endif
    @else
        <p class="message">Игроки отсутсвуют</p>
    @endif
@endsection