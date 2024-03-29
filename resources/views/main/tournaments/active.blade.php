@extends('layouts.main')
@section('title', 'Турниры')

@section('some_styles')
<link rel="stylesheet" href="{{asset('stylesheets/main/active_tournaments.css')}}" />
@endsection

@section('content')
    <h1 class="title">Предстоящие турниры</h1>
    @if (count($tournaments) !== 0)
        <div class="tournament__list">
            @foreach($tournaments as $item)
                <div class="tournament__card">
                    <div class="tournament__content">
                        <h2 class="tournament__title">{{$item->name}}</h2>
                        <p class="tournament__description">{!! nl2br(e($item->description)) !!}</p>
                        <p class="tournament__date">Дата: {{$item->start_date}}</p>
                        <a class="tournament__link" href="{{route('tournaments.show', $item->id)}}">Подробнее</a>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="message">Турниров нет</p>
    @endif
    <p class="message">Если вы хотите просмотреть информацию о прошедших турнирах, перейдите по <a class="link" href="{{ route('tournaments.completed') }}">cсылке</a></p>
@endsection