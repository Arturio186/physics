@extends('layouts.main')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $EventDay->title }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
        }
        .gallery {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            grid-gap: 20px;
        }
        .gallery-item {
            text-align: center;
        }
        .gallery-item img {
            max-width: 100%;
            height: 200px; /* Фиксированная высота */
            object-fit: cover; /* Масштабирование и обрезка изображения */
        }
        .btn-square {
            display: inline-block;
            width: 50px; /* Ширина кнопки */
            height: 50px; /* Высота кнопки */
            text-align: center;
            line-height: 50px; /* Выравнивание по центру вертикально */
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            text-decoration: none;
        }
    </style>
</head>
<body>
<a href="{{ route('events.index') }}" class="btn-square">&#8592;</a>

<div class="container">
    <h1>{{ $EventDay->title }}</h1>
    
    <form action="{{ route('events.uploadToGallery', ['event' => $EventDay]) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="file">Выберите файлы:</label>
            <input type="file" id="file" multiple name="file[]" accept="image/*" required>
        </div>
        <input type="hidden" name="type" value="photo">
        <button type="submit">Загрузить фотографии</button>
    </form>

    <div class="gallery">
        @foreach($EventDay->galleryItems as $photo)
            <div class="gallery-item">
                <img src="{{ asset('uploads/' . $photo->filename) }}" alt="photo">
                <p onclick="editTitle('{{ $photo->id }}', '{{ $photo->title }}')">
                    {{ $photo->title }}<br>
                </p>
                <form action="{{ route('events.deleteGalleryItem', $photo) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Удалить</button>
                </form>
            </div>
        @endforeach
    </div>

</div>

</body>
</html>
@endsection
