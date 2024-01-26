@extends('layouts.main')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $event->title }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;

        }
        .gallery-btn {
            display: inline-block;
            padding: 10px 20px;
            margin-bottom: 10px;
            cursor: pointer;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            text-decoration: none;
        }
        .gallery-btn:hover {
            background-color: #0056b3;
        }
        .gallery {
            display: block;
        }
        .gallery h2 {
            margin-bottom: 10px;
        }
        .gallery-item {
            margin-bottom: 20px;
        }
        .gallery-item img,
        .gallery-item video {
            max-width: 100%;
            height: auto;
        }
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
        }
        .modal-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
        }
        .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }
        #photoGallery {
            display: block;
        }
        #videoGallery {
            display: none;
        }
        #photoUploadOptions, #videoUploadOptions {
            display: none;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>{{ $event->title }}</h1>
    <p>Дата: {{ $event->date }}</p>

    <form action="{{ route('events.uploadToGallery', $event) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="type">Выберите тип файла:</label>
            <select id="type" name="type" required onchange="toggleUploadOptions()">
                <option value="" disabled selected>Выберите</option>
                <option value="photo">Фото</option>
                <option value="video">Видео</option>
            </select>
        </div>
        <div id="photoUploadOptions">
            <label for="file">Выберите файл:</label>
            <input type="file" id="file" name="file">
        </div>
        <div id="videoUploadOptions">
            <label for="videoUrl">Ссылка на видео:</label>
            <input type="text" id="videoUrl" name="videoUrl">
        </div>
        <input type="hidden" name="event_id" value="{{ $event->id }}">
        <button type="submit">Загрузить в галерею</button>
    </form>

    <a href="#" class="gallery-btn" onclick="showGallery('photo')">Показать Фото</a>
    <a href="#" class="gallery-btn" onclick="showGallery('video')">Показать Видео</a>

    <div id="photoGallery" class="gallery">
        <h2>Фотографии</h2>
        @foreach($photos as $photo)
            <div class="gallery-item">
                <img src="{{ asset('uploads/' . $photo->filename) }}" alt="photo">
                <p onclick="editTitle('{{ $photo->id }}', '{{ $photo->title }}')">
                    {{ $photo->title }}<br>
                    Дата: {{ $photo->date }}
                </p>
                <form action="{{ route('gallery.delete', $photo->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Удалить</button>
                </form>
            </div>
        @endforeach
    </div>

    <div id="videoGallery" class="gallery">
        <h2>Видео</h2>
        @foreach($videos as $video)
            <div class="gallery-item">

                <iframe width="330" height="200" 
                    src="{{ $video->filename }}"
                    frameborder="0" 
                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" 
                    allowfullscreen> 
                </iframe>
                <p onclick="editTitle('{{ $video->id }}', '{{ $video->title }}')">
                    {{ $video->title }}<br>
                    Дата: {{ $video->date }}
                </p>
                <form action="{{ route('gallery.delete', $video->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Удалить</button>
                </form>
            </div>
        @endforeach
    </div>

    <div id="editTitleModal" class="modal">
        <div class="modal-content">
            <span class="close-btn" onclick="closeModal()">&times;</span>
            <form id="editTitleForm" action="{{ route('gallery.update', 0) }}" method="POST">
                @csrf
                @method('PUT')
                <div>
                    <label for="newTitle">Новое название:</label>
                    <input type="text" id="newTitle" name="title" required>
                </div>
                <button type="submit">Сохранить</button>
            </form>
        </div>
    </div>
</div>

<script>
    function showGallery(type) {
        document.getElementById('photoGallery').style.display = (type === 'photo') ? 'block' : 'none';
        document.getElementById('videoGallery').style.display = (type === 'video') ? 'block' : 'none';
    }

    function editTitle(id, title) {
        document.getElementById('newTitle').value = title;
        document.getElementById('editTitleForm').action = '/gallery/update/' + id;
        document.getElementById('editTitleModal').style.display = 'block';
    }

    function closeModal() {
        document.getElementById('editTitleModal').style.display = 'none';
    }

    function toggleUploadOptions() {
        var type = document.getElementById('type').value;
        if (type === 'photo') {
            document.getElementById('photoUploadOptions').style.display = 'block';
            document.getElementById('videoUploadOptions').style.display = 'none';
        } else if (type === 'video') {
            document.getElementById('videoUploadOptions').style.display = 'block';
            document.getElementById('photoUploadOptions').style.display = 'none';
        }
    }
</script>

</body>
</html>
@endsection
