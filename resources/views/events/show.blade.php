@extends('layouts.main')

@section('title', 'Фотографии ' . $EventDay->title)

@section('some_styles')
    <link rel="stylesheet" href="{{asset('stylesheets/main/gallery/images.css')}}" />
@endsection

@section('content')
    <h1>{{ $EventDay->title }}</h1>

    <div class="gallery__container">
        @if(Auth::user())
            @if(Auth::user()->role_id == 1)
                <div class="new-images">
                    <h2>Загрузка изображений</h2>
                    <form action="{{ route('events.uploadToGallery', ['event' => $EventDay]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <label for="file">Выберите файлы:</label>
                            <input type="file" id="file" multiple name="file[]" accept="image/*" required>
                        </div>

                        <input type="hidden" name="type" value="photo">
                        <button type="submit">Загрузить фотографии</button>
                    </form>
                </div>
            @endif
        @endif
        @if (count($EventDay->galleryItems) === 0)
            <p class="message">Изображения отсутсвуют</p>

        @else
            <div class="gallery">
                @foreach($EventDay->galleryItems as $index => $photo)
                    <div class="gallery-item">
                        <div class="image-container" onclick="openModal('{{ asset('uploads/' . $photo->filename) }}', {{ $index }})">
                            <img class="image" src="{{ asset('uploads/' . $photo->filename) }}" alt="photo">
                            @if (Auth::user() && Auth::user()->role_id == 1)
                                <div class="overlay">
                                    <form action="{{ route('events.deleteGalleryItem', $photo) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onClick="stopPropagation(event)" class="delete-button">X</button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
    <a class="back__link" href="{{ route('events.days', ['event' => $EventDay->event]) }}">К спискам подкатегорий</a>

    <div class="modal" id="imageModal">
        <span class="close" onclick="closeModal()">&times;</span>
        <img class="modal-content" id="fullImage">
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>

    <script>
        let currentSlide = 0;

        function openModal(imageUrl, index) {
            var modal = document.getElementById('imageModal');
            var fullImage = document.getElementById('fullImage');

            fullImage.src = imageUrl;
            modal.style.display = 'block';
            currentSlide = index;
            showSlide(currentSlide);
        }

        function closeModal() {
            var modal = document.getElementById('imageModal');
            modal.style.display = 'none';
        }

        function plusSlides(n) {
            showSlide(currentSlide += n);
        }

        function showSlide(n) {
            var images = document.querySelectorAll('.gallery-item .image');
            if (n >= images.length) {
                currentSlide = 0;
            }
            if (n < 0) {
                currentSlide = images.length - 1;
            }
            fullImage.src = images[currentSlide].src;
        }
    </script>
@endsection
