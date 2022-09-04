@extends('layouts.dashboard')

@section('content')
 <h3>My posts</h3>

<div class="col-md-10 mx-auto">
    <table class="table table-striped mx-auto">
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
                        {{-- view button --}}
                        <a href="/dashboard/posts/{{ $post->slug }}" class="btn btn-primary btn-sm"><i class="bi-eye"></i></a>

                        {{-- edit button --}}
                        <a href="/dashboard/posts/{{ $post->slug }}" class="btn btn-warning btn-sm"><i class="bi-pencil"></i></a>

                        {{-- delete button --}}
                        <form action="/dashboard/posts/" method="DELETE">
                            @csrf
                            <button class="btn btn-outline-danger btn-sm"><i class="bi-trash"></i></button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
