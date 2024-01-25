@extends('layouts.main')
@section('title', 'Турниры')

@section('some_styles')
<link rel="stylesheet" href="{{asset('stylesheets/main/completed_tournaments.css')}}" />
@endsection

@section('content')
    <h1 class="title">Прошедшие турниры</h1>
    @if (count($tournaments) !== 0)
        <table>
            <tr>
                <th>Название</th>
                <th>Дата проведения</th>
                <th></th>
            </tr>
            @foreach($tournaments as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->start_date }}</td>
                <td><a class="tournament__link" href="{{route('tournaments.show', $item->id)}}">Подробнее</a></td>
            </tr>
            @endforeach
        </table>
    @else
        <p class="message">Турниров нет</p>
    @endif
@endsection