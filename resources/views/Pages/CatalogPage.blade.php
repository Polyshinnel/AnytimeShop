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
        </div>
        <!--/.box-container-->
    </div>
    <!--/.product-page-block-->
@endsection
