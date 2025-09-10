@if($product['category_id'] == 1)
<div class="product-list__item">
    <div class="product-list__item-img">
        <a href="{{$product['link']}}"><img src="/storage/{{$product['thumbnail']}}" alt="{{$product['name']}}" title="{{$product['name']}} | AnyTime"></a>
    </div>

    <div class="product-list__item-text">
        <a href="{{$product['link']}}"><h3 class="product-list__item-title">{{$product['name']}}</h3></a>

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
                            {!! $product['decription'] !!}
                        </div>
                        <!--/.product-list__item-description-block__text-->
                        <p class="more-text">Подробнее...</p>
                    </div>
                    <!--/.product-list__item-description-block-->

                    <div class="product-list__item-adv">
                        @if($product['complectation'])
                            @foreach($product['complectation'] as $complect)
                                <div class="product-list__item-adv__item">
                                    <img src="assets/img/icons/products/check.svg" alt="Иконка ✓" title="Иконка ✓ | Anytime">
                                    <p>{{$complect}}</p>
                                </div>
                                <!--/.product-list__item-adv__item-->
                            @endforeach
                        @endif

                    </div>
                    <!-- /.product-list__item-adv -->
                </div>
                <!--/.product-list__item-tab-->

                <div class="product-list__item-tab" data-item="delivery">
                    @if($product['delivery'])
                        @foreach($product['delivery'] as $delivery_item)
                            <div class="product-list__item-tab-block">
                                <div class="product-list__item-tab-title">
                                    <h4>{{$delivery_item['name']}}</h4>
                                    @if($delivery_item['img'])
                                        <img src="/storage/{{$delivery_item['img']}}" alt="{{$delivery_item['name']}}" title="{{$delivery_item['name']}} | Anytime" class="delivery-product-img">
                                    @endif
                                </div>

                                <div class="product-list__item-tab-block-body">
                                    @if($delivery_item['text'])
                                        @foreach($delivery_item['text'] as $text)
                                            <p>{{$text}}</p>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <!-- /.product-list__item-tab-block -->
                        @endforeach
                    @endif
                    <a href="/delivery" class="delivery-tab-link">Подробнее на странице Доставка...</a>
                </div>
                <!--/.product-list__item-tab-->

                <div class="product-list__item-tab" data-item="warranty">
                    <div class="product-list__item-tab-block">
                        <div class="product-list__item-tab-title">
                            <h4>Гарантии возврата товара</h4>
                        </div>

                        <div class="product-list__item-tab-block-body">
                            @if($product['warranty'])
                                @foreach($product['warranty'] as $warranty)
                                    <p><span>✓</span> {{$warranty}}</p>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <!-- /.product-list__item-tab-block -->
                </div>
                <!--/.product-list__item-tab-->
            </div>
            <!--/.product-list__item-tab-body-->
        </div>
        <!--/.product-list__item-tabs-->

        @if($product['new_price'])
            <div class="product-list__item-price-block">
                <div class="product-list__item-price-block__main">
                    <p>Стоимость</p>
                    <div class="cross-price__block">
                        <span>{{$product['price']}} {{$pageInfo['currency']}}</span>
                        <div class="line"></div>
                    </div>
                </div>
                <p class="product-list__item-price-block__current">{{$product['new_price']}} {{$pageInfo['currency']}}</p>
            </div>
            <!--/.product-list__item-price-block-->
        @else

            <div class="product-list__item-price-block">
                <div class="product-list__item-price-block__main">
                    <p>Стоимость</p>
                    <span>{{$product['price']}} {{$pageInfo['currency']}}</span>
                </div>
            </div>
            <!--/.product-list__item-price-block-->
        @endif

        <div class="product-list__item-btns">
            <div class="product-list__item-btns-shop-quantity">
                <button class="product-shop" data-product="{{$product['id']}}">
                    <img src="assets/img/icons/products/cart.svg" alt="Иконка корзины" title="Иконка корзины | Anytime">
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
                <button class="product-shop__oneclick" data-product="{{$product['id']}}">Купить в один клик</button>
                <div class="share-block">
                    <div
                        class="ya-share2"
                        data-curtain
                        data-shape="round"
                        data-limit="0"
                        data-more-button-type="short"
                        data-services="vkontakte,telegram,whatsapp"
                        data-url="{{$product['product-full-link']}}"
                        data-title="{{$product['name']}}"
                        data-description="{{$product['product-link-description']}}"
                        data-image="{{$product['link-to-product-img']}}"
                    ></div>
                </div>
                <!-- /.share-block -->
            </div>
            <!-- /.product-shop__oneclick-block -->

        </div>
        <!--/.product-list__item-btns-->
    </div>
    <!-- /.product-list__item-text -->
</div>
<!--/.product-list__item-->
@endif


