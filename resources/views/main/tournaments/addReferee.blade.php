@extends('layouts.main')
@section('title', $tournament->name)

@section('some_styles')
    <link rel="stylesheet" href="{{asset('stylesheets/main/tournament.css')}}" />
@endsection 

@section('content')
<div class="container">
        <h1>Добавить судью</h1>
        <form method="post" action="{{ route('referee.store', ['tournament' => $tournament->id]) }}">
            @csrf
            <div class="form-group">
                <label for="referee_id">Выберите судью:</label>
                <select name="referee_id" id="referee_id" class="form-control">
                    @foreach($referees as $referee)
                        <option value="{{ $referee->id }}">{{ $referee->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Назначить судью</button>
        </form>
    </div>
@endsection