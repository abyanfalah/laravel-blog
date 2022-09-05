@extends('layouts.dashboard')

@section('content')

<div class="col mx-auto">
    <div class="card">
        <div class="card-header  py-3">
            <div class="row">
                <div class="col">
                    <h3 >My posts</h3>
                </div>
                <div class="col text-end">
                    <button class="btn btn-success">
                        &plus; Create new post
                    </button>
                </div>
            </div>

        </div>
        <div class="card-body">
            <table class="table table-borderless table-striped table-hover mx-auto">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Category</th>
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
@endsection