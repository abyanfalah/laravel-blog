@extends('layouts.dashboard')
@php
    if($post->image){
        $img_src = asset('storage/' . $post->image);
    }else{
        $img_src = '/assets/img/posts/' . mt_rand(1, 15) . '.jpg';
    }
@endphp

@section('content')
    <div class="row mt-3 py-3 col-md-8 pe-0">
        <div class="col">
            <h3 class="">Edit post</h3>
        </div>
        <div class="col text-end">
            <a class="btn btn-primary" href="/dashboard/posts">
                <i class="bi-arrow-left"></i>
                 Back
            </a>
        </div>
    </div>

    <form action="/dashboard/posts/{{ $post->slug }}" method="POST" class="col-md-8" enctype="multipart/form-data">
        @csrf
        @method('patch')

        {{-- title --}}
        <div class="form-group mb-3">
            <label>Title</label>
            <input autofocus name="title" type="text" class="form-control
                @error('title')
                    is-invalid
                @enderror"
            value="{{ $post->title }}" placeholder="">
            <small class="text-danger">
                @error('title')
                    {{ $message }}
                @enderror
            </small>
        </div>

        {{-- slug --}}
        <div class="form-group mb-3">
            <label>Slug</label>
            {{-- <small class="text-muted">(auto-generated)</small> --}}
            <input name="slug" type="text" class="form-control
                @error('slug')
                    is-invalid
                @enderror"
            value="{{ $post->slug }}">
            <small class="text-danger">
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
                    {{ $category->slug == $post->category->slug ? "selected" : '' }}
                        >{{ Str::ucfirst($category->name )}}</option>
                @endforeach
            </select>
        </div>

        {{-- image --}}
        <div class="form-group mb3">
            <label>Image</label>
            <input type="file" name="image" accept="image/jpeg, image/jpg, image/png" value="{{ $post->image }}"
            class="form-control
            @error('image')
                is-invalid
            @enderror
            ">
            {{-- image preview --}}
            <img id="imagePreview" src="{{ $img_src }}" class="img-fluid mt-3" style="max-height: 650px">

            <small class="text-danger invalid-feedback">
                @error('image')
                    {{ $message }}
                @enderror
            </small>
        </div>

        {{-- old image --}}
        @if ($post->image)
         <input type="hidden" value="{{ $post->image }}" name="old_image">
        @endif


        {{-- body --}}
        <div class="form-group mb-3">
            <label>Body</label>
            <input type="hidden" id="inputBody" name="body" value="{{ $post->body }}">
            <trix-editor input="inputBody" class="bg-white @error('body')
                border-danger
            @enderror"></trix-editor>
            <small class="text-danger">
                @error('body')
                    {{ $message }}
                @enderror
            </small>
        </div>

        <button class="btn btn-primary">
           <i class="bi-save2"></i> Save changes
        </button>

    </form>


    <script>
        // auto slug when typing title
        $("input[name=title]").change(function(){
            let title = $(this).val()
            let inputSlug = $("input[name=slug]")
            fetch('/utility/slugify?source=' + title )
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
    </script>
@endsection
