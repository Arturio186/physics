@extends('layouts.main')
@section('title', 'Партнёры')

@section('some_styles')
<link rel="stylesheet" href="{{asset('stylesheets/main/partners.css')}}" />
@endsection

@section('content')
<div class="partners-container">
        <h1>Наши Партнёры</h1>
        <div class="partners">
            <a href="https://www.google.com" target="_blank">
                <img src="{{ asset('images/partners/gerb_tum.svg') }}" alt="Правительство тюменской области">
            </a>
            <a href="https://www.google.com" target="_blank">
                <img src="{{ asset('images/partners/dep_sport.png') }}" alt="Департамент по спорту г.Тюмени">
            </a>
            <a href="https://www.google.com" target="_blank">
                <img src="{{ asset('images/partners/dep_smp.svg') }}" alt="Департамент">
            </a>
            <a href="https://www.google.com" target="_blank">
                <img src="{{ asset('images/partners/tumgu.svg') }}" alt="ТюмГУ">
            </a>
            <a href="https://www.google.com" target="_blank">
                <img src="{{ asset('images/partners/fpg.svg') }}" alt="Фонд президентских грантов">
            </a>
            <a href="https://www.google.com" target="_blank">
                <img src="{{ asset('images/partners/rus_lapta.png') }}" alt="Федерация русской лапты России">
            </a>
        </div>
    </div>
@endsection
