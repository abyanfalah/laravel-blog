@extends('layouts.dashboard')

@section('content')

<div class="col mx-auto">
    <div class="card mb-5">
        <div class="card-header  py-3">
            <div class="row">
                <div class="col">
                    <h3 >My posts</h3>
                </div>
                <div class="col text-end">
                    <a href="/dashboard/posts/create" class="btn btn-success">
                        &plus; Create new post
                    </a>
                </div>
            </div>

        </div>
        <div class="card-body">
            <table class="table table-borderless table-striped mx-auto">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Created at</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody id="tablePosts">
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $post->title }}</td>
                        <td>
                            <span class="badge text-dark">
                                {{ $post->category->name }}
                            </span>
                        </td>
                        <td>
                            <small>
                                {{ $post->created_at->diffForHumans() }}
                            </small>
                        </td>
                        <td>
                            <div class="btn-group">
                                <a href="/dashboard/posts/{{ $post->slug }}" class="btn btn-primary btn-sm"><i class="bi-eye"></i></a>
                                <a href="#" class="btn btn-warning btn-sm"><i class="bi-pencil"></i></a>
                                <button class="btn btn-danger btn-sm"><i class="bi-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
            @if (session('dashboard_message'))
                let modalCreated = $("#postCreatedModal")
                modalCreated.modal('show')
                setTimeout(() => {
                    modalCreated.modal('hide')
                }, 1500);
            @endif

        })
    </script>


@endsection
