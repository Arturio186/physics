@extends('layouts.main')
@section('title', $tournament->name)

@section('some_styles')
    <link rel="stylesheet" href="{{ asset('stylesheets/main/tournament.css') }}" />
@endsection 

@section('content')
    <div class="tournament-details">
        <h2 class="tournament-details__title">{{ $tournament->name }}</h2>
        <p class="tournament-details__date">Дата начала: {{ $tournament->start_date }}</p>
        
        <div class="tournament-details__content">
            <p class="tournament-details__description">{!! nl2br(e($tournament->description)) !!}</p>
            @if ($tournament->is_active)
                @auth
                    @if($isInTeam)
                        <p class="message">Вы уже в команде</p>
                    @else
                        <a href="{{ route('teams.add', ['tournament_id' => $tournament->id]) }}" class="btn btn-primary">Создать команду</a>
                    @endif
                @else
                    <p class="message">Чтобы создать команду, необходимо авторизироваться</p>
                @endauth
            @else
                <p class="message">Турнир окончен</p>
            @endif
        </div>
    </div>

    <div class="referees">
        <h2 class="tournament-details__title">Судейский состав</h2>
        @if (Auth::user() && Auth::user()->role_id == 1)
            <a href="{{ route('referee.add', ['tournament' => $tournament->id]) }}" class="btn btn-primary admin">Добавить судью</a>
        @endif
        @if (count($referees) != 0)
            <table class="referees__table">
                <tr>
                    <th>ФИО</th>
                    <th>Категория</th>
                    <th>Номер</th>
                    <th>E-Mail</th>
                </tr>
                @foreach ($referees as $referee)
                Изменить
                <tr>
                    <td>
                        {{ $referee->surname }} {{ $referee->name }} {{ $referee->midname }} 
                        <div class="controls">
                            <a href="{{ route('referee.edit', ['tournament' => $tournament, 'referee' => $referee]) }}">Изменить</a>
                            <form onsubmit="return confirm('Вы уверены, что хотите удалить?');" action="{{ route('referee.destroy', ['tournament' => $tournament, 'referee' => $referee]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Удалить</button>
                            </form>
                        </div>
                    </td>
                    <td>{{ $referee->category->id }}</td>
                    <td>{{ $referee->phone_number }}</td>
                    <td>{{ $referee->email }}</td>
                </tr>
                
                @endforeach
            </table>
        @else
            <p class="message">Судья не назначены</p>
        @endif
    </div>
    
    <div class="teams">
        <h2 class="tournament-details__title">Команды</h2>
        @if (count($tournament->teams) != 0)
            <table class="teams__table">
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
            <p class="message">Команды отсутствуют</p>
        @endif
    </div>
@endsection
