@extends('Layers.BasicLayer')

@section('page_title', 'AnyTime CGM')

@section('content')
    <div class="page-title-block">
        <div class="box-container">
            <div class="success-wrapper">
                <div class="success-wrapper-text">
                    <div class="success-wrapper-text__title">
                        <h1>ПОЗДРАВЛЯЕМ!</h1>
                        <p>Ваш заказ успешно оформлен.</p>
                    </div>
                    <!-- /.success-wrapper-text__title -->

                    <div class="success-wrapper-text__block">
                        <h2>Что дальше?</h2>
                        <p>Наш менеджер свяжется с вами в ближайшее время для уточнения деталей. После подтверждения заказа начнется его обработка.</p>
                        <a href="/"><button>Вернуться на главную</button></a>
                    </div>
                    <!-- /.success-wrapper-text__block -->
                </div>

                <div class="success-wrapper-img">
                    <picture>
                        <source srcset="/assets/img/sucess-shop_mob.png" media="(max-width: 800px)">
                        <img src="/assets/img/sucess-shop.png" alt="Абстрактное изображение">
                    </picture>
                </div>
                <!-- /.success-wrapper-img -->
            </div>
            <!-- /.success-wrapper -->
        </div>
    </div>
    <!-- /.page-title-block -->
@endsection
