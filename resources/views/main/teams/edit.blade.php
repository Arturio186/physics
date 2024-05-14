@extends('layouts.main')
@section('title', "Создание команды")

@section('some_styles')
    <link rel="stylesheet" href="{{asset('stylesheets/main/create_team.css')}}" />
    <link rel="stylesheet" href="{{asset('stylesheets/main/form.css')}}" />
@endsection 

@section('content')
    @if ($tournament)
        <h1>Изменение информации о команде</h1>
        @if (Auth::user() && (Auth::user()->id == $team->creator_id || Auth::user()->role_id == 1))
            <form class="form" method="POST" action="{{ route('teams.update', $team) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="team_name">Название команды:</label>
                    <input type="text" id="team_name" name="team_name" class="form-control" required value="{{ $team->name }}">
                </div>

                <div class="form-group">
                    <label for="main_form">Цвет основной формы:</label>
                    <input type="text" id="main_form" name="main_form" class="form-control" required value="{{ $team->main_form }}">
                </div>

                <div class="form-group">
                    <label for="second_form">Цвет дополнительной формы:</label>
                    <input type="text" id="second_form" name="second_form" class="form-control" required value="{{ $team->second_form }}">
                </div>

                <div class="form-group">
                    <label for="coach_surname">Фамилия тренера:</label>
                    <input type="text" id="coach_surname" name="coach_surname" class="form-control" required value="{{ $team->coach_surname }}">
                </div>

                <div class="form-group">
                    <label for="coach_name">Имя тренера:</label>
                    <input type="text" id="coach_name" name="coach_name" class="form-control" required value="{{ $team->coach_name }}">
                </div>


                <div class="form-group">
                    <label for="coach_midname">Отчество тренера:</label>
                    <input type="text" id="coach_midname" name="coach_midname" class="form-control" required value="{{ $team->coach_midname }}">
                </div>

                <div class="form-group">
                    <label for="coach_phone">Телефон тренера:</label>
                    <input type="text" id="coach_phone" name="coach_phone" class="form-control" required value="{{ $team->coach_phone }}">
                </div>

                <div class="form-group">
                    <label for="coach_email">Email тренера:</label>
                    <input type="email" id="coach_email" name="coach_email" class="form-control" required value="{{ $team->coach_email }}">
                </div>

                <div class="form-group">
                    <label for="gender">Состав</label>
                    <select name="gender" id="gender">
                        <option {{ $team->gender == 'male' ? 'selected' : '' }} value="male">Мужской</option>
                        <option {{ $team->gender == 'female' ? 'selected' : '' }} value="female">Женский</option>
                        <option {{ $team->gender == 'second' ? 'selected' : '' }} value="second">Вторая группа (5-6 классы)</option>
                        <option {{ $team->gender == 'third' ? 'selected' : '' }} value="third">Третья группа (7-8 классы)</option>
                    </select>
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

                <button type="submit" class="button">Изменить</button>
            </form>
        @else
            <p class="message">Информацию о турнире может менять только создатель команды или администратор</p>
        @endif
    @else
        <p class="message">Турнир не найден</p>
    @endif
@endsection