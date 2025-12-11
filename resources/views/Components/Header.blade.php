<header class="header-common">
    <div class="box-container">
        <div class="header-head header-head_mod">

            <div class="header-head-total">
                @include('Components.HeaderNav')

                <div class="header-head-total-phone">
                    <img src="/assets/img/A1.png" alt="Иконка" title="Иконка | AnyTime">
                    @php
                        $currentHost = request()->getHost();
                        print_r($currentHost);
                        $isRuOrKz = in_array($currentHost, ['diabet-anytime.kz', 'diabet-anytime.ru']);
                        $phoneNumber = $isRuOrKz ? '+7 499 430 06 70' : '+375(29)634-08-70';
                        $phoneHref = $isRuOrKz ? 'tel:+74994300670' : 'tel:+375173360870';
                    @endphp
<!-- 
                    <a href="{{ $phoneHref }}">{{ $phoneNumber }}</a> -->
                    <a href="{{ $phoneHref }}">Test</a>
                </div>

                <div class="header-country-telegram">
                    <div class="header-country-select" id="header-country-select">
                        <div class="header-country-select__current">
                            <div class="header-country-select__current-value">
                                @if($currentHost == 'diabet-anytime.kz')
                                    <img src="/assets/img/icons/header/countries/kz.svg" alt="Иконка Казахстан" title="Иконка Казахстан | AnyTime">
                                @elseif($currentHost == 'diabet-anytime.ru')
                                    <img src="/assets/img/icons/header/countries/ru.svg" alt="Иконка Россия" title="Иконка Россия | AnyTime">
                                @else
                                    <img src="/assets/img/icons/header/countries/bel.svg" alt="Иконка Беларусь" title="Иконка Беларусь | AnyTime">
                                @endif
                                <img src="/assets/img/icons/header/countries/bel.svg" alt="Иконка Беларусь" title="Иконка Беларусь | AnyTime">
                            </div>
                        </div>
                        <div class="header-country-select__list">
                            <div class="header-country-select__list-item" data-country="ru">
                                <img src="/assets/img/icons/header/countries/ru.svg" alt="Иконка Россия" title="Иконка Россия | AnyTime">
                                <p>Россия</p>
                            </div>
                            <div class="header-country-select__list-item" data-country="bel">
                                <img src="/assets/img/icons/header/countries/bel.svg" alt="Иконка Беларусь" title="Иконка Беларусь | AnyTime">
                                <p>Беларусь</p>
                            </div>
                            <div class="header-country-select__list-item" data-country="kz">
                                <img src="/assets/img/icons/header/countries/kz.svg" alt="Иконка Казахстан" title="Иконка Казахстан | AnyTime">
                                <p>Казахстан</p>
                            </div>
                        </div>
                    </div>
                    
                    <a href="https://t.me/DiabetAnyTime" target="_blank" class="header-telegram-link">
                        <img src="/assets/img/icons/telegram.svg" alt="Telegram" title="Telegram | AnyTime">
                    </a>
                </div>

                <div class="yuwell-cart-menu">
                    <div class="yuwell-cart__block">
                        <img src="/assets/img/icons/header/cart-b.svg" alt="Иконка" title="Иконка | AnyTime">
                        <div class="yuwell-cart__counter">
                            @if($cart)
                                <span>{{$cart['count']}}</span>
                            @else
                                <span>0</span>
                            @endif
                        </div>
                    </div>
                    <!--/.yuwell-cart__block-->
                    <img src="/assets/img/icons/header/menu-b.svg" alt="Иконка" title="Иконка | AnyTime" class="yuwell-menu">
                </div>
                <!-- /.yuwell-cart -->
            </div>


            @include('Components.HeaderMobileMenu')

            @include('Components.CartHeader')
        </div>
        <!--/.header-head-->
    </div>
    <!-- /.box-container -->
</header>
<!-- /.header-common -->
