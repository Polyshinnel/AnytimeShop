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
                    <source srcset="/assets/img/pages/delivery-m.jpg" media="(max-width: 800px)">
                    <img src="/assets/img/pages/delivery.jpg" alt="Абстрактное изображение">
                </picture>
                <div class="page-title__block-bg">
                    <h1>Доставка и оплата</h1>
                    <p>Информация об оплате, доставке и самовывозе</p>
                </div>
                <!-- /.page-title__block-bg -->
            </div>
            <!-- /.page-title-block__wrapper -->
        </div>
        <!-- /.box-container -->
    </div>
    <!-- /.page-title-block -->

    <div class="payment-block">
        <div class="box-container">
            <section class="delivery-payment-common">
                <div class="delivery-payment-common__title">
                    <h2>Оплата</h2>
                </div>
                <!-- /.delivery-payment-common__title -->

                <div class="delivery-payment-common__text">
                    <p>При оформлении заказа в интернет-магазине возможна только онлайн-оплата. Оплата при получении недоступна. </p>
                    <p>Доступные способы оплаты: </p>
                    <ul>
                        <li>Банковской картой</li>
                        <li>СБП</li>
                    </ul>
                </div>
                <!-- /.delivery-payment-common__text -->
                <img src="/assets/img/delivery-payment/cards.png" alt="" class="delivery-payment-common__img">
            </section>
            <!-- /.delivery-payment-common -->
        </div>
        <!-- /.box-container -->
    </div>
    <!-- /.payment-block -->

    <div class="delivery-block">
        <div class="box-container">
            <section class="delivery-payment-common">
                <div class="delivery-payment-common__title">
                    <h2>Доставка</h2>
                    <img src="/assets/img/delivery-payment/boxberry-logo.png" alt="">
                </div>
                <!-- /.delivery-payment-common__title -->

                <div class="delivery-payment-common__text">
                    <p>Сеть пунктов выдачи Boxberry — <a href="https://boxberry.ru/find_an_office">https://boxberry.ru/find_an_office</a></p>
                    <p>Самовывоз из пункта выдачи Boxberry</p>
                    <p>Стоимость: 190 рублей</p>
                    <p>Сроки: 2-7 дней</p>
                    <p>Способ оплаты: Банковской картой, СБП</p>
                </div>
                <!-- /.delivery-payment-common__text -->

                <div class="delivery-payment-common__text">
                    <p>Детали</p>
                    <ul>
                        <li>Срок хранения заказа в пункте выдачи — 14 дней</li>
                        <li>Чтобы получить заказ, нужно предъявить паспорт</li>
                        <li>При отказе от получения предоплаченного заказа, стоимость доставки не возвращается</li>
                        <li>Найти пункт выдачи в своем городе и уточнить сроки доставки вы можете на сайте Boxberry</li>
                        <li>Если пункт выдачи переполнен, Boxberry может доставить заказ в ближайший пункт от выбранного. Следить за статусом можно на сайте сервиса</li>
                        <li>Сумма заказа не может превышать 300 000 рублей</li>
                    </ul>
                    <i>* Пожалуйста, учтите, что доставка каждого заказа оплачивается отдельно, даже если вы выбираете для получения один день.</i>
                </div>
                <!-- /.delivery-payment-common__text -->
                <img src="/assets/img/" alt="">
            </section>
            <!-- /.delivery-payment-common -->

            <section class="delivery-payment-common">
                <div class="delivery-payment-common__title">
                    <h2>Самовывоз из офиса AnyTime</h2>
                </div>
                <!-- /.delivery-payment-common__title -->

                <div class="delivery-payment-common__text">
                    <p>Стоимость: Бесплатно</p>
                    <p>Сроки: 2-3 дня</p>
                    <p>Способ оплаты: Банковской картой, СБП</p>
                    <p>Детали:</p>
                    <ul>
                        <li>Срок хранения заказа в магазине — 5 дней</li>
                        <li>Адрес: 220014 Минск, Филимонова 25Г-1000</li>
                    </ul>
                </div>
                <!-- /.delivery-payment-common__text -->
                <img src="/assets/img/delivery-payment/anytime-box.png" class="delivery-payment-common__img" alt="">
            </section>
            <!-- /.delivery-payment-common -->
        </div>
        <!-- /.box-container -->

        <img src="/assets/img/delivery-payment/truck-bg.svg" alt="" class="delivery-block-bg">
    </div>
@endsection
