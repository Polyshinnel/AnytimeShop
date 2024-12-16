<header class="header-main header-basic">
    <div class="header-wrapper">
        <div class="box-container">
            <div class="header-head">
                <span class="header-logo">Anytime</span>

                <div class="header-head-total">
                    @include('Components.HeaderNav')

                    <div class="yuwell-cart-menu">
                        <img src="/assets/img/logo-w.png" alt="Логотип Yuwell" title="Логотип Yuwell | AnyTime" class="yewell-logo">
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

            <div class="motto-block">
                <h1>Управляйте диабетом с уверенностью</h1>
                <p>Следите за уровнем глюкозы и ее изменений без необходимости прокалывать пальцы</p>
                <button class="more-info-scroll">Купить</button>

            </div>
            <!-- /.motto-block -->
        </div>
        <!--/.box-container-->

        <img src="/assets/img/phone-item-block.png" class="header-app-phone" alt="Фото ANYTime и программы" title="Фото ANYTime и программы | AnyTime">

        <div class="header-app-about">
            <p>Приобретая у официального представителя, вы гарантированно получаете качественный сервис и 100% замену в случае неисправности.</p>
        </div>
    </div>
    <!--/.header-wrapper-->
</header>
