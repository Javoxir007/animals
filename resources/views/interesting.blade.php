@extends('layouts/main')


@section('title')
    Интересное о животных
@endsection


@section('content')

    <div class="container">
        <div class="news-main">
            <h3>ИНТЕРЕСНОЕ О ЖИВОТНЫХ</h3>
            <div class="all-blogs">
                @foreach($allPostsInteresting as $item)
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