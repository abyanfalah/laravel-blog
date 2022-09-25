@extends('layouts.dashboard')

@section('content')

<div class="col-lg-8">
    <div class="card mb-5">
        <div class="card-header  py-3">
            <div class="row">
                <div class="col">
                    <h3 >Category list</h3>
                </div>
                <div class="col text-end">
                    <a href="/dashboard/categories/create" class="btn btn-success">
                        &plus; Add new category
                    </a>
                </div>
            </div>

        </div>
        <div class="card-body">
            <table class="table table-borderless table-striped mx-auto table-sm">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th class="col-2">Action</th>
                    </tr>
                </thead>

                <tbody id="tableCategories">
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="/dashboard/categories/{{ $category->slug }}/edit" class="btn btn-warning btn-sm"><i class="bi-pencil"></i></a>
                                <button class="btn btn-danger btn-sm btnDeleteCategory" data-post-slug="{{ $category->slug }}"><i class="bi-trash"></i></button>
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
@if ($operation = session('category'))
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
        let deleteUrl = "/dashboard/categories/"

        $(document).on("click", ".btnDeleteCategory", function(){
            let slug = $(this).attr('data-post-slug')
            deleteForm.attr('action', deleteUrl + slug)
            $("#deleteItemModal").modal('show')
        });
    })
</script>


@endsection
