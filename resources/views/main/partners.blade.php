@extends('layouts.main')
@section('title', 'Партнёры')

@section('some_styles')
<link rel="stylesheet" href="{{asset('stylesheets/main/partners.css')}}" />
@endsection

@section('content')
<div class="partners-container">
        <h1>Наши Партнёры</h1>
        <p class="message">Партнёры отсутствуют</p>
    </div>
@endsection
