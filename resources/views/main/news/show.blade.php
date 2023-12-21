@extends('layouts.main')
@section('title', $news->title)

@section('some_styles')
<link rel="stylesheet" href="{{asset('stylesheets/main/news.css')}}" />
@endsection

@section('content')
<div class="news-details">
    <div class="news-header">
        <h1>{{ $news->title }}</h1>
    </div>
    <div class="news-content">
        <p class="full-text">{!! nl2br($news->full_text) !!}</p>
    </div>
    <p class="date">Дата публикации: {{ $news->date }}</p>
</div>
@endsection