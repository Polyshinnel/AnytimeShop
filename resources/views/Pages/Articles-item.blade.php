@extends('Layers.BasicLayer')

@section('canonical', $pageInfo['canonical_url'])
@section('description', $pageInfo['description'])
@section('og_image', $pageInfo['og_image'])
@section('page_title', $pageInfo['title'])

@section('content')
    <div class="box-container box-container_news">
        <div class="news-text">
            <div class="news-text__thumb">
                <img src="{{$article['thumbnail']}}" alt="{{$article['title']}}" title="{{$article['title']}} | AnyTime">
            </div>

            <h1>{{$article['title']}}</h1>

            {!! $article['text'] !!}
        </div>
        <!-- /.news-text -->
    </div>
    <!-- /.box-container -->
@endsection
