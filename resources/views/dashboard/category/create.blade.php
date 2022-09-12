@extends('layouts.dashboard')

@section('content')
    <div class="row mt-3 py-3 col-md-8 pe-0">
        <div class="col">
            <h3 class="">New post</h3>
        </div>
        <div class="col text-end pe-0">
            <a class="btn btn-primary" href="/dashboard/posts">
                <i class="bi-arrow-left"></i>
                 Back
            </a>
        </div>
    </div>

    <form action="/dashboard/posts" method="POST" enctype="multipart/form-data" class="col-md-8">
        @csrf

        {{-- title --}}
        <div class="form-group mb-3">
            <label>Title</label>
            <input autofocus name="title" type="text"
            class="form-control
            @error('title')
                is-invalid
            @enderror"
            value="{{ old('title') }}" placeholder="">
            <small class="text-danger invalid-feedback">
                @error('title')
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

        {{-- category --}}
        <div class="form-group mb-3 col-5 ps-0">
            <label>Category</label>
            <select name="category_id" class="form-select">
                @foreach ($categories as $category)
                    <option
                    value="{{ $category->id }}"
                    {{ $category->slug == "personal" ? "selected" : '' }}
                        >{{ Str::ucfirst($category->name )}}</option>
                @endforeach
            </select>
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

        {{-- body --}}
        <div class="form-group mb-3">
            <label>Body</label>
            <input type="hidden" class="form-control" id="inputBody" name="body" value="{{ old('body') }}">
            <trix-editor input="inputBody"
            class="bg-white @error('body')
                border-danger
            @enderror">
            </trix-editor>
            <small class="text-danger">
            @error('body')
                {{ $message }}
            @enderror
            </small>
        </div>

        <button class="btn btn-primary">
           &plus; Create post
        </button>

    </form>

    <script>
        $(document).ready(function(){

            // auto slug
            const inputSlug = $("input[name=slug]")
            $("input[name=title]").change(function(){
               let title = $("input[name=title]").val()
                fetch('/utility/slugify?title=' + title)
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
