<div class="cart-block">
    <div class="cart-block__header-icons">
        <div class="share-block">
            <img src="/assets/img/icons/cart/share.svg" alt="" class="share-block-btn">
        </div>
        <img src="/assets/img/icons/cart/close.svg" class="close-cart" alt="">
    </div>
    <!-- /.cart-block__header-icons -->

    <h2>Корзина</h2>

    @if($cart)
    <div class="cart-products">
        @foreach($cart['products'] as $product)
            <div class="cart-item">
                <div class="cart-item__img">
                    <a href="{{$product['link']}}"><img src="{{$product['thumbnail']}}" alt=""></a>
                </div>
                <!-- /.cart-item__img -->

                <div class="cart-item__controls">
                    <a href="{{$product['link']}}"><h3>{{$product['name']}}</h3></a>
                    <div class="cart-item__control-price">
                        <div class="cart-item__control">
                            <button class="minus-cart cart-btn" data-product="{{$product['id']}}">-</button>
                            <input type="text" class="cart-product-count" name="cart-product-count" id="cart-product-count" value="{{$product['quantity']}}">
                            <button class="plus-cart cart-btn" data-product="{{$product['id']}}">+</button>
                        </div>
                        <!--/.cart-item__control-->

                        <div class="cart-item__price">
                            @if($product['new_price'])
                                <span>{{$product['total_price']}} BYN</span>
                                <p>{{$product['total_new']}} BYN</p>
                            @else
                                <p>{{$product['total_price']}} BYN</p>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- /.cart-item__controls -->
            </div>
            <!-- /.cart-item -->
        @endforeach
    </div>
    <!-- /.cart-products -->

    <div class="cart-total">
        <h3>Сумма заказа</h3>

        <div class="cart-total__items">
            <div class="cart-total__item">
                <span>Стоимость продуктов</span>
                <div class="dash-line"></div>
                <span>{{$cart['total']}} BYN</span>
            </div>
            <!-- /.cart-total__item -->

            <div class="cart-total__item">
                <span>Скидка</span>
                <div class="dash-line"></div>
                <span>-{{$cart['total_sale']}} BYN</span>
            </div>
            <!-- /.cart-total__item -->
        </div>
        <!-- /.cart-total__items -->

        <p class="cart-total__summ">Итого: <span>{{$cart['total']}} BYN</span></p>
    </div>
    <!-- /.cart-total -->

    <a href="/order"><button class="create-order">Оформить заказ</button></a>
    @else
        <div class="empty-block">
            <p class="empty-cart-info">К сожалению Ваша корзина пуста, добавьте товары для оформления заказа</p>

            <a href="/catalog"><button class="create-order">В каталог</button></a>
        </div>
    @endif
</div>
<!-- /.cart-block -->
