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
    @if (Auth::user() && Auth::user()->role_id == 1)
        <button class="link button" id="printBtn">Печать</button>
        <form onsubmit="return confirm('Вы уверены, что хотите удалить?');" class="form" action="{{ route('teams.destroy', $team) }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="button link" type="submit">Удалить команду</button>
        </form>
    @endif
    @if (Auth::user() && (Auth::user()->id == $team->creator_id || Auth::user()->role_id == 1))
        <a class="link button" href="{{ route('teams.edit', $team) }}">Изменить информацию о команде</a>
    @endif
    @if ($team->players->contains(auth()->user()))
        <form class="form" method="POST" action="{{ route('teams.out', $team) }}">
            @csrf
            <button type="submit" class="button">Покинуть команду</button>
        </form>
    @endif
    <h2>Состав команды</h2>
    @if(count($team->players) != 0)
        <table id="printTable">
            <tr>
                <th>ФИО</th>
                <th>Спортивный разряд/звание</th>
                <th>Нагрудный номер игрока</th>
                <th>Количество пойманых мячей с лета</th>
                <th>Количество совершенных осаливаний</th>
                <th>Количество совершенных правильных ударов в площадку</th>
                <th>Количество набраных очков в турнире</th>
            </tr>
            @foreach($team->players as $player)
                <tr>
                    <td>
                        <a class="clickable" href="{{ route('sportsmen.show', $player->id) }}">
                            {{ $player->surname }} {{ $player->name }} {{ $player->mid_name }}
                        </a>
                        @if (Auth::user() && Auth::user()->role_id == 1)
                            <a class="link__update" href="{{ route('teams.playerInfo', ['team' => $team->id, 'player' => $player->id]) }}">
                                Обновить информацию об игроке
                            </a>
                        @endif
                    </td>
                    <td>{{ $player->rank }}</td>
                    <td>{{ $player->pivot->player_number }}</td>
                    <td>{{ $player->pivot->cought_balls }}</td>
                    <td>{{ $player->pivot->falls }}</td>
                    <td>{{ $player->pivot->good_shots }}</td>
                    <td>{{ $player->pivot->total }}</td>
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

    <script>
        const printButton = document.querySelector('#printBtn');

        printButton.addEventListener('click', (event) => {
            const table = document.querySelector('#printTable');
            const info = document.querySelector('.team__info');
            const printWindow = window.open('', 'Print-Window');

            printWindow.document.write('<html><head><title>{{ $team->name }}</title>');
            printWindow.document.write(
                `<style>
                    table {
                        border-collapse: collapse;
                    }

                    th, td {
                        text-align: center;
                        padding: 5px;
                        border: 1px solid #333;
                    }

                    a {
                        text-decoration: none;
                        color: #000;
                    }

                    h1, p {
                        width: 100%;

                        text-align: center;
                    }

                    .link__update {
                        display: none;
                    }
                
                </style>`
            )
            printWindow.document.write('<h1>{{ $team->name }}</h1>')
            printWindow.document.write('<p>')
            printWindow.document.write(info.innerHTML)
            printWindow.document.write('</p>')
            printWindow.document.write('</head><body><table>');
            printWindow.document.write(table.innerHTML);
            printWindow.document.write('</table></body></html>');
            printWindow.document.close();
            printWindow.focus();
            printWindow.print();
            printWindow.close();
        });
    </script>
@endsection