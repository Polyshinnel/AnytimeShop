@extends('Layers.BasicLayer')

@section('page_title', 'AnyTime CGM')

@section('content')
    <div class="page-title-block">
        <div class="box-container">
            <div class="page-title-block__wrapper">
                <img src="/assets/img/pages/specialists.jpg" alt="">
                <div class="page-title__block-bg">
                    <h1>Документация</h1>
                    <p>Инструкции по эксплуатации</p>
                </div>
                <!-- /.page-title__block-bg -->
            </div>
            <!-- /.page-title-block__wrapper -->
        </div>
        <!-- /.box-container -->
    </div>
    <!-- /.page-title-block -->

    <div class="box-container">
        <div class="instructions-block">
            <div class="instructions-block__item">
                <img src="/assets/img/specialists/1.jpg" alt="">
                <div class="instructions-block__item-wrapper">
                    <p>Краткое руководство к началу</p>
                    <a href="#"><button>Посмотреть</button></a>
                </div>
            </div>
            <!-- /.instructions-block__item -->

            <div class="instructions-block__item">
                <img src="/assets/img/specialists/2.png" alt="">
                <div class="instructions-block__item-wrapper">
                    <p>Руководство пользователя</p>
                    <a href="#"><button>Посмотреть</button></a>
                </div>
            </div>
            <!-- /.instructions-block__item -->
        </div>
        <!--/.instructions-block-->
    </div>
@endsection
