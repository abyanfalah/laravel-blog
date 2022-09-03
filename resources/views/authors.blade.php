@extends('layouts.main')

@section('content')
    <h2>List of authors</h2>
    <div class="row mb-5">
        @foreach ($authors as $author)
        <div class="col-3">
            <a href="/posts?author={{ $author->username }}">
                <div class="card my-3">
                    <img src="/assets/img/authors/{{ $author->id }}.jpg" alt="{{ $author->name }}" height="200px" class="card-img rounded">
                    <div class="card-img-overlay d-flex justify-content-center align-items-center" style="background: rgba(0, 0, 0, 0.61)">
                        <h3 class="text-white">{{ $author->name }}</h3>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
@endsection
