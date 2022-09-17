@extends('layouts.dashboard')

@php
    // if user has image
    if($user->image){
        $image_src = asset('storage/' . $user->image);
    }
    else{
        $image_src = "/assets/img/authors/default.png";
    }
@endphp


@section('content')
<div class="card mb-5">
    <div class="div">
        <img src="{{ $image_src }}" height="300px" alt="{{ $user->name }}" class="card-img-top rounded-top">
    </div>
    <div class="card-body p-5">
    <div class="row">
        <div class="col">
            <h2>{{ $user->name }}</h2>
        </div>
        <div class="col text-end">
            <div class="btn-group">
                    <a href="/dashboard/users" class="btn btn-primary"><i class="bi-arrow-left"></i> Back</a>
                    <a href="/dashboard/users/{{ $user->username }}/edit" class="btn btn-warning"><i class="bi-pencil"></i> Edit</a>
                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteItemModal"><i class="bi-trash"></i> Delete</button>
                </div>
        </div>
    </div>
        <p>
            {!! $user->body !!}
        </p>

        <p class="text-muted">
            <small>
                created at: {{ $user->created_at }}
            </small>
        </p>

        <a href="/dashboard/users" class="mt-3 btn btn-danger"><i class="bi-arrow-left"></i> Back to users</a>
    </div>
</div>

<script>
    $(document).ready(function(){
            const slug = "{{ $user->username }}"
            console.log(slug)

            // set form action url
            const form = $("#deleteItemModal form")
            const actionUrl = form.attr('action')
            form.attr('action', actionUrl + slug)
            console.log(form.attr('action'));
        })

    </script>
@endsection

