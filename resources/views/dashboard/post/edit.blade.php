@extends('layouts.dashboard')

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

    <form action="/dashboard/posts/{{ $post->slug }}" method="POST" class="col-md-8">
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

        {{-- body --}}
        <div class="form-group mb-3">
            <label>Body</label>
            <input type="hidden" id="inputBody" name="body" value="{{ $post->body }}">
            <trix-editor input="inputBody"></trix-editor>
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


    {{-- auto slug when typing title --}}
    <script>
        $("input[name=title]").keyup(function(){
            let slug = slugify($(this).val())
            $("input[name=slug]").val(slug)
        })
    </script>
@endsection
