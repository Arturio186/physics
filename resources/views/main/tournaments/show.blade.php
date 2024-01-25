@extends('layouts.main')
@section('title', $tournament->name)

@section('some_styles')
    <link rel="stylesheet" href="{{asset('stylesheets/main/tournament.css')}}" />
@endsection 

@section('content')
    <div class="tournament-details">
        <div class="tournament-details__header">
            <h2 class="tournament-details__title">{{ $tournament->name }}</h2>
            <p class="tournament-details__date">Дата начала: {{ $tournament->start_date }}</p>
        </div>
        <div class="tournament-details__content">
            <p class="tournament-details__description">{!! nl2br(e($tournament->description)) !!}</p>
            @if ($tournament->is_active)
                @auth
                    @if($isInTeam)
                        <p class="message">Вы уже в команде</p>
                    @else
                        <a href="{{ route('teams.add', ['tournament_id' => $tournament->id]) }}" class="btn btn-primary">Создать команду для турнира</a>
                    @endif
                @else
                    <p class="message">Чтобы создать команду, необходимо авторизироваться</p>
                @endauth
            @else
                <p class="message">Турнир окончен</p>
            @endif
        </div>
    </div>
    <div class="teams">
        <h2 class="tournament-details__title">Команды</h2>
        @if (count($tournament->teams) != 0)
            <table>
                <tr>
                    <th>Название</th>
                    <th></th>
                </tr>
                @foreach($tournament->teams as $team)
                <tr>
                    <td>{{ $team->name }}</td>
                    <td><a class="team__link" href="{{ route('teams.show', $team->id) }}">Подробнее</a></td>
                </tr>
                @endforeach
            </table>
        @else
            <p class="message">Команды отсутсвуют</p>
        @endif
    </div>
@endsection