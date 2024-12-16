@extends('Layers.BasicLayer')

@section('canonical', $pageInfo['canonical_url'])
@section('description', $pageInfo['description'])
@section('og_image', $pageInfo['og_image'])
@section('page_title', $pageInfo['title'])

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
                    <a target="_blank" href="/storage/materials//CT3 Quick Start Guide .pdf"><button>Посмотреть</button></a>
                </div>
            </div>
            <!-- /.instructions-block__item -->

            <div class="instructions-block__item">
                <img src="/assets/img/specialists/2.png" alt="">
                <div class="instructions-block__item-wrapper">
                    <p>Руководство пользователя</p>
                    <a target="_blank" href="/storage/materials/A4_CGM14_004_V2_0.pdf"><button>Посмотреть</button></a>
                </div>
            </div>
            <!-- /.instructions-block__item -->
        </div>
        <!--/.instructions-block-->
    </div>
@endsection
