@extends('layouts.main')
@section('title', $tournament->name)

@section('some_styles')
    <link rel="stylesheet" href="{{asset('stylesheets/main/tournament.css')}}" />
@endsection 

@section('content')
<div class="container">
        <h1>Добавление судьи</h1>
        <form method="POST" action="{{ route('referee.store', ['tournament' => $tournament->id]) }}">
            @csrf
            <div class="form-group">
                <label for="surname">Фамилия</label>
                <input type="text" name="surname" id="surname" required/>

                <label for="name">Имя</label>
                <input type="text" name="name" id="name" required/>

                <label for="midname">Отчество</label>
                <input type="text" name="midname" id="midname" required/>

                <label for="phone_number">Номер телефона</label>
                <input type="text" name="phone_number" id="phone_number" required/>

                <label for="email">E-mail</label>
                <input type="email" name="email" id="email" required/>

                <label for="category_id">Категория</label>
                <select name="category_id" id="category_id" class="form-control">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Назначить судью</button>
        </form>
    </div>
@endsection