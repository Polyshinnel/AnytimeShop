@extends('Layers.BasicLayer')

@section('canonical', $pageInfo['canonical_url'])
@section('description', $pageInfo['description'])
@section('og_image', $pageInfo['og_image'])
@section('page_title', $pageInfo['title'])

@section('content')

    <div class="box-container">
        <div class="instructions-block">
            <div class="instructions-block__item">
                <img src="/assets/img/specialists/1.jpg" alt="Инструкция  ANYTime" title="Инструкция  ANYTime | AnyTime">
                <div class="instructions-block__item-wrapper">
                    <p>Краткое руководство к началу</p>
                    <a target="_blank" href="/storage/materials/start-guide.pdf"><button>Посмотреть</button></a>
                </div>
            </div>
            <!-- /.instructions-block__item -->

            <div class="instructions-block__item">
                <img src="/assets/img/specialists/2.png" alt="Инструкция  ANYTime" title="Инструкция  ANYTime | AnyTime">
                <div class="instructions-block__item-wrapper">
                    <p>Руководство пользователя</p>
                    <a target="_blank" href="/storage/materials/full-instructions.pdf"><button>Посмотреть</button></a>
                </div>
            </div>
            <!-- /.instructions-block__item -->

            <div class="instructions-block__item">
                <img src="/assets/img/specialists/catalog.webp" alt="Брошюра ANYTime" title="Брошюра ANYTime | AnyTime">
                <div class="instructions-block__item-wrapper">
                    <p>Инструкция по управлению глюкозой</p>
                    <a target="_blank" href="/storage/materials/catalog.pdf"><button>Посмотреть</button></a>
                </div>
            </div>
            <!-- /.instructions-block__item -->

            <div class="instructions-block__item">
                <div class="video-container">
                    <video id="instruction-video" poster="/assets/img/specialists/video-instruction.webp" controls>
                        <source src="/storage/materials/video-instruction1.mp4" type="video/mp4">
                        Ваш браузер не поддерживает видео.
                    </video>
                </div>
                <div class="instructions-block__item-wrapper">
                    <p>Видео-инструкция</p>
                    <button onclick="playVideo('instruction-video')">Смотреть видео</button>
                </div>
            </div>
            <!-- /.instructions-block__item -->

            <div class="instructions-block__item">
                <div class="video-container">
                    <video id="review-video" poster="/assets/img/specialists/review.png" controls>
                        <source src="/storage/materials/video-rewiew.mp4" type="video/mp4">
                        Ваш браузер не поддерживает видео.
                    </video>
                </div>
                <div class="instructions-block__item-wrapper">
                    <p>Видео-обзор</p>
                    <button onclick="playVideo('review-video')">Смотреть видео</button>
                </div>
            </div>
            <!-- /.instructions-block__item -->
        </div>
        <!--/.instructions-block-->
    </div>

    <style>
        .video-container {
            width: 100%;
            height: 100%;
            position: relative;
        }
        
        .video-container video {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 8px;
        }
        
        .instructions-block__item {
            position: relative;
        }
    </style>

    <script>
        function playVideo(videoId) {
            const video = document.getElementById(videoId);
            const videoItem = video.closest('.instructions-block__item');
            const wrapper = videoItem.querySelector('.instructions-block__item-wrapper');
            
            if (video.paused) {
                video.play();
                // Скрываем блок с текстом при воспроизведении
                wrapper.style.display = 'none';
            } else {
                video.pause();
            }
        }

        // Автоматически скрываем блок с текстом при начале воспроизведения
        document.addEventListener('DOMContentLoaded', function() {
            const videoIds = ['instruction-video', 'review-video'];
            
            videoIds.forEach(function(videoId) {
                const video = document.getElementById(videoId);
                if (video) {
                    const videoItem = video.closest('.instructions-block__item');
                    const wrapper = videoItem.querySelector('.instructions-block__item-wrapper');
                    
                    if (wrapper) {
                        video.addEventListener('play', function() {
                            wrapper.style.display = 'none';
                        });
                        
                        // Показываем блок с текстом при паузе
                        video.addEventListener('pause', function() {
                            wrapper.style.display = 'flex';
                        });
                    }
                }
            });
        });
    </script>
@endsection
