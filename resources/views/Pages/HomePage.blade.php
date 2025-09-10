@extends('Layers.HomeLayer')

@section('canonical', $pageInfo['canonical_url'])
@section('description', $pageInfo['description'])
@section('og_image', $pageInfo['og_image'])
@section('page_title', $pageInfo['title'])

@section('content')
    <div class="box-container">
        <div class="ticker-main">
            <div class="ticker-content">
                <p>Стоимость до 50% ниже аналогов</p>
                <p>Единственный Apple-friendly продукт на рынке</p>
                <p>Первый в мире перезаряжаемый трансмиттер CGM</p>
                <p>Стерильная упаковка нового поколения</p>
                <p>Экологический продукт</p>
                <p>Индекс MARD 9,07</p>
                <!-- Дублируем текст для бесконечной прокрутки -->
                <p>Стоимость до 50% ниже аналогов</p>
                <p>Единственный Apple-friendly продукт на рынке</p>
                <p>Первый в мире перезаряжаемый трансмиттер CGM</p>
                <p>Стерильная упаковка нового поколения</p>
                <p>Экологический продукт</p>
                <p>Индекс MARD 9,07</p>
            </div>
        </div>

        <section class="advantages-list-block">
            <h2>Контроль глюкозы без проколов и лишнего стресса. Уведомления, история, аналитика — в приложении на вашем телефоне.</h2>

            <div class="advantages-list">
                <div class="advantages-list-item">
                    <div class="advantages-list-item__img">
                        <img src="/assets/img/icons/adv/1.svg" alt="Иконка" title="Иконка | AnyTime">
                    </div>

                    <div class="advantages-list-item__text">
                        <p>14 дней постоянного мониторинга, 24 часа в сутки.</p>
                    </div>
                </div>
                <!-- /.advantages-list-item -->

                <div class="advantages-list-item">
                    <div class="advantages-list-item__img">
                        <img src="/assets/img/icons/adv/2.svg" alt="Иконка" title="Иконка | AnyTime">
                    </div>

                    <div class="advantages-list-item__text">
                        <p>Без проколов пальца.</p>
                    </div>
                </div>
                <!-- /.advantages-list-item -->

                <div class="advantages-list-item">
                    <div class="advantages-list-item__img">
                        <img src="/assets/img/icons/adv/3.svg" alt="Иконка" title="Иконка | AnyTime">
                    </div>

                    <div class="advantages-list-item__text">
                        <p>Надёжная фиксация и водостойкость</p>
                    </div>
                </div>
                <!-- /.advantages-list-item -->


                <div class="advantages-list-item">
                    <div class="advantages-list-item__img">
                        <img src="/assets/img/icons/adv/4.svg" alt="Иконка" title="Иконка | AnyTime">
                    </div>

                    <div class="advantages-list-item__text">
                        <p>Клиническая точность MARD 9.07%</p>
                    </div>
                </div>
                <!-- /.advantages-list-item -->

                <div class="advantages-list-item">
                    <div class="advantages-list-item__img">
                        <img src="/assets/img/icons/adv/6.svg" alt="Иконка" title="Иконка | AnyTime">
                    </div>

                    <div class="advantages-list-item__text">
                        <p>Уведомления при отклонении уровная глюкозы</p>
                    </div>
                </div>
                <!-- /.advantages-list-item -->

            </div>
            <!--/.advantages-list-->
        </section>
        <!--/.advantages-list-block-->
    </div>
    <!--/.box-container-->

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

                @if($additional_products)
                <section class="additional_products">
                    <h2 class="additional-start-kit">Anytime CT-3 Стартовый набор</h2>
                    <p class="additional-start-kit-text">Стартовый пакет содержит всё необходимое для начала работы с системой непрерывного мониторинга глюкозы Anytime CT-3. В комплект входит передатчик Yuwell Anytime (которого хватит на 2 года!), а также несколько сенсоров Yuwell Anytime — их количество зависит от выбранного вами пакета.</p>

                    <div class="additional_product-wrapper">
                        <div class="additional-products-list">
                            @foreach($additional_products as $product)
                                <div class="additional-products-list__item">
                                    <div class="additional-products-list__item-col">
                                        <h3 class="starter-package-title">{{$product['name']}}</h3>
                                        <a href="{{$product['url']}}">Подробнее</a>
                                    </div>

                                    <div class="additional-products-list__item-col">
                                        <span class="starter-package-price__value">{{$product['price']}} {{$pageInfo['currency']}}</span>
                                        <button data-product="{{$product['id']}}" class="starter-package-btn-shop">В корзину</button>
                                    </div>

                                    <div class="benefit-block">
                                        <p class="benefit-block__text">Выгода</p>
                                        <span class="benefit-block__value">{{$product['benefit']}} {{$pageInfo['currency']}}*</span>
                                    </div>
                                </div>
                                <!-- /.additional-products-list__item -->
                            @endforeach
                        </div>
                        <!-- /.additional-products-list -->

                        <img src="/assets/img/Yuwell-Anytime-About-300x231.webp" class="additional-products-list__img" alt="">
                    </div>



                </section>
                <!-- /.additional_products -->
                @endif
            </div>
            <!-- /.box-container -->
        </div>
    </div>
    <!--/.product-block-main-->

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

        <div class="box-container">
            <div class="hour-video__content">
                <video src="/storage/video/anytime.mp4" poster="/assets/img/hour-video-banner.jpg" id="hour-look-video" controls></video>
            </div>
            <!-- /.hour-video__content -->
        </div>
    </section>
    <!-- /.hour-video -->



    <div class="product-app-block">
        <div class="product-app-block__img-text-block">
            <picture>
                <source srcset="/assets/img/app-data/bg-small.jpg" media="(max-width: 800px)">
                <img src="/assets/img/app-data/bg-full.jpg" alt="Девушка с датчиком Anytime">
            </picture>
            <div class="product-app-block__img-text-block__cover">
                <div class="box-container box-container_mod">
                    <div class="product-app-block__img-text-block__cover-text">
                        <h2>Приложение Yuwell Anytime </h2>
                        <p>Контролируйте уровень глюкозы в крови, просматривайте отчеты и делитесь данными - все в одном месте</p>
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
                <img src="/assets/img/app-data/phone.png" alt="Телефон с программой ANYTime" title="Телефон с программой ANYTime | AnyTime" class="phone-app">
                <div class="app-block__logo">
                    <img src="/assets/img/app-data/any-logo.png" alt="Логотип ANYTime" title="Логотип ANYTime | AnyTime">
                </div>
            </div>
            <!--/.app-block-->

            <div class="any-time-device">
                <img src="/assets/img/app-data/any-time.png" alt="фото ANYTime" title="фото ANYTime | AnyTime">
            </div>
            <!--/.any-time-device-->
        </div>
        <!--/.product-app-block__img-text-block-->
    </div>
    <!-- /.product-app-block -->

    @if($slides)
    <div class="box-container">
        <div class="stack-container__wrapper">
            <div class="stack-container">
                @foreach($slides as $slide)
                    @if($slide['active'])
                        <div class="stack-item active">
                            <div class="stack-item__text">
                                <div class="stack-item__text-block">
                                    <h2>{{$slide['title_block_1']}}</h2>
                                    <p>{{$slide['text_block_1']}}</p>
                                </div>

                                <div class="stack-item__text-block stack-item__text-block__white">
                                    <h2>{{$slide['title_block_2']}}</h2>
                                    <p>{{$slide['text_block_2']}}</p>
                                    <img src="/assets/img/app-slider/plus-btn.svg" alt="Иконка +" title="Иконка + | AnyTime" class="plus">
                                </div>
                            </div>

                            <img src="/storage/{{$slide['img']}}" alt="{{$slide['img_alt']}}" title="{{$slide['img_title']}}" class="stack-img">
                        </div>
                    @else
                        <div class="stack-item">
                            <div class="stack-item__text">
                                <div class="stack-item__text-block">
                                    <h2>{{$slide['title_block_1']}}</h2>
                                    <p>{{$slide['text_block_1']}}</p>
                                </div>

                                <div class="stack-item__text-block stack-item__text-block__white">
                                    <h2>{{$slide['title_block_2']}}</h2>
                                    <p>{{$slide['text_block_2']}}</p>
                                    <img src="/assets/img/app-slider/plus-btn.svg" alt="Иконка +" title="Иконка + | AnyTime" class="plus">
                                </div>
                            </div>

                            <img src="/storage/{{$slide['img']}}" alt="{{$slide['img_alt']}}" title="{{$slide['img_title']}}" class="stack-img" draggable="false">
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

        <div class="slider-block splide">
            <div class="splide__track">
                <div class="splide__list">
                    @foreach($slides as $slide)
                        <div class="splide__slide slide-block-item">
                            <img src="/storage/{{$slide['img']}}"
                                 alt="{{$slide['img_alt']}}"
                                 title="{{$slide['img_title']}}"
                                 class="stack-img"
                                 draggable="false"
                                 data-titleBlock1="{{$slide['title_block_1']}}"
                                 data-titleText1="{{$slide['text_block_1']}}"
                                 data-titleBlock2="{{$slide['title_block_2']}}"
                                 data-titleText2="{{$slide['text_block_2']}}"
                            >
                        </div>
                        <!--/.slide-block-item-->
                    @endforeach
                </div>
                <!--/.splide__list-->
            </div>
            <!--/.splide__track-->
        </div>
        <!--/.slider-block-->

        <div class="slide-block-item-text">
            <div class="slide-block-item-text_block slide-block-item-text_block_active" id="block1">
                <h2>{{$slides[0]['title_block_1']}}</h2>
                <p>{{$slides[0]['text_block_1']}}</p>
            </div>

            <div class="slide-block-item-text_block slide-block-item-text_block-white slide-block-item-text_block_active" id="block2">
                <h2>{{$slides[0]['title_block_2']}}</h2>
                <p>{{$slides[0]['text_block_2']}}</p>
                <img src="/assets/img/app-slider/plus-btn.svg" alt="Иконка +" title="Иконка + | AnyTime" class="plus">
            </div>

            <img src="/assets/img/app-slider/slide-img-line.png" alt="Линия" class="gradient-line">
        </div>
    </div>
    <!--/.box-container-->
    @endif

    <div class="box-container">
        <div class="main-recall-form">
            <div class="main-recall-form-text">
                <h2>Наши консультанты бесплатно проконсультируют Вас</h2>
                <p>Оставьте Ваши контактные данные и наш менеджер свяжется с вами в ближайшее время. </p>
            </div>
            <!--/.main-recall-form-text-->

            <form class="main-recall-form-form">
                <input type="text" name="name" id="name" placeholder="Ваше имя">
                <input type="text" name="phone" id="phone" placeholder="Телефон">
                <div class="acept-policy">
                    <input type="checkbox" name="policy" id="policy" checked>
                    <label for="policy">Я согласен/на с <a href="/policy">политикой конфиденциальности</a></label>
                </div>
                <input type="submit" class="submit-btn" value="Заказать звонок">
                <p class="err-data">Заполните обязательные поля!</p>
            </form>
            <!--/.main-recall-form-form-->
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

            <img src="/assets/img/follow-app/app.png" alt="Приложение Follow" title="Приложение Follow | AnyTime" class="follow-app-phone">
            <img src="/assets/img/follow-app/follow-img.png" alt="Иконка приложения Follow" title="Иконка приложения Follow | AnyTime" class="follow-app-icon">

        </div>
        <!--/.box-container-->
    </div>
    <!-- /.follow-app -->

    @if($reviews)
        <div class="reviews">
            <h2>Отзывы</h2>
            <div class="reviews-block splide">
                <div class="splide__track">
                    <div class="splide__list">
                        @foreach($reviews as $review)
                            <div class="splide__slide review-item">
                                <div class="avatar-block">
                                    <img src="/storage/{{$review['avatar']}}" alt="Отзыв - фото" title="Отзыв - фото | AnyTime">
                                </div>

                                <div class="review-item__text">
                                    <img src="/assets/img/reviews/quotes.svg" alt="Иконка &quot;" title="Иконка &quot; | AnyTime" class="quotes">
                                    <p class="review-text">{{$review['text']}}</p>
                                    <b>{{$review['name']}}</b>
                                    <div class="mark-block">
                                        @foreach($review['stars'] as $star)
                                            @if($star == 'empty-star')
                                                <img src="/assets/img/reviews/star-e.svg" alt="Иконка Звезда" title="Иконка Звезда | AnyTime">
                                            @else
                                                <img src="/assets/img/reviews/star-f.svg" alt="Иконка Звезда" title="Иконка Звезда | AnyTime">
                                            @endif
                                        @endforeach
                                    </div>
                                </div>

                            </div>
                            <!--/.review-item-->
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
        <!-- /.reviews -->
    @endif


    <div class="box-container">
        <section class="need-help">
            <h2>Нужна помощь?</h2>

            <div class="need-help__list">
                <div class="need-help__list-item">
                    <div class="img-box">
                        <img src="/assets/img/icons/help/1.svg" alt="Иконка доставка" title="Иконка доставка | AnyTime">
                    </div>
                    <div class="need-help__list-item-text">
                        <h3>Быстрая доставка</h3>
                        <p>Отправка в течение<br> 1-3 рабочих дней</p>
                    </div>

                </div>
                <!-- /.need-help__list-item -->

                <div class="need-help__list-item">
                    <div class="img-box">
                        <img src="/assets/img/icons/help/2.svg" alt="Иконка написать" title="Иконка написать | AnyTime">
                    </div>
                    <div class="need-help__list-item-text">
                        <h3>Отправьте письмо</h3>
                        <p>Email: <a href="mailto:info@diabet-anytime.com">info@diabet-anytime.com</a><br>Есть вопросы? Пишите, ответим в течение 24 часов!</p>
                    </div>
                </div>
                <!-- /.need-help__list-item -->

                <div class="need-help__list-item">
                    <div class="img-box">
                        <img src="/assets/img/icons/help/3.svg" alt="Иконка позвонить" title="Иконка позвонить | AnyTime">
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
            <img src="/assets/img/manage-banner.jpg" alt="Пример крепления на предплечье" title="Пример крепления на предплечье | AnyTime">
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

    <div class="box-container">
        <div class="site-payment">

        </div>
    </div>
@endsection

@section('scripts')
    <script src="assets/js/splide/js/splide.min.js"></script>

    <script>
        let slider = document.querySelector('.slider-block');
        if(slider)
        {

            function showBlock1() {
                const block1 = document.getElementById('block1');
                block1.classList.remove('slide-block-item-text_block_inactive');
                block1.classList.add('slide-block-item-text_block_active');
            }

            function showBlock2() {
                const block2 = document.getElementById('block2');
                block2.classList.remove('slide-block-item-text_block_inactive');
                block2.classList.add('slide-block-item-text_block_active');
            }


            function showBlocks() {
                showBlock1();
                setTimeout(showBlock2, 300);
            }

            const splide = new Splide('.slider-block', {
                type   : 'loop',
                perPage: 3,
                arrows: false,
                gap: '4rem',
                autoWidth: true,
                padding: { left: '10%', right: '10%' },
                focus: 'center',
            }).mount();

            function changeText(block, title, text) {
                block.querySelector('h2').textContent = title
                block.querySelector('p').textContent = text
            }

            splide.on('moved', function (newIndex) {
                const activeSlide = splide.Components.Elements.slides[newIndex];
                const img = activeSlide.querySelector('.stack-img');
                const titleBlock1 = img.dataset.titleblock1
                const textBlock1 = img.dataset.titletext1
                const titleBlock2 = img.dataset.titleblock2
                const textBlock2 = img.dataset.titletext2

                const block1 = document.getElementById('block1');
                const block2 = document.getElementById('block2');



                document.querySelectorAll('.slide-block-item-text_block').forEach((item) => {
                    if(item.classList.contains('slide-block-item-text_block_active'))
                    {
                        item.classList.remove('slide-block-item-text_block_active')
                        item.classList.add('slide-block-item-text_block_inactive')
                    }
                })
                changeText(block1, titleBlock1, textBlock1)
                changeText(block1, titleBlock2, textBlock2)
                showBlocks();
            });

            document.querySelectorAll('.slide-block-item-text .slide-block-item-text_block-white .plus').forEach((item) => {
                item.addEventListener('click', () => {
                    splide.go('+1')
                })
            })
        }


        new Splide('.reviews-block', {
            type   : 'loop',
            perPage: 5,
            arrows: true,
            autoWidth: true,
            focus: 'center',
            gap: '2rem',
            padding: { left: '10%', right: '10%' },
            breakpoints: {
                580: {
                    perPage: 3,
                    focus: 'center',
                    gap: '1rem',
                    padding: { left: '10%', right: '10%' },
                },
            }
        }).mount();
    </script>


    <script>
        const items = document.querySelectorAll('.stack-item');
        let currentIndex = 0;

        // Переменные для перетаскивания
        let isDragging = false;
        let startX = 0;
        let currentX = 0;

        function updateStack() {
            items.forEach((item, i) => {
                item.classList.remove('active', 'next-1', 'next-2', 'next-3');

                if (i === currentIndex) {
                    item.classList.add('active');
                } else if (i === currentIndex + 1 || (currentIndex === items.length - 1 && i === 0)) {
                    item.classList.add('next-1');
                } else if (i === currentIndex + 2 || (currentIndex === items.length - 2 && i === 0) || (currentIndex === items.length - 1 && i === 1)) {
                    item.classList.add('next-2');
                } else if (i === currentIndex + 3 || (currentIndex === items.length - 3 && i === 0) || (currentIndex === items.length - 2 && i === 1) || (currentIndex === items.length - 1 && i === 2)) {
                    item.classList.add('next-3');
                }
            });
        }

        // Обработчики для перетаскивания
        function startDrag(e) {
            isDragging = true;
            startX = e.clientX || e.touches[0].clientX;
            currentX = startX;
            document.addEventListener('mousemove', onDrag);
            document.addEventListener('mouseup', stopDrag);
            document.addEventListener('touchmove', onDrag, { passive: false });
            document.addEventListener('touchend', stopDrag);
        }

        function onDrag(e) {
            if (!isDragging) return;
            e.preventDefault();
            const clientX = e.clientX || e.touches[0].clientX;
            const deltaX = clientX - currentX;
            currentX = clientX;

            // Перемещение слайдов
            items.forEach((item) => {
                const transform = window.getComputedStyle(item).transform;
                const matrix = new DOMMatrix(transform);
                const currentTranslateX = matrix.m41;
                item.style.transform = `translateX(${currentTranslateX + deltaX}px) scale(${matrix.a})`;
            });
        }

        function stopDrag() {
            if (!isDragging) return;
            isDragging = false;

            // Определение направления перетаскивания
            const deltaX = currentX - startX;
            if (Math.abs(deltaX) > 15) { // Порог для смены слайда
                if (deltaX > 0) {
                    currentIndex = (currentIndex - 1 + items.length) % items.length; // Влево
                } else {
                    currentIndex = (currentIndex + 1) % items.length; // Вправо
                }
            }

            // Возврат к нормальному состоянию
            updateStack();
            items.forEach((item) => {
                item.style.transform = ''; // Сброс временных трансформаций
            });

            // Удаление обработчиков
            document.removeEventListener('mousemove', onDrag);
            document.removeEventListener('mouseup', stopDrag);
            document.removeEventListener('touchmove', onDrag);
            document.removeEventListener('touchend', stopDrag);
        }

        // Добавление обработчиков для мыши и касаний
        items.forEach((item) => {
            item.addEventListener('mousedown', startDrag);
            item.addEventListener('touchstart', startDrag, { passive: true });
        });

        // Кнопки для навигации
        // prevBtn.addEventListener('click', () => {
        //     currentIndex = (currentIndex - 1 + items.length) % items.length;
        //     updateStack();
        // });
        //
        // nextBtn.addEventListener('click', () => {
        //     currentIndex = (currentIndex + 1) % items.length;
        //     updateStack();
        // });

        // Инициализация
        updateStack();

        function goToNextSlide() {
            currentIndex = (currentIndex + 1) % items.length;
            updateStack();
        }

        function handleActiveSlideClick() {
            goToNextSlide();
        }

        items.forEach((item) => {
            item.addEventListener('click', () => {
                handleActiveSlideClick();
            });
        });
    </script>
@endsection
