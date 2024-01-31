@extends('layouts.main')
@section('title', 'Коммерческие услуги')

@section('some_styles')
    <link rel="stylesheet" href="{{asset('stylesheets/main/commerce.css')}}" />
@endsection

@section('content')
    <h1>Коммерческие услуги</h1>
    <div class="commerce">
        @foreach($commerce as $item)
            <div class="commerce__card">
                <img class="commerce__image" src="{{ asset('storage/' . $item->photo_path) }}" alt="Изображение услуги">
                <h2 class="commerce__title">{{ $item->name }}</h2>
                <p class="commerce__description">{{ $item->short_description }}</p>
                <p class="commerce__price">{{ $item->price }} ₽</p>
            </div>
        @endforeach
    </div>
@endsection
