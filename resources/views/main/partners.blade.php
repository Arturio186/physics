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
                <img src="./images/partner_logo3.svg" alt="Партнёр">
            </a>
            <a href="https://www.google.com" target="_blank">
                <img src="./images/partner_logo2.svg" alt="Партнёр">
            </a>
            <a href="https://www.google.com" target="_blank">
                <img src="./images/partner_logo1.svg" alt="Партнёр">
            </a>
            <a href="https://www.google.com" target="_blank">
                <img src="./images/partner_logo2.svg" alt="Партнёр">
            </a>
            <a href="https://www.google.com" target="_blank">
                <img src="./images/partner_logo3.svg" alt="Партнёр">
            </a>
            <a href="https://www.google.com" target="_blank">
                <img src="./images/partner_logo1.svg" alt="Партнёр">
            </a>
            <a href="https://www.google.com" target="_blank">
                <img src="./images/partner_logo2.svg" alt="Партнёр">
            </a>
        </div>
    </div>
@endsection
