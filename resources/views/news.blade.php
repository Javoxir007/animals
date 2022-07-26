@extends('layouts/main')


@section('title')
    Новости
@endsection


@section('content')

    <div class="container">
        <div class="news-main">
            <h3>НОВОСТИ</h3>
            <div class="all-blogs">
                @foreach($allPosts as $item)
                    <div class="blog">
                        <div class="blog-img">
                            <img src="{{ $item->image }}" alt="">
                        </div>
                        <div class="blog-text">
                            <h2><a href="{{ route('full_blog', $item->id) }}">{{ $item->title }}</a></h2>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection