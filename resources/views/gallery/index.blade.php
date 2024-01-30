<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Галерея</title>
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
    </style>
</head>
<body>

<div class="container">
    <h1>Галерея</h1>

    @if(session('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('gallery.upload') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="file">Выберите файл:</label>
            <input type="file" id="file" name="file" required>
        </div>
        <div>
            <label for="type">Выберите тип файла:</label>
            <select id="type" name="type" required>
                <option value="photo">Фото</option>
                <option value="video">Видео</option>
            </select>
        </div>
        <button type="submit">Загрузить</button>
    </form>
    
    <a href="{{ route('gallery.show', ['type' => 'photo']) }}" class="gallery-btn">Показать Фото</a>
    <a href="{{ route('gallery.show', ['type' => 'video']) }}" class="gallery-btn">Показать Видео</a>

    <div id="photoGallery" class="gallery">
        <h2>Фотографии</h2>
        @foreach($photos as $photo)
            <div class="gallery-item">
                <img src="{{ asset('uploads/' . $photo->filename) }}" alt="photo">
                <p onclick="editTitle('{{ $photo->id }}', '{{ $photo->title }}')">
                    {{ $photo->title }}<br>
                    Дата: {{ $photo->date }}
                </p>
            </div>
        @endforeach
    </div>

    <div id="videoGallery" class="gallery">
        <h2>Видео</h2>
        @foreach($videos as $video)
            <div class="gallery-item">
                <video width="320" height="240" controls>
                    <source src="{{ asset('uploads/' . $video->filename) }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <p onclick="editTitle('{{ $video->id }}', '{{ $video->title }}')">
                    {{ $video->title }}<br>
                    Дата: {{ $video->date }}
                </p>
            </div>
        @endforeach
    </div>

    <div id="editTitleModal" class="modal">
        <div class="modal-content">
            <span class="close-btn" onclick="closeModal()">&times;</span>
            {{-- <form id="editTitleForm" action="{{ route('gallery.update', 0) }}" method="POST">--}}
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
        if (type === 'photo') {
            document.getElementById('photoGallery').style.display = 'block';
            document.getElementById('videoGallery').style.display = 'none';
        } else if (type === 'video') {
            document.getElementById('photoGallery').style.display = 'none';
            document.getElementById('videoGallery').style.display = 'block';
        }
    }

    function editTitle(id, title) {
        document.getElementById('newTitle').value = title;
        document.getElementById('editTitleForm').action = '/gallery/update/' + id;
        document.getElementById('editTitleModal').style.display = 'block';
    }

    function closeModal() {
        document.getElementById('editTitleModal').style.display = 'none';
    }

    window.onclick = function(event) {
        if (event.target === document.getElementById('editTitleModal')) {
            closeModal();
        }
    };
</script>

</body>
</html>
