@extends('layouts.main')
@section('title', 'Все спортсмены')

@section('some_styles')
    <link rel="stylesheet" href="{{asset('stylesheets/main/sportsmen.css')}}" />
    <link rel="stylesheet" href="{{asset('stylesheets/pagination.css')}}" />
@endsection 

@section('content')
    <h1>Спортсмены</h1>
    
    @if(count($users) != 0)
        <table>
            <tr>
                <th>ФИО</th>
                <th>E-mail</th>
                <th>Разряд</th>
                <th>Территориальная принадлежность</th>
                <th></th>
            </tr>
            @foreach($users as $player)
                <tr>
                    <td>{{ $player->surname }} {{ $player->name }} {{ $player->mid_name }}</td>
                    <td>{{ $player->email }}</td>
                    <td>{{ $player->rank }}</td>
                    <td>{{ $player->location }}</td>
                    <td><a class="button" href="{{ route('sportsmen.show', $player->id) }}">Подробнее</a></td>
                </tr>
            @endforeach
        </table>
        <div class="pagination-container">
            <ul class="pagination">
                @if ($users->onFirstPage())
                    <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
                @else
                    <li class="page-item"><a class="page-link" href="{{ $users->previousPageUrl() }}">&laquo;</a></li>
                @endif

                @foreach ($users->getUrlRange(1, $users->lastPage()) as $page => $url)
                    <li class="page-item {{ $page == $users->currentPage() ? 'active' : '' }}">
                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                    </li>
                @endforeach

                @if ($users->hasMorePages())
                    <li class="page-item"><a class="page-link" href="{{ $users->nextPageUrl() }}">&raquo;</a></li>
                @else
                    <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
                @endif
            </ul>
        </div>
    @else
        <p class="message">Спортсмены отсутсвуют</p>
    @endif
@endsection