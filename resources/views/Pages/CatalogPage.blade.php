@extends('Layers.BasicLayer')

@section('canonical', $pageInfo['canonical_url'])
@section('description', $pageInfo['description'])
@section('og_image', $pageInfo['og_image'])
@section('page_title', $pageInfo['title'])

@section('content')

    <div class="product-page-block">
        <div class="box-container">
            <div class="product-list">
                @if($products)
                    @foreach($products as $product)
                        @include('Components.Product')
                    @endforeach
                @endif
            </div>
            <!-- /.product-list -->

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
        <!--/.box-container-->
    </div>
    <!--/.product-page-block-->
@endsection
