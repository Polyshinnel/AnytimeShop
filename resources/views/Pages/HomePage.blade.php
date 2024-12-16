@extends('Layers.HomeLayer')

@section('canonical', $pageInfo['canonical_url'])
@section('description', $pageInfo['description'])
@section('og_image', $pageInfo['og_image'])
@section('page_title', $pageInfo['title'])

@section('content')
    <div class="box-container">
        <section class="advantages-list-block">
            <h2>Получайте мгновенную информацию о том, как питание, активность и инсулин влияют на уровень глюкозы</h2>

            <div class="advantages-list">
                <div class="advantages-list-item">
                    <div class="advantages-list-item__img">
                        <img src="/assets/img/icons/adv/1.svg" alt="">
                    </div>

                    <div class="advantages-list-item__text">
                        <h3>Непрерывность</h3>
                        <p>24 часа непрерывного мониторинга на протяжении 14 дней.</p>
                    </div>
                </div>
                <!-- /.advantages-list-item -->

                <div class="advantages-list-item">
                    <div class="advantages-list-item__img">
                        <img src="/assets/img/icons/adv/2.svg" alt="">
                    </div>

                    <div class="advantages-list-item__text">
                        <h3>Комфорт</h3>
                        <p>Комфортен в ношении и безболезненный, без необходимости прокалывать палец.</p>
                    </div>
                </div>
                <!-- /.advantages-list-item -->

                <div class="advantages-list-item advantages-list-item_big">
                    <div class="advantages-list-item__img">
                        <img src="/assets/img/icons/adv/3.svg" alt="">
                    </div>

                    <div class="advantages-list-item__text">
                        <h3>Надежность</h3>
                        <p>CT3 надежно держится на теле до 14 дней, включая душ и спорт, без дискомфорта и отклеивания.</p>
                    </div>
                </div>
                <!-- /.advantages-list-item -->


                <div class="advantages-list-item advantages-list-item_big">
                    <div class="advantages-list-item__img">
                        <img src="/assets/img/icons/adv/4.svg" alt="">
                    </div>

                    <div class="advantages-list-item__text">
                        <h3>Точность</h3>
                        <p>Высокая точность измерений, особенно в диапазоне низкого уровня глюкозы, когда это наиболее важно. MARD 8.83% -</p>
                    </div>
                </div>
                <!-- /.advantages-list-item -->

                <div class="advantages-list-item advantages-list-item_big">
                    <div class="advantages-list-item__img">
                        <img src="/assets/img/icons/adv/5.svg" alt="">
                    </div>

                    <div class="advantages-list-item__text">
                        <h3>Простота</h3>
                        <p>Проверьте уровень глюкозы на телефоне и поделитесь результатами в любое время.</p>
                    </div>
                </div>
                <!-- /.advantages-list-item -->

                <div class="advantages-list-item advantages-list-item_big">
                    <div class="advantages-list-item__img">
                        <img src="/assets/img/icons/adv/6.svg" alt="">
                    </div>

                    <div class="advantages-list-item__text">
                        <h3>Система оповещений</h3>
                        <p>Сигналы тревоги оповещают, что уровень глюкозы в крови становится слишком низким или слишком высоким.</p>
                    </div>
                </div>
                <!-- /.advantages-list-item -->

            </div>
            <!--/.advantages-list-->
        </section>
        <!--/.advantages-list-block-->
    </div>
    <!--/.box-container-->

    <section class="hour-video">
        <div class="box-container">
            <div class="hour-video__title">
                <h2>Официальный представитель Yuwell Anytime CGM на территории СНГ</h2>
                <div class="line"></div>
                <!-- /.line -->
            </div>
            <!-- /.hour-video__title -->
        </div>
        <!-- /.box-container -->

        <div class="hour-video-block">
            <div class="hour-video">
                <video src="/storage/video/anytime.mp4" poster="/assets/img/hour-video-banner.jpg" id="hour-look-video"></video>
            </div>
            <!-- /.hour-video -->
            <div class="box-container">
                <div class="hour-video-block-text">
                    <p>Показатели уровня глюкозы отправляются на телефон каждую секунду</p>
                    <a href="https://apps.apple.com/cz/app/yuwell-anytime/id6467751539">
                        <button>Скачать приложение</button>
                    </a>
                </div>
                <!-- /.hour-video-block-text -->
            </div>
            <!-- /.box-container -->
        </div>
        <!-- /.hour-video-block -->
    </section>
    <!-- /.hour-video -->

    <div class="product-block-main">
        <div class="product-block-main__rounds">
            <div class="product-block-main__round-big">
                <div class="product-block-main__round-medium">
                    <div class="product-block-main__round-small"></div>
                </div>
            </div>
        </div>
        <!--/.product-block-main__rounds-->

        <div class="product-block-main__content" id="info-target">
            <div class="box-container">
                <section class="product-list__block">
                    <h2>Наши товары</h2>

                    <div class="product-list">
                        @if($products)
                            @foreach($products as $product)
                                @include('Components.Product')
                            @endforeach
                        @endif

                    </div>
                    <!-- /.product-list -->
                </section>
                <!--/.product-list__block-->
            </div>
            <!-- /.box-container -->
        </div>
    </div>
    <!--/.product-block-main-->

    <div class="product-app-block">
        <div class="product-app-block__img-text-block">
            <picture>
                <source srcset="/assets/img/app-data/bg-small.jpg" media="(max-width: 800px)">
                <img src="/assets/img/app-data/bg-full.jpg" alt="Абстрактное изображение">
            </picture>
            <div class="product-app-block__img-text-block__cover">
                <div class="box-container box-container_mod">
                    <div class="product-app-block__img-text-block__cover-text">
                        <h2>Приложение Yuwell Anytime </h2>
                        <p>Контролируйте уровень глюкозы в крови, просматривайте отчеты и делитесь данными - все в одном месте</p>
                        <a href="https://apps.apple.com/cz/app/yuwell-anytime/id6467751539">
                            <button>Скачать приложение</button>
                        </a>
                        <div class="stores-block">
                            <a href="https://apps.apple.com/cz/app/yuwell-anytime/id6467751539">
                                <img src="/assets/img/app-data/app-store.png" alt="">
                            </a>
                            <a href="https://play.google.com/store/apps/details?id=com.yuwell.oversea&hl=ru&pli=1">
                                <img src="/assets/img/app-data/goole-play.png" alt="">
                            </a>
                        </div>
                    </div>
                    <!--/.product-app-block__img-text-block__cover-text-->
                </div>
                <!-- /.box-container -->
            </div>
            <!--/.product-app-block__img-text-block__cover-->

            <div class="app-block">
                <img src="/assets/img/app-data/phone.png" alt="" class="phone-app">
                <div class="app-block__logo">
                    <img src="/assets/img/app-data/any-logo.png" alt="">
                </div>
            </div>
            <!--/.app-block-->

            <div class="any-time-device">
                <img src="/assets/img/app-data/any-time.png" alt="">
            </div>
            <!--/.any-time-device-->
        </div>
        <!--/.product-app-block__img-text-block-->
    </div>
    <!-- /.product-app-block -->

    <div class="box-container">
        <div class="slider-block splide">
            <div class="splide__track">
                <div class="splide__list">
                    <div class="splide__slide slide-block-item">
                        <div class="slide-block-item-text">
                            <div class="slide-block-item-text_block">
                                <h2>Текущие данные глюкозы</h2>
                                <p>Проверяйте уровень глюкозы в режиме реального времени.</p>
                            </div>
                            <div class="slide-block-item-text_block-white">
                                <h2>Ежедневный обзор</h2>
                                <p>Данные уровня глюкозы в крови, включая средний, максимальный и минимальный значения, показатели гипогликемии и гипергликемии.</p>
                                <img src="/assets/img/app-slider/plus-btn.svg" alt="" class="plus">
                            </div>
                        </div>
                        <picture>
                            <source srcset="/assets/img/app-slider/1_mob.png" media="(max-width: 800px)">
                            <img src="/assets/img/app-slider/1.png" alt="Абстрактное изображение">
                        </picture>
                    </div>
                    <!--/.slide-block-item-->


                    <div class="splide__slide slide-block-item">
                        <div class="slide-block-item-text">
                            <div class="slide-block-item-text_block">
                                <h2>Ежедневный обзор</h2>
                                <p>Данные уровня глюкозы в крови, включая средний, максимальный и минимальный значения, показатели гипогликемии и гипергликемии.</p>
                            </div>
                            <div class="slide-block-item-text_block-white">
                                <h2>Журнал</h2>
                                <p>Дополняйте график личными примечаниями.</p>
                                <img src="/assets/img/app-slider/plus-btn.svg" alt="" class="plus">
                            </div>
                        </div>
                        <picture>
                            <source srcset="/assets/img/app-slider/2_mob.png" media="(max-width: 800px)">
                            <img src="/assets/img/app-slider/2.png" alt="Абстрактное изображение">
                        </picture>
                    </div>
                    <!--/.slide-block-item-->

                    <div class="splide__slide slide-block-item">
                        <div class="slide-block-item-text">
                            <div class="slide-block-item-text_block">
                                <h2>Журнал</h2>
                                <p>Дополняйте график личными примечаниями.</p>
                            </div>
                            <div class="slide-block-item-text_block-white">
                                <h2>Настройка значений</h2>
                                <p>Установка пользователем пределов высокого и низкого уровня глюкозы в крови.</p>
                                <img src="/assets/img/app-slider/plus-btn.svg" alt="" class="plus">
                            </div>
                        </div>
                        <picture>
                            <source srcset="/assets/img/app-slider/3_mob.png" media="(max-width: 800px)">
                            <img src="/assets/img/app-slider/3.png" alt="Абстрактное изображение">
                        </picture>
                    </div>
                    <!--/.slide-block-item-->

                    <div class="splide__slide slide-block-item">
                        <div class="slide-block-item-text">
                            <div class="slide-block-item-text_block">
                                <h2>Настройка значений</h2>
                                <p>Установка пользователем пределов высокого и низкого уровня глюкозы в крови.</p>
                            </div>
                            <div class="slide-block-item-text_block-white">
                                <h2>Отчет данных</h2>
                                <p>Приложение отслеживает и регистрирует, позволяя анализировать данные по временным интервалам.</p>
                                <img src="/assets/img/app-slider/plus-btn.svg" alt="" class="plus">
                            </div>
                        </div>
                        <picture>
                            <source srcset="/assets/img/app-slider/4_mob.png" media="(max-width: 800px)">
                            <img src="/assets/img/app-slider/4.png" alt="Абстрактное изображение">
                        </picture>
                    </div>
                    <!--/.slide-block-item-->

                    <div class="splide__slide slide-block-item">
                        <div class="slide-block-item-text">
                            <div class="slide-block-item-text_block">
                                <h2>Отчет данных</h2>
                                <p>Приложение отслеживает и регистрирует, позволяя анализировать данные
                                    по временным интервалам.</p>
                            </div>
                            <div class="slide-block-item-text_block-white">
                                <h2>Текущие данные глюкозы</h2>
                                <p>Проверяйте уровень глюкозы в режиме реального времени.</p>
                                <img src="/assets/img/app-slider/plus-btn.svg" alt="" class="plus">
                            </div>
                        </div>
                        <picture>
                            <source srcset="/assets/img/app-slider/5_mob.png" media="(max-width: 800px)">
                            <img src="/assets/img/app-slider/5.png" alt="Абстрактное изображение">
                        </picture>
                    </div>
                    <!--/.slide-block-item-->
                </div>
                <!--/.splide__list-->
            </div>
            <!--/.splide__track-->
        </div>
        <!--/.slider-block-->
    </div>
    <!--/.box-container-->

    <div class="box-container">
        <div class="main-recall-form">
            <div class="main-recall-form-text">
                <h2>Наши консультанты бесплатно проконсультируют Вас</h2>
                <p>Оставьте Ваши контактные данные и наш менеджер свяжется с вами в течение 20 минут.</p>
            </div>
            <!--/.main-recall-form-text-->

            <form class="main-recall-form-form">
                <input type="text" name="name" id="name" placeholder="Ваше имя">
                <input type="text" name="phone" id="phone" placeholder="Телефон">
                <div class="acept-policy">
                    <input type="checkbox" name="policy" id="policy">
                    <label for="policy">Я согласен/на с <a href="#">политикой конфиденциальности</a></label>
                </div>
                <input type="submit" class="submit-btn" value="Заказать звонок">
            </form>
            <!--/.main-recall-form-form-->

            <div class="form-img">
                <picture>
                    <source srcset="/assets/img/main-form/2.png" media="(max-width: 800px)">
                    <img src="/assets/img/main-form/1.png" alt="Абстрактное изображение">
                </picture>
            </div>
        </div>
        <!-- /.main-recall-form -->
    </div>
    <!-- /.box-container -->


    <div class="follow-app">
        <div class="box-container">
            <div class="follow-app__wrapper">
                <div class="follow-app__wrapper-text">
                    <h2>Приложение Follow Anytime</h2>
                    <p>В котором врачи и близкие удаленно могут получить доступ к данным пользователя.</p>
                    <a href="https://apps.apple.com/cz/app/follow-anytime/id6474446706">
                        <button>Скачать приложение</button>
                    </a>
                    <div class="follow-app__store">
                        <a href="https://apps.apple.com/cz/app/follow-anytime/id6474446706">
                            <img src="/assets/img/follow-app/app-store.png" alt="">
                        </a>
                        <a href="https://play.google.com/store/apps/details?id=com.poctech.follow&hl=ru&pli=1">
                            <img src="/assets/img/follow-app/google-play.png" alt="">
                        </a>
                    </div>
                </div>
            </div>
            <!--/.follow-app__wrapper-->

            <img src="/assets/img/follow-app/app.png" alt="" class="follow-app-phone">
        </div>
        <!--/.box-container-->
    </div>
    <!-- /.follow-app -->

    <div class="reviews">
        <h2>Отзывы</h2>
        <div class="reviews-block splide">
            <div class="splide__track">
                <div class="splide__list">
                    <div class="splide__slide review-item">
                        <div class="avatar-block">
                            <img src="/assets/img/reviews/1.png" alt="">
                        </div>

                        <div class="review-item__text">
                            <img src="/assets/img/reviews/quotes.svg" alt="" class="quotes">
                            <p class="review-text">This article is not just a transmission of information, but a sharing of knowledge. The author integrates their own thoughts and perceptions into the text, making reading a pleasure.</p>
                            <b>dylan_yates</b>
                            <div class="mark-block">
                                <img src="/assets/img/reviews/star-f.svg" alt="">
                                <img src="/assets/img/reviews/star-f.svg" alt="">
                                <img src="/assets/img/reviews/star-f.svg" alt="">
                                <img src="/assets/img/reviews/star-f.svg" alt="">
                                <img src="/assets/img/reviews/star-f.svg" alt="">
                            </div>
                        </div>

                    </div>
                    <!--/.review-item-->

                    <div class="splide__slide review-item">
                        <div class="avatar-block">
                            <img src="/assets/img/reviews/2.png" alt="">
                        </div>

                        <div class="review-item__text">
                            <img src="/assets/img/reviews/quotes.svg" alt="" class="quotes">
                            <p class="review-text">The craftsmanship of these pants is meticulous, with superior quality. Every detail is well handled, making them very durable.</p>
                            <b>dylan_yates</b>
                            <div class="mark-block">
                                <img src="/assets/img/reviews/star-f.svg" alt="">
                                <img src="/assets/img/reviews/star-f.svg" alt="">
                                <img src="/assets/img/reviews/star-f.svg" alt="">
                                <img src="/assets/img/reviews/star-e.svg" alt="">
                                <img src="/assets/img/reviews/star-e.svg" alt="">
                            </div>
                        </div>
                    </div>
                    <!--/.review-item-->

                    <div class="splide__slide review-item">
                        <div class="avatar-block">
                            <img src="/assets/img/reviews/3.png" alt="">
                        </div>

                        <div class="review-item__text">
                            <img src="/assets/img/reviews/quotes.svg" alt="" class="quotes">
                            <p class="review-text">This article is not just a transmission of information, but a sharing of knowledge. The author integrates their own thoughts and perceptions into the text, making reading a pleasure.</p>
                            <b>dylan_yates</b>
                            <div class="mark-block">
                                <img src="/assets/img/reviews/star-f.svg" alt="">
                                <img src="/assets/img/reviews/star-f.svg" alt="">
                                <img src="/assets/img/reviews/star-f.svg" alt="">
                                <img src="/assets/img/reviews/star-f.svg" alt="">
                                <img src="/assets/img/reviews/star-e.svg" alt="">
                            </div>
                        </div>
                    </div>
                    <!--/.review-item-->


                    <div class="splide__slide review-item">
                        <div class="avatar-block">
                            <img src="/assets/img/reviews/3.png" alt="">
                        </div>

                        <div class="review-item__text">
                            <img src="/assets/img/reviews/quotes.svg" alt="" class="quotes">
                            <p class="review-text">This article is not just a transmission of information, but a sharing of knowledge. The author integrates their own thoughts and perceptions into the text, making reading a pleasure.</p>
                            <b>dylan_yates</b>
                            <div class="mark-block">
                                <img src="/assets/img/reviews/star-f.svg" alt="">
                                <img src="/assets/img/reviews/star-f.svg" alt="">
                                <img src="/assets/img/reviews/star-f.svg" alt="">
                                <img src="/assets/img/reviews/star-f.svg" alt="">
                                <img src="/assets/img/reviews/star-e.svg" alt="">
                            </div>
                        </div>
                    </div>
                    <!--/.review-item-->
                </div>
            </div>
        </div>
    </div>
    <!-- /.reviews -->

    <div class="box-container">
        <section class="need-help">
            <h2>Нужна помощь?</h2>

            <div class="need-help__list">
                <div class="need-help__list-item">
                    <div class="img-box">
                        <img src="/assets/img/icons/help/1.svg" alt="">
                    </div>
                    <div class="need-help__list-item-text">
                        <h3>Быстрая доставка</h3>
                        <p>Отправка в течение<br> 1-3 рабочих дней</p>
                    </div>

                </div>
                <!-- /.need-help__list-item -->

                <div class="need-help__list-item">
                    <div class="img-box">
                        <img src="/assets/img/icons/help/2.svg" alt="">
                    </div>
                    <div class="need-help__list-item-text">
                        <h3>Отправьте письмо</h3>
                        <p>Email: <a href="mailto:anytime@CGM.com">anytime@CGM.com</a><br>Есть вопросы? Пишите, ответим в течение 24 часов!</p>
                    </div>
                </div>
                <!-- /.need-help__list-item -->

                <div class="need-help__list-item">
                    <div class="img-box">
                        <img src="/assets/img/icons/help/3.svg" alt="">
                    </div>
                    <div class="need-help__list-item-text">
                        <h3>Быстрая поддержка</h3>
                        <p>
                            <a href="tel://+375338987878">+375 33 898 78 78</a><br>
                            Сервис для всех вопросов
                            ежедневно с 8:00 до 17:00
                        </p>
                    </div>
                </div>
                <!-- /.need-help__list-item -->
            </div>
            <!--/.need-help__list-->
        </section>
        <!--/.need-help-->
    </div>

    <div class="manage-glukoza-level">
        <div class="box-container">
            <div class="manage-glukoza-level-text">
                <h2>Начало пути к эффективному управлению уровнем глюкозы в крови.</h2>
            </div>
        </div>
        <!-- /.box-container -->
        <div class="manage-glukoza-level-img">
            <img src="/assets/img/manage-banner.jpg" alt="">
        </div>
    </div>
    <!-- /.manage-glukoza-level -->

    <div class="box-container">
        <section class="faq-block">
            <h2>Остались вопросы?</h2>
            <p>Перейдите на нашу страницу <a href="/faq">FAQ</a>, чтобы найти ответы на часто задаваемые вопросы.</p>
        </section>
        <!-- /.faq-block -->
    </div>
@endsection

@section('scripts')
    <script src="assets/js/splide/js/splide.min.js"></script>

    <script>
        new Splide('.slider-block', {
            type   : 'loop',
            perPage: 1,
            arrows: false
        }).mount();

        new Splide('.reviews-block', {
            type   : 'loop',
            perPage: 2,
            arrows: true,
            autoWidth: true,
            breakpoints: {
                580: {
                    perPage: 1,
                    autoWidth: true,
                },
            }
        }).mount();
    </script>
@endsection
