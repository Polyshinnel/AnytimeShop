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
                    <img src="/assets/img/pages/delivery.jpg" alt="Доставка" title="Доставка | AnyTime">
                </picture>
                <div class="page-title__block-bg">
                    <h1>{{$pageInfo['h1']}}</h1>
                    <p>Информация об оплате, доставке и самовывозе</p>
                </div>
                <!-- /.page-title__block-bg -->
            </div>
            <!-- /.page-title-block__wrapper -->
        </div>
        <!-- /.box-container -->
    </div>
    <!-- /.page-title-block -->

    @if($paymentInfo)
    <div class="payment-block">
        <div class="box-container">
            @foreach($paymentInfo as $payment)
                <section class="delivery-payment-common">
                    <div class="delivery-payment-common__title">
                        <h2>{{$payment['name']}}</h2>
                        @if($payment['title_img'])
                            <img src="/storage/{{$payment['title_img']}}" alt="Иконка оплаты" title="Иконка оплаты | AnyTime">
                        @endif
                    </div>
                    <!-- /.delivery-payment-common__title -->

                    {!! $payment['content'] !!}
                    <!-- /.delivery-payment-common__text -->
                    <img src="/assets/img/delivery-payment/cards.png" alt="Банковские карты" title="Банковские карты | AnyTime" class="delivery-payment-common__img">
                </section>
                <!-- /.delivery-payment-common -->
            @endforeach

        </div>
        <!-- /.box-container -->
    </div>
    <!-- /.payment-block -->
    @endif

    @if($deliveryInfo)
        <div class="delivery-block">
            <div class="box-container">
                @foreach($deliveryInfo as $delivery)
                    <section class="delivery-payment-common">
                        <div class="delivery-payment-common__title">
                            <h2>{{$delivery['name']}}</h2>
                            @if($delivery['title_img'])
                                <img src="/storage/{{$delivery['title_img']}}" alt="Иконка доставки" title="Иконка доставки | AnyTime">
                            @endif
                        </div>
                        <!-- /.delivery-payment-common__title -->

                        {!! $delivery['content'] !!}
                    </section>
                    <!-- /.delivery-payment-common -->
                @endforeach
            </div>
            <!-- /.box-container -->

            <img src="/assets/img/delivery-payment/truck-bg.svg" alt="Иконка доставка" title="Иконка доставка | AnyTime" class="delivery-block-bg">
        </div>
    @endif

@endsection
