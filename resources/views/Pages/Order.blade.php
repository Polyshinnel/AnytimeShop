@extends('Layers.BasicLayer')

@section('page_title', 'AnyTime CGM')

@section('content')
    <main>
        <div class="box-container">
            <div class="product-page__title">
                <ul class="breadcrumbs">
                    <li><a href="/">Главная</a>&nbsp;/&nbsp;</li>
                    <li>Оформление заказа</li>
                </ul>
                <!-- /.breadcrumbs -->

                <h1>Оформление заказа</h1>
            </div>

            @if($cart)
                <div class="personal-data-cart">
                    <h2>Данные клиента</h2>
                    <div class="personal-data-cart__block">
                        <div class="input-block">
                            <label for="cart-name">Ваше имя</label>
                            <input type="text" id="cart-name" name="cart-name" placeholder="Ваше имя">
                            <span class="err-text">Имя должно быть не менее 2х символов!</span>
                        </div>
                        <!-- /.input-block -->

                        <div class="input-block">
                            <label for="cart-phone">Телефон</label>
                            <input type="text" id="cart-phone" name="cart-phone" placeholder="Ваш Телефон">
                            <span class="err-text">Введите корректный телефон!</span>
                        </div>
                        <!-- /.input-block -->

                        <div class="input-block">
                            <label for="cart-mail">Почта</label>
                            <input type="text" id="cart-mail" name="cart-mail" placeholder="Ваша почта">
                            <span class="err-text">Введите корректную почту!</span>
                        </div>
                        <!-- /.input-block -->

                        <div class="input-block">
                            <label for="cart-comment">Комментарий</label>
                            <textarea id="cart-comment" name="cart-comment" placeholder="Комментарий"></textarea>
                        </div>
                        <!-- /.input-block -->
                    </div>
                    <!-- /.personal-data-cart__block -->

                </div>
                <!-- /.personal-data-cart -->

                <div class="order-items-list">
                    <h2>Состав заказа</h2>

                    <div class="order-list__header">
                        <div class="product-col">Продукт</div>
                        <div class="price-col">Цена</div>
                        <div class="quantity-col">Количество</div>
                    </div>
                    <!-- /.order-list__header -->

                    <div class="order-list">
                        @foreach($cart['products'] as $product)
                            <div class="order-list__item">
                                <div class="product-col">
                                    <a href="{{$product['link']}}">
                                        <div class="img-box">
                                            <img src="{{$product['thumbnail']}}" alt="">
                                        </div>
                                    </a>
                                    <a href="{{$product['link']}}"><h3>{{$product['name']}}</h3></a>
                                </div>
                                <!--/.product-col-->

                                @if($product['new_price'])
                                    <div class="price-col">
                                        <span>{{$product['total_price']}} BYN</span>
                                        <p>{{$product['total_new']}} BYN</p>
                                    </div>
                                    <!-- /.price-col -->
                                @else
                                    <div class="price-col">
                                        <p>{{$product['total_price']}} BYN</p>
                                    </div>
                                    <!-- /.price-col -->
                                @endif

                                <div class="quantity-col">
                                    <div class="quantity-block">
                                        <button class="button button-minus" data-product="{{$product['id']}}">-</button>
                                        <input type="text" class="product-order-quantity" value="{{$product['quantity']}}">
                                        <button class="button button-plus" data-product="{{$product['id']}}">+</button>
                                    </div>

                                    <div class="delete-block">
                                        <img src="assets/img/icons/common/delete.svg" alt="" data-product="{{$product['id']}}">
                                    </div>
                                </div>
                                <!-- /.quantity-col -->

                                <div class="delete-block">
                                    <img src="assets/img/icons/common/delete.svg" alt="">
                                </div>
                            </div>
                            <!--/.order-list__item-->
                        @endforeach

                    </div>
                    <!--/.order-list-->
                </div>
                <!--/.order-items-list-->

                <div class="delivery-block">
                    <h2>Способ доставки</h2>

                    <div class="delivery-methods">
                        <div class="delivery-method">
                            <div class="delivery-method__checkbox">
                                <label for="self-pickup">
                                    <input type="checkbox" name="self-pickup" checked id="self-pickup" data-item="self-pickup">
                                    <span></span>
                                </label>
                            </div>
                            <div class="delivery-method-text">
                                <p>Самовывоз из офиса AnyTime</p>
                            </div>
                        </div>
                        <!-- /.delivery-method -->

                        <div class="delivery-method">
                            <div class="delivery-method__checkbox">
                                <label for="boxberry">
                                    <input type="checkbox" name="boxberry" id="boxberry" data-item="boxberry">
                                    <span></span>
                                </label>
                            </div>

                            <div class="delivery-method-text">
                                <img src="assets/img/delivery-payment/boxberry-logo.png" alt="">
                                <p class="select-boxberry">Выбрать пункт выдачи на карте</p>
                            </div>
                        </div>
                        <!-- /.delivery-method -->
                    </div>
                    <!-- /.delivery-methods -->
                </div>
                <!-- /.delivery-block -->

                <div class="total-calculate">
                    <div class="add-params">
                        <span>Доставка</span>
                        <div class="line"></div>
                        <span class="price-add">0 BYN</span>
                    </div>

                    <div class="total-block">
                        <h3><b>Итого</b> {{$cart['total']}} BYN</h3>

                        <button class="confirm-order">Оформить заказ</button>
                    </div>
                </div>
                <!-- /.total-calculate -->
            @else
                <div class="empty-order-block">
                    <div class="empty-order-block__wrapper">
                        <img src="/assets/img/icons/error.svg" alt="">
                        <h2>Ошибка!</h2>
                        <p>К сожалению в вашей корзине нет товаров для заказа, добавьте что нибудь в корзину и возвращайтесь</p>
                        <a href="/catalog">
                            <button class="go-to-catalog">В каталог</button>
                        </a>
                    </div>
                    <!-- /.empty-order-block__wrapper -->
                </div>
                <!-- /.empty-order-block -->
            @endif
        </div>
        <!--/.box-container-->
    </main>
@endsection
