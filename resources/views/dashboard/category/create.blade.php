@extends('layouts.dashboard')

@section('content')
    <div class="row mt-3 py-3 col-md-8 pe-0">
        <div class="col">
            <h3 class="">New Category</h3>
        </div>
        <div class="col text-end pe-0">
            <a class="btn btn-primary" href="/dashboard/categories">
                <i class="bi-arrow-left"></i>
                 Back
            </a>
        </div>
    </div>

    <form action="/dashboard/categories" method="POST" enctype="multipart/form-data" class="col-md-8">
        @csrf

        {{-- name --}}
        <div class="form-group mb-3">
            <label>Name</label>
            <input autofocus name="name" type="text"
            class="form-control
            @error('name')
                is-invalid
            @enderror"
            value="{{ old('name') }}" placeholder="">
            <small class="text-danger invalid-feedback">
                @error('name')
                    {{ $message }}
                @enderror
            </small>
        </div>

        {{-- slug --}}
        <div class="form-group mb-3">
            <label>Slug</label>
            <input name="slug" type="text"
            class="form-control
            @error('slug')
                is-invalid
            @enderror"
            value="{{ old('slug') }}">
            <small class="text-danger invalid-feedback">
                @error('slug')
                    {{ $message }}
                @enderror
            </small>
        </div>

        {{-- image --}}
        <div class="form-group mb3">
            <label>Image</label>
            <input type="file" name="image" accept="image/jpeg, image/jpg, image/png"
            class="form-control
            @error('image')
                is-invalid
            @enderror
            ">
            {{-- image preview --}}
            <img id="imagePreview" class="img-fluid mt-3" style="max-height: 650px">

            <small class="text-danger invalid-feedback">
                @error('image')
                    {{ $message }}
                @enderror
            </small>
        </div>

        <button class="btn btn-primary">
           &plus; Create category
        </button>

    </form>

    <script>
        $(document).ready(function(){

            // auto slug
            const inputSlug = $("input[name=slug]")
            $("input[name=name]").change(function(){
               let name = $("input[name=name]").val()
                fetch('/utility/slugify?source=' + name)
                .then(response => response.json())
                .then(data => inputSlug.val(data.slug))
            })

            // preview image after choosing
            $("input[name=image]").change(function(){
                const reader = new FileReader()
                const file = this.files[0]
                console.log("file: ", file)
                // return
                reader.readAsDataURL(file)
                console.log("reader now: ", reader);
                reader.onload = function(event){
                    let result = event.target.result
                    imagePreview.src = result
                }
            })
        })

    </script>
@endsection
