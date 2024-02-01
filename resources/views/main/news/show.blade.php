@extends('layouts.main')
@section('title', $news->title)

@section('some_styles')
<link rel="stylesheet" href="{{asset('stylesheets/main/news.css')}}" />
@endsection

@section('content')
<div class="news__details">
    <div class="news__header">
        <h1>{{ $news->title }}</h1>
    </div>
    <div class="news__content">
        <p class="full__text">{!! nl2br($news->full_text) !!}</p>
        <img class="image" src="{{ asset('storage/' . $news->image_path) }}" alt="Изображение новости">
        <p class="date">Дата публикации: {{ $news->date }}</p>
        <p class="date">Просмотров: {{ $news->views_counter }}</p>
        
    </div>
</div>
@endsection