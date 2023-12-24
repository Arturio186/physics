@extends('layouts.auth')

@section('title', 'Регистрация')

@section('content')
    <form method="POST" action="{{route('register')}}" class="formContainer">
        @csrf
        <input
            class="authInput"
            type="name"
            placeholder="Ваше имя"
            name="name"
            value="{{old('name')}}"
        />
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
        <input
            class="authInput"
            type="password"
            placeholder="Подтвердите пароль"
            name="password_confirmation"
        />

        @error('name')
            <p class="error">{{$message}}</p>
        @enderror

        @error('email')
            <p class="error">{{$message}}</p>
        @enderror

        @error('password')
            <p class="error">{{$message}}</p>
        @enderror

        @error('password_confirmation')
            <p>{{$message}}</p>
        @enderror
        <button type="submit" class="authButton">Зарегистрироваться</button>
    </form>

    <p class="link">Уже есть аккаунт? <a href="{{route('page.login')}}">Авторизируйтесь!</a></p>
@endsection