@extends('layouts/main')


@section('title')
    О животных
@endsection


@section('content')

    <div class="container">
        <div class="index-main">
            <div class="index-left">
                <div class="index-main-top">
                    <h3>НОВОСТИ</h3>
                    <div class="all-index-news">
                        <a href="/news">ВСЕ НОВОСТИ</a>
                    </div>
                </div>
                <div class="all-index-blogs">
                    <div class="index-blogs-first in-first">
                        <div class="index-blogs-image">
                            <img src="{{ $lastNewsPost->image }}" alt="">
                        </div>
                        <h5><a href="/news">НОВОСТИ</a></h5>
                        <h3><a href="{{ route('full_blog', $lastNewsPost->id) }}">{{ $lastNewsPost->title }}</a></h3>
                        <p class="first-p">{{ $lastNewsPost->date_create }}</p>
                        <p class="second-p">{{ $description }} …</p>
                    </div>
                    <div class="index-blogs-first">
                        @foreach($allPosts as $item)
                            <div class="inner-index-blogs">
                                <div class="inner-left">
                                    <img src="{{ $item->image }}" alt="">
                                </div>
                                <div class="inner-right">
                                    <h4><a href="{{ route('full_blog', $item->id) }}">{{ $item->title }}</a></h4>
                                    <p>{{ $item->date_create }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>                
            </div>
        </div>
    </div>


    
    <div class="container">
        <div class="index-main-interest">
            <div class="index-left-interest">
                <div class="index-main-top-interest">
                    <h3>ИНТЕРЕСНОЕ О ЖИВОТНЫХ</h3>
                    <div class="all-index-news-interest">
                        <a href="/interesting">ВЕСЬ РАЗДЕЛ</a>
                    </div>
                </div>
                <div class="all-rekommendation-interest">
                    @foreach($interesting as $item)
                        <div class="rekommendation-interest">
                            <div class="rekommendation-img-interest">
                                <img src="{{ $item->image }}" alt="">
                            </div>
                            <div class="rekommendation-text-interest">
                                <h3><a href="{{ route('full_blog', $item->id) }}">{{ $item->title }}</a></h3>
                                <p>{{ $item->date_create }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>             
            </div>
        </div>
    </div>

@endsection