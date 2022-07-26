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
                    <form class="row" action="{{ route('admin/news/store') }}" method="POST" enctype="multipart/form-data">
                    @csrf @method('POST')
                        <div class="mb-3 col-6">
                            <label for="" class="form-label">Image</label>
                            <input type="file" class="form-control" name="image">
                        </div>
                        <div class="mb-3 col-6">
                            <label for="" class="form-label">Title</label>
                            <input type="text" class="form-control" name="title">
                        </div>
                        <div class="mb-3 col-6">
                            <label for="" class="form-label">Category</label>
                            <select class="form-select" name="category_id">
                                <option>Tanlang</option>
                                @foreach($category as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 col-6">
                            <label for="" class="form-label">Date Create</label>
                            <input type="text" class="form-control" name="date_create" placeholder="19 Июнь, 2020">
                        </div>
                        <div class="mb-3 col-12">
                            <label for="" class="form-label">Description News</label>
                            <textarea class="form-control" rows="3" name="description_news"></textarea>
                        </div>
                        <button type="submit" class="btn btn-success col-4 offset-8">Yaratish</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection