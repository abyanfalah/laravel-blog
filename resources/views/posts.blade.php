@extends('layouts.main')

@section('content')

@if ($posts->count() > 0)


	<div class="mb-3">
        <div class="row">
            <div class="col">
                <h2 class="d-inline">Blog Posts</h2>
            </div>

            {{-- search form --}}
            <div class="col">
                <form action="">
                    <div class="input-group">
                        <input type="search" class="form-control" placeholder="Search" name="search" value="{{ request('search') }}">
                        <button class="btn btn-danger">
                            <img src="/assets/symbols/magnifying-glass.svg" alt="">
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @if (request('search'))
        <h3>Searching: {{ request('search') }}</h3>
    @endif


    <div class="card mb-3">
        <img class="img-top rounded-top" height="350px" src="/assets/img/posts/{{ mt_rand(1,15) }}.jpg" alt="{{ $posts[0]->name }}">
        <div class="card-body">
            <a href="/post/{{ $posts[0]->slug }}">
                <h3 class="d-inline">
                    {{ $posts[0]->title }}
                </h3>
            </a>
            <br>
            <small class="text-muted mb-3">
                By: <a href="/posts?author={{ $posts[0]->user->username }}">{{ $posts[0]->user->name }}</a>
                In: <a href="/posts?category={{ $posts[0]->category->slug }}">{{ $posts[0]->category->name }}</a>
                <br>
                {{ $posts[0]->created_at->diffForHumans() }}
            </small>

            <p>
                {{ $posts[0]->excerpt }}
            </p>
            <a class="btn btn-danger" href="/post/{{ $posts[0]->slug }}">
            Read more</a>
        </div>
    </div>
    <div class="row mt-3">

        @foreach ($posts->skip(1) as $post)
        <div class="col-6">
            <div class="card mb-3">
                <img class="img-top rounded-top" height="200px" src="/assets/img/posts/{{ mt_rand(1,15) }}.jpg" alt="{{ $post->name }}">
                <div class="card-body">
                    <a href="/post/{{ $post->slug }}">
                       <h3 class="d-inline">
                         {{ $post->title }}
                       </h3>
                    </a>
                    <br>
                    <small class="text-muted mb-3">
                        By: <a href="/posts?author={{ $post->user->username }}">{{ $post->user->name }}</a>
                        In: <a href="/posts?category={{ $post->category->slug }}">{{ $post->category->name }}</a>
                        <br>
                        {{ $post->created_at->diffForHumans() }}
                    </small>

                    <p>
                        {{ $post->excerpt }}
                    </p>
                    <a class="btn btn-danger" href="/post/{{ $post->slug }}">
                    Read more...</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

@else
    <h3 class="text-muted">
        @if (request('s'))
            No post found.
        @else
            Nothing is here
        @endif
    </h3>
@endif

@endsection
