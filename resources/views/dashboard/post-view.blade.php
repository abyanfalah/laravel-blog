@extends('layouts.dashboard')

@section('content')
    <div class="card mb-5">
    <div class="div">
        <img src="/assets/img/posts/{{ mt_rand(1, 15) }}.jpg" height="300px" alt="{{ $post->title }}" class="card-img-top rounded-top">
    </div>
    <div class="card-body p-5">
        <div class="row">
            <div class="col">
                <h2>{{ $post->title }}</h2>
            </div>
            <div class="col text-end">
                <div class="btn-group">
                        <a href="/dashboard/posts" class="btn btn-primary"><i class="bi-arrow-left"></i> Back</a>
                        <a href="#" class="btn btn-warning"><i class="bi-pencil"></i> Edit</a>
                        <button class="btn btn-danger"><i class="bi-trash"></i> Delete</button>
                    </div>
            </div>
        </div>
        {{-- <small class="text-muted mb-3">
            By: <a href="/posts?author={{ $post->user->username }}">{{ $post->user->name }}</a>
            In: <a href="/posts?category={{ $post->category->slug }}">{{ $post->category->name }}</a>
            <br>
            {{ $post->created_at->diffForHumans() }}
        </small> --}}

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

