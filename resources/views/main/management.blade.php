@extends('layouts.main')
@section('title', 'Руководство')

@section('some_styles')
<link rel="stylesheet" href="{{asset('stylesheets/main/management.css')}}" />
@endsection

@section('content')
    <div class="management-container">
        <h1>Коллектив</h1>
        <div class="people">
            @foreach($managers as $manager)
                <div class="person">
                    <img src="{{ asset('storage/' . $manager->photo_path) }}" alt="Фото члена руководства"/>
                    <div class="text">
                        <p class="stuff">{!! nl2br($manager->staff) !!}</p>
                        <p class="name">{{ $manager->last_name }} {{ $manager->name }} {{ $manager->middle_name }}</p>
                        <p class="phone">Телефон: {{ $manager->phone }}</p>
                        <p class="email">E-mail: {{ $manager->email }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
