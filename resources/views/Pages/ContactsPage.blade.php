@extends('Layers.BasicLayer')

@section('page_title', 'AnyTime CGM')

@section('content')
    <div class="page-title-block">
        <div class="box-container">
            <div class="page-title-block__wrapper">
                <picture>
                    <source srcset="/assets/img/pages/contacts-m.jpg" media="(max-width: 800px)">
                    <img src="/assets/img/pages/contacts.jpg" alt="Абстрактное изображение">
                </picture>
                <div class="page-title__block-bg">
                    <h1>Контакты</h1>
                    <p>Как с нами связаться</p>
                </div>
                <!-- /.page-title__block-bg -->
            </div>
            <!-- /.page-title-block__wrapper -->
        </div>
        <!-- /.box-container -->
    </div>
    <!-- /.page-title-block -->
@endsection
