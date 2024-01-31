@extends('layouts.main')
@section('title', 'Партнёры')

@section('some_styles')
<link rel="stylesheet" href="{{asset('stylesheets/main/partners.css')}}" />
@endsection

@section('content')
<div class="partners-container">
        <h1>Наши Партнёры</h1>
        <div class="partners_img">
            <a href="https://soc.admtyumen.ru/">
                <img src="{{ asset('images/partners/gerb_tum.svg') }}" alt="Правительство тюменской области">
            </a>
            <a href="https://sport.admtyumen.ru/">
                <img src="{{ asset('images/partners/dep_sport.png') }}" alt="Департамент по спорту г.Тюмени">
            </a>
            <a href="https://sport.tyumen-city.ru/">
                <img src="{{ asset('images/partners/dep_smp.svg') }}" alt="Департамент">
            </a>
            <a href="https://президентскиегранты.рф/">
                <img src="{{ asset('images/partners/fpg.svg') }}" alt="Фонд президентских грантов">
            </a>
            <a href="https://www.utmn.ru/">
                <img src="{{ asset('images/partners/tumgu.svg') }}" alt="ТюмГУ">
            </a>
            <a href="https://tkpst.ru/">
                <img src="{{ asset('images/partners/tkpst.svg') }}" alt="ТКПСТ">
            </a>
            <a href="https://school56-tmn.ru/">
                <img src="{{ asset('images/partners/school.png') }}" alt="Школа">
            </a>
            <a href="https://ruslapta.ru/">
                <img src="{{ asset('images/partners/rus_lapta.png') }}" alt="Федерация русской лапты России">
            </a>
        </div>
    </div>
@endsection
