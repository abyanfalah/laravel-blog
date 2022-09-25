@extends('layouts.dashboard')

@section('content')

<div class="col mx-auto">
    <div class="card mb-5">
        <div class="card-header  py-3">
            <div class="row">
                <div class="col">
                    <h3 >User list</h3>
                </div>
            </div>
        </div>

        <div class="card-body">
            <table class="table table-borderless table-striped mx-auto">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Username</th>
                        <th>Name</th>
                        <th>Posts</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody id="users">
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $post->where("user_id", $user->id)->count() }}</td>
                        {{-- <td>{{ $user }}</td> --}}
                        <td>
                            <div class="btn-group">
                                <a href="/dashboard/users/{{ $user->username }}" class="btn btn-primary btn-sm"><i class="bi-eye"></i></a>
                                <a href="/dashboard/users/{{ $user->username }}/edit" class="btn btn-warning btn-sm"><i class="bi-pencil"></i></a>
                                <button class="btn btn-danger btn-sm btnDeleteUser" data-post-slug="{{ $user->username }}"><i class="bi-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


{{-- NOTIFICATION MODAL AFTER SUCCESS OPERATION --}}
@if ($operation = session('users'))
    <script>
        $(document).ready(function(){
            let operation = "{{ $operation }}"
            $("#operationName").text(operation)
            $("#successModal").modal('show')
            setTimeout(() => {
                $("#successModal").modal('hide')
            }, 2000);
        })
    </script>
@endif


<script>
    $(document).ready(function(){
        // DELETION ============================================
        const deleteForm = $("#deleteItemModal form")
        let deleteUrl = $("#deleteItemModal form").attr('action')

        $(document).on("click", ".btnDeleteUser", function(){
            let slug = $(this).attr('data-post-slug')
            deleteForm.attr('action', deleteUrl + slug)
            $("#deleteItemModal").modal('show')
        });
    })
</script>


@endsection
