@extends('layouts.auth')

@section('title', 'Авторизация')

@section('content')
    <form method="POST" action="{{route('login')}}" class="formContainer">
        @csrf
        <input
            class="authInput"
            type="email"
            placeholder="E-mail"
            name="email"
            value="{{old('email')}}"
        />
        <input
            class="authInput"
            type="password"
            placeholder="Пароль"
            name="password"
        />

        @error('email')
            <p class="error">{{$message}}</p>
        @enderror

        @error('password')
            <p class="error">{{$message}}</p>
        @enderror
        <button type="submit" class="authButton">Войти</button>
    </form>

    <p class="link">Нет аккаунта? <a href="{{route('page.register')}}">Зарегистрируйтесь!</a></p>
@endsection