@extends('Layers.BasicLayer')

@section('canonical', $pageInfo['canonical_url'])
@section('description', $pageInfo['description'])
@section('og_image', $pageInfo['og_image'])
@section('page_title', $pageInfo['title'])

@section('content')
    <div class="sertificates-header">
        <h1>{{$pageInfo['h1']}}</h1>
        <div class="sertificates-header__line"></div>
        <p>Все аппараты прошли строгую сертификацию и соответствуют международным стандартам.</p>
    </div>
    <!-- /.sertificates-header -->

    <div class="box-container">
        <div class="sertificates-list">
            @if($certificates)
                @foreach($certificates as $certificate)
                    <div class="sertificates-list-item">
                        <a data-fancybox data-type="pdf" href="/storage/{{$certificate['link']}}">
                            <div class="sertificates-list-item-img">
                                <img src="/storage/{{$certificate['img']}}" alt="{{$certificate['name']}}" title="{{$certificate['name']}} | AnyTime">
                            </div>
                        </a>
                    </div>
                    <!-- /.sertificates-list-item -->
                @endforeach
            @endif
        </div>
        <!-- /.sertificates-list -->
    </div>
    <!-- /.box-container -->

    <script>
        Fancybox.bind("[data-fancybox]", {
            // Your custom options
        });
    </script>
@endsection
