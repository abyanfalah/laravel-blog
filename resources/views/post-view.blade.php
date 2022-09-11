@extends('layouts.main')
@php
    // if post has image
    if($post->image){
        $image_src = asset('storage/' . $post->image);
    }
    else{
        $image_src = "/assets/img/posts/" . mt_rand(1, 15) . ".jpg";
    }
@endphp

@section('content')
    <div class="card mb-5">
    <div class="div">
        <a href="/posts" class="btn btn-danger position-absolute"><i class="bi-arrow-left"></i> Back to posts</a>
        <img src="{{ $image_src }}" height="300px" alt="{{ $post->title }}" class="card-img-top rounded-top">
    </div>
    <div class="card-body p-5">
        <h2>{{ $post->title }}</h2>
        <small class="text-muted mb-3">
            By: <a href="/posts?author={{ $post->user->username }}">{{ $post->user->name }}</a>
            In: <a href="/posts?category={{ $post->category->slug }}">{{ $post->category->name }}</a>
            <br>
            {{ $post->created_at->diffForHumans() }}
        </small>

            <p>
                {!! $post->body !!}
            </p>

            <p class="text-muted">
                <small>
                    created at: {{ $post->created_at }}
                </small>
            </p>

            <a href="/posts" class="mt-3 btn btn-danger"><i class="bi-arrow-left"></i> Back to posts</a>
        </div>
    </div>
@endsection
