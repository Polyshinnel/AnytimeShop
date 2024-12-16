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
                    <source srcset="/assets/img/pages/catalog-m.jpg" media="(max-width: 800px)">
                    <img src="/assets/img/pages/catalog.jpg" alt="Каталог" title="Каталог | AnyTime">
                </picture>
                <div class="page-title__block-bg">
                    <h1>Каталог</h1>
                    <p>Наш каталог актуальной продукции</p>
                </div>
                <!-- /.page-title__block-bg -->
            </div>
            <!-- /.page-title-block__wrapper -->
        </div>
        <!-- /.box-container -->
    </div>
    <!-- /.page-title-block -->

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
        </div>
        <!--/.box-container-->
    </div>
    <!--/.product-page-block-->
@endsection
