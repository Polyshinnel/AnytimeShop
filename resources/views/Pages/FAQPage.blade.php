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
                    <source srcset="/assets/img/pages/faq-m.jpg" media="(max-width: 800px)">
                    <img src="/assets/img/pages/faq.jpg" alt="FAQ" title="FAQ | AnyTime">
                </picture>
                <div class="page-title__block-bg">
                    <h1>{{$pageInfo['h1']}}</h1>
                    <p>Есть вопрос? Мы здесь, чтобы помочь!</p>
                </div>
                <!-- /.page-title__block-bg -->
            </div>
            <!-- /.page-title-block__wrapper -->
        </div>
        <!-- /.box-container -->
    </div>
    <!-- /.page-title-block -->

    <div class="box-container">
        @if($faq)
            @foreach($faq as $faqGroup)
                <section class="faq-section">
                    <h2>{{$faqGroup['group_name']}}</h2>

                    <div class="faq-section-list">
                        @foreach($faqGroup['faq_list'] as $faqItem)
                            <div class="faq-section__item">
                                <div class="faq-section__item-head">
                                    <h3>{{$faqItem['question']}}</h3>
                                    <img src="/assets/img/icons/common/plus-w.svg" alt="Иконка" title="Иконка | AnyTime">
                                </div>
                                <!-- /.faq-section__item-head -->
                                <div class="faq-section__item-body">
                                    <p>{{$faqItem['answer']}}</p>
                                </div>
                                <!-- /.faq-section__item-body -->
                            </div>
                            <!-- /.faq-section__item -->
                        @endforeach
                    </div>
                    <!-- /.faq-section-list -->
                </section>
                <!--/.faq-section-->
            @endforeach
        @endif
    </div>
    <!-- /.box-container -->
@endsection
