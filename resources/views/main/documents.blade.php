@extends('layouts.main')
@section('title', 'Документы')

@section('some_styles')
    <link rel="stylesheet" href="{{asset('stylesheets/main/documents.css')}}" />
@endsection

@section('content')
    <h1>Документы</h1>
    <div class="documents">
        @foreach($documents as $document)
            <a class="link" href="{{ asset('storage/' . json_decode($document->file_path)[0]->download_link) }}" target="_blank">
                <div class="document__card">
                    <img class="pdf" src="{{ asset('images/pdf_icon.svg') }}" alt="Иконка PDF">
                    <p class="document__title">{{ $document->name }}</p>
                </div>
            </a>
        @endforeach
    </div>
@endsection
