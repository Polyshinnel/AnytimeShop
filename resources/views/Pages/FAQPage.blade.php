@extends('Layers.BasicLayer')

@section('canonical', $pageInfo['canonical_url'])
@section('description', $pageInfo['description'])
@section('og_image', $pageInfo['og_image'])
@section('page_title', $pageInfo['title'])

@section('content')
    <div class="page-title-block">
        <div class="box-container">
            <div class="page-title-block__wrapper">
                <picture>
                    <source srcset="/assets/img/pages/faq-m.jpg" media="(max-width: 800px)">
                    <img src="/assets/img/pages/faq.jpg" alt="FAQ" title="FAQ | AnyTime">
                </picture>
                <div class="page-title__block-bg">
                    <h1>Часто задаваемые вопросы</h1>
                    <p>Есть вопрос? Мы здесь, чтобы помочь!</p>
                </div>
                <!-- /.page-title__block-bg -->
            </div>
            <!-- /.page-title-block__wrapper -->
        </div>
        <!-- /.box-container -->
    </div>
    <!-- /.page-title-block -->

    <div class="box-container">
        <section class="faq-section">
            <h2>Общие вопросы</h2>

            <div class="faq-section-list">
                <div class="faq-section__item">
                    <div class="faq-section__item-head">
                        <h3>Является ли система сертифицированной?</h3>
                        <img src="/assets/img/icons/common/plus-w.svg" alt="Иконка" title="Иконка | AnyTime">
                    </div>
                    <!-- /.faq-section__item-head -->
                    <div class="faq-section__item-body">
                        <p>Процесс установки сенсора минимально болезненный благодаря использованию специального аппликатора, который делает процедуру быстрой и комфортной.</p>
                    </div>
                    <!-- /.faq-section__item-body -->
                </div>
                <!-- /.faq-section__item -->

                <div class="faq-section__item">
                    <div class="faq-section__item-head">
                        <h3>Где доступна ваша система CGM?</h3>
                        <img src="/assets/img/icons/common/plus-w.svg" alt="Иконка" title="Иконка | AnyTime">
                    </div>
                    <!-- /.faq-section__item-head -->
                    <div class="faq-section__item-body">
                        <p>Процесс установки сенсора минимально болезненный благодаря использованию специального аппликатора, который делает процедуру быстрой и комфортной.</p>
                    </div>
                    <!-- /.faq-section__item-body -->
                </div>
                <!-- /.faq-section__item -->

                <div class="faq-section__item">
                    <div class="faq-section__item-head">
                        <h3>Могу ли я купаться, принимать душ, плавать или заниматься спортом, находясь с сенсором?</h3>
                        <img src="/assets/img/icons/common/plus-w.svg" alt="Иконка" title="Иконка | AnyTime">
                    </div>
                    <!-- /.faq-section__item-head -->
                    <div class="faq-section__item-body">
                        <p>Процесс установки сенсора минимально болезненный благодаря использованию специального аппликатора, который делает процедуру быстрой и комфортной.</p>
                    </div>
                    <!-- /.faq-section__item-body -->
                </div>
                <!-- /.faq-section__item -->

                <div class="faq-section__item">
                    <div class="faq-section__item-head">
                        <h3>Больно ли вставлять сенсор?</h3>
                        <img src="/assets/img/icons/common/plus-w.svg" alt="Иконка" title="Иконка | AnyTime">
                    </div>
                    <!-- /.faq-section__item-head -->
                    <div class="faq-section__item-body">
                        <p>Процесс установки сенсора минимально болезненный благодаря использованию специального аппликатора, который делает процедуру быстрой и комфортной.</p>
                    </div>
                    <!-- /.faq-section__item-body -->
                </div>
                <!-- /.faq-section__item -->
            </div>
            <!-- /.faq-section-list -->
        </section>
        <!--/.faq-section-->

        <section class="faq-section">
            <h2>Оплата и доставка</h2>

            <div class="faq-section-list">
                <div class="faq-section__item">
                    <div class="faq-section__item-head">
                        <h3>Является ли система сертифицированной?</h3>
                        <img src="/assets/img/icons/common/plus-w.svg" alt="Иконка" title="Иконка | AnyTime">
                    </div>
                    <!-- /.faq-section__item-head -->
                    <div class="faq-section__item-body">
                        <p>Процесс установки сенсора минимально болезненный благодаря использованию специального аппликатора, который делает процедуру быстрой и комфортной.</p>
                    </div>
                    <!-- /.faq-section__item-body -->
                </div>
                <!-- /.faq-section__item -->

                <div class="faq-section__item">
                    <div class="faq-section__item-head">
                        <h3>Где доступна ваша система CGM?</h3>
                        <img src="/assets/img/icons/common/plus-w.svg" alt="Иконка" title="Иконка | AnyTime">
                    </div>
                    <!-- /.faq-section__item-head -->
                    <div class="faq-section__item-body">
                        <p>Процесс установки сенсора минимально болезненный благодаря использованию специального аппликатора, который делает процедуру быстрой и комфортной.</p>
                    </div>
                    <!-- /.faq-section__item-body -->
                </div>
                <!-- /.faq-section__item -->

                <div class="faq-section__item">
                    <div class="faq-section__item-head">
                        <h3>Могу ли я купаться, принимать душ, плавать или заниматься спортом, находясь с сенсором?</h3>
                        <img src="/assets/img/icons/common/plus-w.svg" alt="Иконка" title="Иконка | AnyTime">
                    </div>
                    <!-- /.faq-section__item-head -->
                    <div class="faq-section__item-body">
                        <p>Процесс установки сенсора минимально болезненный благодаря использованию специального аппликатора, который делает процедуру быстрой и комфортной.</p>
                    </div>
                    <!-- /.faq-section__item-body -->
                </div>
                <!-- /.faq-section__item -->

                <div class="faq-section__item">
                    <div class="faq-section__item-head">
                        <h3>Больно ли вставлять сенсор?</h3>
                        <img src="/assets/img/icons/common/plus-w.svg" alt="Иконка" title="Иконка | AnyTime">
                    </div>
                    <!-- /.faq-section__item-head -->
                    <div class="faq-section__item-body">
                        <p>Процесс установки сенсора минимально болезненный благодаря использованию специального аппликатора, который делает процедуру быстрой и комфортной.</p>
                    </div>
                    <!-- /.faq-section__item-body -->
                </div>
                <!-- /.faq-section__item -->
            </div>
            <!-- /.faq-section-list -->
        </section>
        <!--/.faq-section-->
    </div>
    <!-- /.box-container -->
@endsection
