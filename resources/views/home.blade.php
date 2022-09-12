@extends('layouts.main')
@php
    function get_img_src($post){
        if($post->image){
            return asset('storage/' . $post->image);
        }else{
            return 'assets/img/posts/' . mt_rand(1, 15) . '.jpg';
        }
    }
@endphp

@section('content')
    @if ($posts->count() > 0)
        <div class="card">
            <img src="{{ get_img_src($posts[0]) }}" alt="{{ $posts[0]->title }}" class="card-img-top" height="300px">
            <div class="card-body">
                <h2>
                    <a href="/posts?author={{ $posts[0]->user->username }}">
                        {{ $posts[0]->title }}
                    </a>
                </h2>
                <small class="text-muted mb-3">
                    By: <a href="/posts?author={{ $posts[0]->user->username }}">{{ $posts[0]->user->name }}</a>
                    In: <a href="/posts?category={{ $posts[0]->category->slug }}">{{ $posts[0]->category->name }}</a>
                    <br>
                    {{ $posts[0]->created_at->diffForHumans() }}
                </small>
                <p>
                    {!! $posts[0]->excerpt !!}
                </p>
                <a class="btn btn-danger" href="/post/{{ $posts[0]->slug }}">
                    Read more
                </a>
            </div>
        </div>

        @foreach ($posts->skip(1) as $post )

        @endforeach
    @else
        @include('utility.zero-post')
    @endif
@endsection
