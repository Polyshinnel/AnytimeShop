@extends('Layers.BasicLayer')

@section('page_title', 'AnyTime CGM')

@section('content')
    <div class="page-title-block">
        <div class="box-container">
            <div class="page-title-block__wrapper">
                <picture>
                    <source srcset="/assets/img/pages/catalog-m.jpg" media="(max-width: 800px)">
                    <img src="/assets/img/pages/catalog.jpg" alt="Абстрактное изображение">
                </picture>
                <div class="page-title__block-bg">
                    <h1>Каталог</h1>
                    <p>Наш каталог актуальной продукции</p>
                </div>
                <!-- /.page-title__block-bg -->
            </div>
            <!-- /.page-title-block__wrapper -->
        </div>
        <!-- /.box-container -->
    </div>
    <!-- /.page-title-block -->

    <div class="product-page-block">
        <div class="box-container">
            <div class="product-list">
                <div class="product-list__item">
                    <div class="product-list__item-img">
                        <a href="#"><img src="/assets/img/products/1.png" alt=""></a>
                    </div>

                    <div class="product-list__item-text">
                        <h3 class="product-list__item-title">Аппликатор и сенсор Yuwell Anytime CGM</h3>

                        <div class="product-list__item-tabs">
                            <div class="product-list__item-tab-head">
                                <div class="product-list__item-tab-head__item product-list__item-tab-head__item_active" data-item="description">
                                    <p>Описание</p>
                                </div>
                                <!--/.product-list__item-tab-head__item-->

                                <div class="product-list__item-tab-head__item" data-item="delivery">
                                    <p>Доставка</p>
                                </div>
                                <!--/.product-list__item-tab-head__item-->

                                <div class="product-list__item-tab-head__item" data-item="warranty">
                                    <p>Гарантия</p>
                                </div>
                                <!--/.product-list__item-tab-head__item-->
                            </div>
                            <!--/.product-list__item-tab-head-->

                            <div class="product-list__item-tab-body">
                                <div class="product-list__item-tab product-list__item-tab_active" data-item="description">
                                    <div class="product-list__item-description-block">
                                        <div class="product-list__item-description-block__text">
                                            <p>Простой автоаппликатор — это однокнопочный аппликатор, который легко вводит встроенный сенсор под кожу.</p>
                                            <p>Yuwell Anytime CGM в Республике Беларусь от официального представителя компании - производителя.</p>
                                        </div>
                                        <!--/.product-list__item-description-block__text-->
                                        <p class="more-text">Подробнее...</p>
                                    </div>
                                    <!--/.product-list__item-description-block-->

                                    <div class="product-list__item-adv">
                                        <div class="product-list__item-adv__item">
                                            <img src="/assets/img/icons/products/check.svg" alt="">
                                            <p>Апликатор и сенсор Yuwell</p>
                                        </div>
                                        <!--/.product-list__item-adv__item-->

                                        <div class="product-list__item-adv__item">
                                            <img src="/assets/img/icons/products/check.svg" alt="">
                                            <p>Доступ в приложение</p>
                                        </div>
                                        <!--/.product-list__item-adv__item-->

                                        <div class="product-list__item-adv__item">
                                            <img src="/assets/img/icons/products/check.svg" alt="">
                                            <p>Гарантия от производителя</p>
                                        </div>
                                        <!--/.product-list__item-adv__item-->

                                        <div class="product-list__item-adv__item">
                                            <img src="/assets/img/icons/products/check.svg" alt="">
                                            <p>Служба поддержки</p>
                                        </div>
                                        <!--/.product-list__item-adv__item-->
                                    </div>
                                    <!-- /.product-list__item-adv -->
                                </div>
                                <!--/.product-list__item-tab-->

                                <div class="product-list__item-tab" data-item="delivery">
                                    <div class="product-list__item-tab-block">
                                        <div class="product-list__item-tab-title">
                                            <h4>Доставка</h4>
                                            <img src="/assets/img/products/delivery.png" alt="">
                                        </div>

                                        <div class="product-list__item-tab-block-body">
                                            <p>Самовывоз из пункта выдачи Boxberry</p>
                                            <p>Сроки: 2-7 дней</p>
                                            <p>Стоимость: 190 рублей</p>
                                        </div>
                                    </div>
                                    <!-- /.product-list__item-tab-block -->

                                    <div class="product-list__item-tab-block">
                                        <div class="product-list__item-tab-title">
                                            <h4>Самовывоз из офиса AnyTime</h4>
                                        </div>

                                        <div class="product-list__item-tab-block-body">
                                            <p>Стоимость: Бесплатно</p>
                                            <p>Сроки: выдача в день заказа</p>
                                            <p>Адрес: 220014 Минск, Филимонова 25Г-1000</p>

                                            <a href="#">Подробнее на странице Доставка...</a>
                                        </div>
                                    </div>
                                    <!-- /.product-list__item-tab-block -->
                                </div>
                                <!--/.product-list__item-tab-->

                                <div class="product-list__item-tab" data-item="warranty">
                                    <div class="product-list__item-tab-block">
                                        <div class="product-list__item-tab-title">
                                            <h4>Гарантии возврата товара</h4>
                                        </div>

                                        <div class="product-list__item-tab-block-body">
                                            <p><span>✓</span> При правильном использовании устройства для непрерывного мониторинга глюкозы мы предоставляем гарантию возврата товара в случае производственных дефектов.</p>
                                            <p><span>✓</span> Возврат товара невозможен, если поломка произошла не по вине производителя, например, при неправильной эксплуатации устройства. Для долгосрочной и безопасной работы рекомендуем избегать интенсивных бань, плавания и других воздействий, которые могут повредить устройство.</p>
                                            <p><span>✓</span> Наша служба поддержки имеет возможность удалённого подключения к вашему устройству и может отслеживать его состояние, включая такие случаи, как намокание или отклеивание сенсора.</p>
                                        </div>
                                    </div>
                                    <!-- /.product-list__item-tab-block -->
                                </div>
                                <!--/.product-list__item-tab-->
                            </div>
                            <!--/.product-list__item-tab-body-->
                        </div>
                        <!--/.product-list__item-tabs-->


                        <div class="product-list__item-price-block">
                            <div class="product-list__item-price-block__main">
                                <p>Стоимость</p>
                                <div class="cross-price__block">
                                    <span>310BYN</span>
                                    <div class="line"></div>
                                </div>
                            </div>
                            <p class="product-list__item-price-block__current">150BYN</p>
                        </div>
                        <!--/.product-list__item-price-block-->

                        <div class="product-list__item-btns">
                            <div class="product-list__item-btns-shop-quantity">
                                <button class="product-shop">
                                    <img src="/assets/img/icons/products/cart.svg" alt="">
                                    <span>Добавить в корзину</span>
                                </button>

                                <div class="product-quantity">
                                    <button class="product-quantity-btn product-quantity-btn-minus">-</button>
                                    <input type="text" class="product-quantity-input" value="1">
                                    <button class="product-quantity-btn product-quantity-btn-plus">+</button>
                                </div>
                            </div>
                            <!--/.product-list__item-btns-shop-quantity-->


                            <div class="product-shop__oneclick-block">
                                <button class="product-shop__oneclick">Купить в один клик</button>
                                <a href="#">
                                    <img src="/assets/img/icons/cart/share.svg" alt="">
                                </a>
                            </div>
                            <!-- /.product-shop__oneclick-block -->

                        </div>
                        <!--/.product-list__item-btns-->
                    </div>
                    <!-- /.product-list__item-text -->


                </div>
                <!--/.product-list__item-->

                <div class="product-list__item">
                    <div class="product-list__item-img">
                        <a href="#"><img src="/assets/img/products/1.png" alt=""></a>
                    </div>

                    <div class="product-list__item-text">
                        <h3 class="product-list__item-title">Аппликатор и сенсор Yuwell Anytime CGM</h3>

                        <div class="product-list__item-tabs">
                            <div class="product-list__item-tab-head">
                                <div class="product-list__item-tab-head__item product-list__item-tab-head__item_active" data-item="description">
                                    <p>Описание</p>
                                </div>
                                <!--/.product-list__item-tab-head__item-->

                                <div class="product-list__item-tab-head__item" data-item="delivery">
                                    <p>Доставка</p>
                                </div>
                                <!--/.product-list__item-tab-head__item-->

                                <div class="product-list__item-tab-head__item" data-item="warranty">
                                    <p>Гарантия</p>
                                </div>
                                <!--/.product-list__item-tab-head__item-->
                            </div>
                            <!--/.product-list__item-tab-head-->

                            <div class="product-list__item-tab-body">
                                <div class="product-list__item-tab product-list__item-tab_active" data-item="description">
                                    <div class="product-list__item-description-block">
                                        <div class="product-list__item-description-block__text">
                                            <p>Простой автоаппликатор — это однокнопочный аппликатор, который легко вводит встроенный сенсор под кожу.</p>
                                            <p>Yuwell Anytime CGM в Республике Беларусь от официального представителя компании - производителя.</p>
                                        </div>
                                        <!--/.product-list__item-description-block__text-->
                                        <p class="more-text">Подробнее...</p>
                                    </div>
                                    <!--/.product-list__item-description-block-->

                                    <div class="product-list__item-adv">
                                        <div class="product-list__item-adv__item">
                                            <img src="/assets/img/icons/products/check.svg" alt="">
                                            <p>Апликатор и сенсор Yuwell</p>
                                        </div>
                                        <!--/.product-list__item-adv__item-->

                                        <div class="product-list__item-adv__item">
                                            <img src="/assets/img/icons/products/check.svg" alt="">
                                            <p>Доступ в приложение</p>
                                        </div>
                                        <!--/.product-list__item-adv__item-->

                                        <div class="product-list__item-adv__item">
                                            <img src="/assets/img/icons/products/check.svg" alt="">
                                            <p>Гарантия от производителя</p>
                                        </div>
                                        <!--/.product-list__item-adv__item-->

                                        <div class="product-list__item-adv__item">
                                            <img src="/assets/img/icons/products/check.svg" alt="">
                                            <p>Служба поддержки</p>
                                        </div>
                                        <!--/.product-list__item-adv__item-->
                                    </div>
                                    <!-- /.product-list__item-adv -->
                                </div>
                                <!--/.product-list__item-tab-->

                                <div class="product-list__item-tab" data-item="delivery">
                                    <div class="product-list__item-tab-block">
                                        <div class="product-list__item-tab-title">
                                            <h4>Доставка</h4>
                                            <img src="/assets/img/products/delivery.png" alt="">
                                        </div>

                                        <div class="product-list__item-tab-block-body">
                                            <p>Самовывоз из пункта выдачи Boxberry</p>
                                            <p>Сроки: 2-7 дней</p>
                                            <p>Стоимость: 190 рублей</p>
                                        </div>
                                    </div>
                                    <!-- /.product-list__item-tab-block -->

                                    <div class="product-list__item-tab-block">
                                        <div class="product-list__item-tab-title">
                                            <h4>Самовывоз из офиса AnyTime</h4>
                                        </div>

                                        <div class="product-list__item-tab-block-body">
                                            <p>Стоимость: Бесплатно</p>
                                            <p>Сроки: выдача в день заказа</p>
                                            <p>Адрес: 220014 Минск, Филимонова 25Г-1000</p>

                                            <a href="#">Подробнее на странице Доставка...</a>
                                        </div>
                                    </div>
                                    <!-- /.product-list__item-tab-block -->
                                </div>
                                <!--/.product-list__item-tab-->

                                <div class="product-list__item-tab" data-item="warranty">
                                    <div class="product-list__item-tab-block">
                                        <div class="product-list__item-tab-title">
                                            <h4>Гарантии возврата товара</h4>
                                        </div>

                                        <div class="product-list__item-tab-block-body">
                                            <p><span>✓</span> При правильном использовании устройства для непрерывного мониторинга глюкозы мы предоставляем гарантию возврата товара в случае производственных дефектов.</p>
                                            <p><span>✓</span> Возврат товара невозможен, если поломка произошла не по вине производителя, например, при неправильной эксплуатации устройства. Для долгосрочной и безопасной работы рекомендуем избегать интенсивных бань, плавания и других воздействий, которые могут повредить устройство.</p>
                                            <p><span>✓</span> Наша служба поддержки имеет возможность удалённого подключения к вашему устройству и может отслеживать его состояние, включая такие случаи, как намокание или отклеивание сенсора.</p>
                                        </div>
                                    </div>
                                    <!-- /.product-list__item-tab-block -->
                                </div>
                                <!--/.product-list__item-tab-->
                            </div>
                            <!--/.product-list__item-tab-body-->
                        </div>
                        <!--/.product-list__item-tabs-->


                        <div class="product-list__item-price-block">
                            <div class="product-list__item-price-block__main">
                                <p>Стоимость</p>
                                <span>310BYN</span>
                            </div>
                        </div>
                        <!--/.product-list__item-price-block-->

                        <div class="product-list__item-btns">
                            <div class="product-list__item-btns-shop-quantity">
                                <button class="product-shop">
                                    <img src="/assets/img/icons/products/cart.svg" alt="">
                                    <span>Добавить в корзину</span>
                                </button>

                                <div class="product-quantity">
                                    <button class="product-quantity-btn product-quantity-btn-minus">-</button>
                                    <input type="text" class="product-quantity-input" value="1">
                                    <button class="product-quantity-btn product-quantity-btn-plus">+</button>
                                </div>
                            </div>
                            <!--/.product-list__item-btns-shop-quantity-->


                            <div class="product-shop__oneclick-block">
                                <button class="product-shop__oneclick">Купить в один клик</button>
                                <a href="#">
                                    <img src="/assets/img/icons/cart/share.svg" alt="">
                                </a>
                            </div>
                            <!-- /.product-shop__oneclick-block -->

                        </div>
                        <!--/.product-list__item-btns-->
                    </div>
                    <!-- /.product-list__item-text -->


                </div>
                <!--/.product-list__item-->
            </div>
            <!-- /.product-list -->
        </div>
        <!--/.box-container-->
    </div>
    <!--/.product-page-block-->
@endsection
