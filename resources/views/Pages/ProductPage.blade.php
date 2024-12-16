@extends('Layers.BasicLayer')




@section('canonical', $product['link'])
@section('description', $product['clear_description'])
@section('og_image', '/assets/img/og-image.png')
@section('page_title', $product['name'])

@section('content')
    <main>
        <div class="box-container">
            <div class="product-list__item product-list__item_mod">
                <div class="product-list__item-img product-list__item-img_mod">
                    <section
                        id="main-carousel"
                        class="splide"
                        aria-label="The carousel with thumbnails. Selecting a thumbnail will change the Beautiful Gallery carousel."
                    >
                        <div class="splide__track">
                            <ul class="splide__list">
                                @foreach($product['images'] as $img)
                                    <li class="splide__slide">
                                        <img src="{{$img['img']}}" data-fancybox="gallery" alt="">
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                    </section>
                    <section
                        id="thumbnail-carousel"
                        class="splide"
                        aria-label="The carousel with thumbnails. Selecting a thumbnail will change the Beautiful Gallery carousel."
                    >
                        <div class="splide__track">
                            <ul class="splide__list">
                                @foreach($product['images'] as $img)
                                    <li class="splide__slide">
                                        <img src="{{$img['img']}}" data-fancybox="gallery" alt="">
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </section>
                </div>

                <div class="product-list__item-text">
                    <h1 class="product-list__item-title">{{$product['name']}}</h1>

                    @if($product['new_price'])
                        <div class="product-list__item-price-block product-list__item-price-block_mod">
                            <div class="product-list__item-price-block__main">
                                <p>Стоимость</p>
                                <div class="cross-price__block">
                                    <span>{{$product['price']}} BYN</span>
                                    <div class="line"></div>
                                </div>
                            </div>
                            <p class="product-list__item-price-block__current">{{$product['new_price']}} BYN</p>
                        </div>
                        <!--/.product-list__item-price-block-->
                    @else

                        <div class="product-list__item-price-block product-list__item-price-block_mod">
                            <div class="product-list__item-price-block__main">
                                <p>Стоимость</p>
                                <span>{{$product['price']}} BYN</span>
                            </div>
                        </div>
                        <!--/.product-list__item-price-block-->
                    @endif

                    <div class="product-list__item-btns">
                        <div class="product-list__item-btns-shop-quantity">
                            <button class="product-shop" data-product="{{$product['id']}}">
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
                            <button class="product-shop__oneclick" data-product="{{$product['id']}}">Купить в один клик</button>
                        </div>
                        <!-- /.product-shop__oneclick-block -->

                    </div>
                    <!--/.product-list__item-btns-->

                    <div class="product-list__item-tabs">
                        <div class="product-list__item-tab-body">
                            <div class="product-list__item-tab product-list__item-tab_active" data-item="description">
                                <div class="product-list__item-description-block">
                                    <div class="product-list__item-description-block__text active">
                                        {!! $product['decription'] !!}
                                    </div>
                                </div>
                                <!--/.product-list__item-description-block-->

                                <div class="product-list__item-adv">
                                    @if($product['complectation'])
                                        @foreach($product['complectation'] as $complect)
                                            <div class="product-list__item-adv__item">
                                                <img src="/assets/img/icons/products/check.svg" alt="">
                                                <p>{{$complect}}</p>
                                            </div>
                                            <!--/.product-list__item-adv__item-->
                                        @endforeach
                                    @endif

                                </div>
                                <!-- /.product-list__item-adv -->
                            </div>
                            <!--/.product-list__item-tab-->
                        </div>
                        <!--/.product-list__item-tab-body-->
                    </div>
                    <!--/.product-list__item-tabs-->
                </div>
                <!-- /.product-list__item-text -->
            </div>
            <!--/.product-list__item-->
        </div>
        <!--/.box-container-->


        <div class="common-product-char">
            <div class="common-product-char__wrapper">
                <div class="box-container">
                    @if($product['common_chars'])
                    <div class="common-product-char__wrapper-block">
                        <h2>Общие характеристики</h2>

                        <ul>
                            @foreach($product['common_chars'] as $char)
                                <li>{{$char}}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
                <!-- /.box-container -->
            </div>
            <!-- /.common-product-char__wrapper -->
        </div>
        <!-- /.common-product-char -->
    </main>

    <script>
        document.addEventListener( 'DOMContentLoaded', function () {
            var main = new Splide( '#main-carousel', {
                type      : 'fade',
                rewind    : true,
                pagination: false,
                arrows    : false,
                fixedHeight : 300,
            } );

            var thumbnails = new Splide( '#thumbnail-carousel', {
                fixedWidth  : 100,
                fixedHeight : 60,
                gap         : 10,
                rewind      : true,
                pagination  : false,
                isNavigation: true,
                arrows    : false,
                breakpoints : {
                    600: {
                        fixedWidth : 60,
                        fixedHeight: 44,
                    },
                },
            } );

            main.sync( thumbnails );
            main.mount();
            thumbnails.mount();
        } );
    </script>

    <script>
        Fancybox.bind("[data-fancybox]", {
            // Your custom options
        });
    </script>
@endsection
