<header class="header-main header-basic">
    <div class="header-wrapper">
        <div class="header-main-block">
            <div class="box-container">
                <div class="header-head header-head_main">

                    <div class="header-head-total">
                        @include('Components.HeaderNav')
                        
                        <div class="header-head-total-phone">
                            <img src="/assets/img/A1.png" alt="Иконка" title="Иконка | AnyTime">
                            <a href="tel:+375173360870">+375(29)634-08-70</a>
                        </div>

                        <div class="header-country-telegram">
                            <div class="header-country-select" id="header-country-select">
                                <div class="header-country-select__current">
                                    <div class="header-country-select__current-value">
                                        <img src="/assets/img/icons/header/countries/ru.svg" alt="Иконка Россия" title="Иконка Россия | AnyTime">
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
                                <img src="/assets/img/icons/header/cart.svg" alt="Иконка" title="Иконка | AnyTime">
                                <div class="yuwell-cart__counter">
                                    @if($cart)
                                        <span>{{$cart['count']}}</span>
                                    @else
                                        <span>0</span>
                                    @endif
                                </div>
                            </div>
                            <!--/.yuwell-cart__block-->
                            <img src="/assets/img/icons/header/menu.svg" alt="Иконка" title="Иконка | AnyTime" class="yuwell-menu">
                        </div>
                        <!-- /.yuwell-cart -->
                    </div>


                    @include('Components.HeaderMobileMenu')

                    @include('Components.CartHeader')
                </div>
                <!--/.header-head-->
            </div>
        </div>
        <div class="box-container">
            <div class="motto-block">
                <img src="/assets/img/logo-w.png" alt="Логотип Yuwell" title="Логотип Yuwell | AnyTime" class="yewell-logo">
                <h1>Anytime CGM, Система мониторинга глюкозы</h1>
                <p>Следите за уровнем глюкозы и ее изменений без необходимости прокалывать пальцы</p>
                <button class="more-info-scroll">Купить</button>

            </div>
            <!-- /.motto-block -->
        </div>
        <!--/.box-container-->

        <img src="/assets/img/phone-item-block.png" class="header-app-phone" alt="Фото ANYTime и программы" title="Фото ANYTime и программы | AnyTime">

        <div class="header-app-about">
            <p>Официальный представитель
            Yuwell Anytime на территории СНГ
            <br>
            <br>
            Гарантия качества 100%
        </p>
        </div>
    </div>
    <!--/.header-wrapper-->
</header>
