@extends('layouts.main')



@section('content')
    <h2>List of categories</h2>
    <div class="row mb-5">
        @foreach ($categories as $category)

        @php
            if($path = $category->image){
                $image_src = asset('storage/' . $path);
            }else{
                $image_src = "assets/img/categories/". $category->slug . ".jpg";
                if(! File::exists($image_src)){
                    $image_src = asset('/assets/img/categories/default.svg');
                }
            }
        @endphp

        <div class="col-6">
            <a href="/posts?category={{ $category->slug }}">
                <div class="card my-3">
                    <img src="{{ $image_src }}" alt="{{ $category->name }}" height="300px" class="card-img rounded">
                    <div class="card-img-overlay d-flex justify-content-center align-items-center" style="background: rgba(0, 0, 0, 0.61)">
                        <h3 class="text-white">{{ $category->name }}</h3>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
@endsection
