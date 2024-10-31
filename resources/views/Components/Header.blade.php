<header class="header-common">
    <div class="box-container">
        <div class="header-head header-head_mod">
            <a href="/"><span class="header-logo">Anytime</span></a>

            @include('Components.HeaderNav')

            <div class="yuwell-cart-menu">
                <img src="/assets/img/logo-b.png" alt="" class="yewell-logo">
                <div class="yuwell-cart__block">
                    <img src="/assets/img/icons/header/cart-b.svg" alt="">
                    <div class="yuwell-cart__counter">
                        <span>3</span>
                    </div>
                </div>
                <!--/.yuwell-cart__block-->
                <img src="/assets/img/icons/header/menu-b.svg" alt="" class="yuwell-menu">
            </div>
            <!-- /.yuwell-cart -->

            @include('Components.HeaderMobileMenu')

            @include('Components.CartHeader')
        </div>
        <!--/.header-head-->
    </div>
    <!-- /.box-container -->
</header>
<!-- /.header-common -->
