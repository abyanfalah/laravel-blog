@extends('layouts.dashboard')

@php
    // if user has image
    if($user->image){
        $image_src = asset('storage/' . $user->image);
    }
    else{
        $image_src = "assets/img/authors/" . $user->id . ".jpg";
        if(File::exists($image_src)){
            $image_src = asset($image_src);
        }else{
            $image_src = asset("/assets/img/authors/default.svg");
        }
    }
@endphp


@section('content')
<div class="card-mb-5">
    <div class="card-header">
        <h3>User information</h3>
    </div>
    <div class="card-body bg-white">
        <div class="row">
            <div class="col-md-4">
                <img src="{{ $image_src }}" alt="{{ $user->username }}" style="width: 300px" class="rounded-circle">
            </div>
            <div class="col d-flex justify-content-center align-items-center">
                <table class="table">
                    <tr>
                        <td class="fw-bold col-3">Username</td>
                        <td class="">{{ $user->username }}</td>
                    </tr>

                    <tr>
                        <td class="fw-bold col-3">Name</td>
                        <td class="">{{ $user->name }}</td>
                    </tr>

                    <tr>
                        <td class="fw-bold col-3">Email</td>
                        <td class="">{{ $user->email }}</td>
                    </tr>

                    <tr>
                        <td class="fw-bold col-3">Registered</td>
                        <td class="">{{ $user->created_at }}</td>
                    </tr>

                    <tr>
                        <td class="fw-bold col-3">Posts count</td>
                        <td class="">
                            {{ $post_count }}
                            <a href="/dashboard/users/{{ $user->username }}/posts" class="btn btn-primary ms-5">See posts</a>
                        </td>
                    </tr>

                    <tr>
                        <td class="fw-bold col-3">User type</td>
                        <td class="">{{ $user_type }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
            const username = "{{ $user->username }}"
            console.log(username)

            // set form action url
            const form = $("#deleteItemModal form")
            const actionUrl = form.attr('action')
            form.attr('action', actionUrl + username)
            console.log(form.attr('action'));
        })

    </script>
@endsection

