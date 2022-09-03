@extends('layouts.main')

@section('content')
    <h2>List of categories</h2>
    <div class="row mb-5">
        @foreach ($categories as $category)
        <div class="col-6">
            <a href="/posts?category={{ $category->slug }}">
                <div class="card my-3">
                    <img src="/assets/img/categories/{{ $category->slug }}.jpg" alt="{{ $category->name }}" height="300px" class="card-img rounded">
                    <div class="card-img-overlay d-flex justify-content-center align-items-center" style="background: rgba(0, 0, 0, 0.61)">
                        <h3 class="text-white">{{ $category->name }}</h3>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
@endsection
