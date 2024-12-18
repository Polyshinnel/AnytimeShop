@extends('Layers.BasicLayer')

@section('canonical', $pageInfo['canonical_url'])
@section('description', $pageInfo['description'])
@section('og_image', $pageInfo['og_image'])
@section('page_title', $pageInfo['title'])

@section('content')
    <div class="box-container">
        <h1 class="news-title">{{$pageTitle}}</h1>

        <div class="news-list">
            @if($articles)
                @foreach($articles as $article)
                    <article class="news-item">
                        <div class="news-item__img">
                            <a href="{{$article['link']}}"><img src="{{$article['thumbnail']}}" alt="{{$article['title']}}" title="{{$article['title']}} | AnyTime"></a>
                        </div>
                        <!-- /.news-item__img -->

                        <div class="news-item__text">
                            <a href="{{$article['link']}}">
                                <h2>{{$article['title']}}</h2>
                            </a>
                            <p>{{$article['description_short']}}</p>
                        </div>
                        <!-- /.news-item__text -->
                    </article>
                    <!-- /.news-item -->
                @endforeach
            @endif

        </div>
    </div>
@endsection
