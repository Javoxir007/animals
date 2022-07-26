@extends('layouts/main')


@section('title')
    {{ $findBlog->title }}
@endsection


@section('content')

    <div class="container">
        <div class="news-full-text">
            <div class="news-left">
                <h5><a href="#">{{ $findBlog->category->name }}</a></h5>
                <h1>{{ $findBlog->title }}</h1>
                <div class="news-left-img">
                    <img src="{{ $findBlog->image }}" alt="">
                </div>
                <p>{{ $findBlog->description_news }}</p>
                <h3>ТАКЖЕ СМОТРИТЕ</h3>
                <div class="all-rekommendation">
                    @foreach($recomendation as $item)
                        <div class="rekommendation">
                            <div class="rekommendation-img">
                                <img src="{{ $item->image }}" alt="">
                            </div>
                            <div class="rekommendation-text">
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

