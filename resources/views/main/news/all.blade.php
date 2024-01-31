@extends('layouts.main')
@section('title', 'Главная')

@section('some_styles')
<link rel="stylesheet" href="{{asset('stylesheets/main/news.css')}}" />
<link rel="stylesheet" href="{{asset('stylesheets/pagination.css')}}" />
@endsection

@section('content')
    <h1 class="title">Новости</h1>
    @if (count($news) !== 0)
        <div class="news">
            @foreach($news as $item)
                <a href="{{ route('news.show', $item->id) }}">
                    <div class="news__card">
                        <img class="news-image" src="{{ asset('storage/' . $item->image_path) }}" alt="Изображение новости">
                        <h2 class="news-title">{{ $item->title }}</h2>
                        <p class="news-description">{{ $item->short_description }}</p>
                        <p class="news-date">Дата: {{ $item->date }}</p>
                    </div>
                </a>
            @endforeach
        </div>
        <div class="pagination-container">
            <ul class="pagination">
                @if ($news->onFirstPage())
                    <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
                @else
                    <li class="page-item"><a class="page-link" href="{{ $news->previousPageUrl() }}">&laquo;</a></li>
                @endif

                @foreach ($news->getUrlRange(1, $news->lastPage()) as $page => $url)
                    <li class="page-item {{ $page == $news->currentPage() ? 'active' : '' }}">
                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                    </li>
                @endforeach

                @if ($news->hasMorePages())
                    <li class="page-item"><a class="page-link" href="{{ $news->nextPageUrl() }}">&raquo;</a></li>
                @else
                    <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
                @endif
            </ul>
        </div>
    @else
        <p class="message">Новостей нет</p>
    @endif
@endsection