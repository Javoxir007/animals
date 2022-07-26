@extends('layouts/app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <span class="d-flex align-items-center">Yangiliklar</span>
                    <a href="{{ route('admin/news/index') }}" class="btn btn-outline-success">Ortga qaytish</a>
                </div>

                <div class="card-body">
                    <form class="row" action="/admin/news/{{ $item->id }}" method="POST" enctype="multipart/form-data">
                    @csrf @method('PATCH')
                        <div class="mb-3 col-3">
                            <label for="" class="form-label">Now image(xozirgi rasmi)</label>
                            <img src="{{ $item->image }}" class="form-control">
                        </div>
                        <div class="mb-3 col-4">
                            <label for="" class="form-label">Image</label>
                            <input type="file" class="form-control" name="image" value="{{ $item->image }}">
                        </div>
                        <div class="mb-3 col-5">
                            <label for="" class="form-label">Title</label>
                            <input type="text" class="form-control" name="title" value="{{ $item->title }}">
                        </div>
                        <div class="mb-3 col-6">
                            <label for="" class="form-label">Category</label>
                            <select class="form-select" name="category_id">
                                <option value="{{ $item->category->id }}">{{ $item->category->name }}</option>
                                @foreach($category as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 col-6">
                            <label for="" class="form-label">Date Create</label>
                            <input type="text" class="form-control" name="date_create" value="{{ $item->date_create }}">
                        </div>
                        <div class="mb-3 col-12">
                            <label for="" class="form-label">Description News</label>
                            <textarea class="form-control" rows="3" name="description_news">{{ $item->description_news }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-success col-4 offset-8">Yaratish</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

