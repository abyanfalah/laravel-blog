@extends('layouts.dashboard')

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
        <img src="{{ $image_src }}" height="300px" alt="{{ $post->title }}" class="card-img-top rounded-top">
    </div>
    <div class="card-body p-5">
        <div class="row">
            <div class="col">
                <h2>{{ $post->title }}</h2>
            </div>
            <div class="col text-end">
                <div class="btn-group">
                        <a href="/dashboard/posts" class="btn btn-primary"><i class="bi-arrow-left"></i> Back</a>
                        <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning"><i class="bi-pencil"></i> Edit</a>
                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteItemModal"><i class="bi-trash"></i> Delete</button>
                    </div>
            </div>
        </div>

            <p>
                {!! $post->body !!}
            </p>

            <p class="text-muted">
                <small>
                    created at: {{ $post->created_at }}
                </small>
            </p>

            <a href="/dashboard/posts" class="mt-3 btn btn-danger"><i class="bi-arrow-left"></i> Back to posts</a>
        </div>
    </div>

<script>
    $(document).ready(function(){
            const slug = "{{ $post->slug }}"
            console.log(slug)

            // set form action url
            const form = $("#deleteItemModal form")
            const actionUrl = form.attr('action')
            form.attr('action', actionUrl + slug)
            console.log(form.attr('action'));
        })

    </script>
@endsection

