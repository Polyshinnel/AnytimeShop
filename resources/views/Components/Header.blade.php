<header class="header-common">
    <div class="header-attention">
        <p>Сайт находится в разработке</p>
    </div>
    <div class="box-container">
        <div class="header-head header-head_mod">
            <a href="/" class="header-logo-link"><span class="header-logo">Anytime</span></a>

            <div class="header-head-total">
                @include('Components.HeaderNav')

                <div class="yuwell-cart-menu">
                    <img src="/assets/img/logo-b.png" alt="" class="yewell-logo">
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
