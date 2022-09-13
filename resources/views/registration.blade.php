@extends('layouts.registration')

@section('content')

<div class="row w-100 vh-100">

	 <div class="col d-flex justify-content-center align-items-center mx-3 ">
		  <img src="/assets/img/theblog_logo_red.svg" alt="The Blog" height="300px">
	 </div>

	 <div class="col bg-danger d-flex flex-column align-items-center justify-content-center mx-3 text-white shadow-lg">

		  <h2 id="registerTitle" class="mb-3 mx-5">
				@if (session('register_message'))
					 {{ session('register_message') }}
				@else
					 Well, hello there new pal...
				@endif
		  </h2>

		  <form action="/registration" method="POST">
            @csrf

            {{-- name --}}
            <div class="form-group mb-3">
                <label>Name</label>
                <input type="text" name="name" autofocus value="{{ @old('name') }}"
                class="form-control @error('name')
                        is-invalid
                @enderror"
                >
                @error('name')
                        <small class="bg-white text-danger px-2 py-1 rounded">
                            {{ $message }}
                        </small>
                @enderror
            </div>

            {{-- username --}}
            <div class="form-group mb-3">
                <label>Username</label>
                <input type="text" name="username" autofocus value="{{ @old('username') }}"
                class="form-control @error('username')
                        is-invalid
                @enderror"
                >
                @error('username')
                        <small class="bg-white text-danger px-2 py-1 rounded">
                            {{ $message }}
                        </small>
                @enderror
            </div>

            {{-- email --}}
            <div class="form-group mb-3">
                <label>Email</label>
                <input type="text" name="email" autofocus value="{{ @old('email') }}"
                class="form-control @error('email')
                        is-invalid
                @enderror"
                >
                @error('email')
                        <small class="bg-white text-danger px-2 py-1 rounded">
                            {{ $message }}
                        </small>
                @enderror
            </div>

            {{-- password --}}
            <div class="form-group mb-3">
                <label>Password</label>
                <input type="password" name="password" autofocus class="form-control @error('password')
                        is-invalid
                @enderror"
                >
                @error('password')
                        <small class="bg-white text-danger px-2 py-1 rounded">
                            {{ $message }}
                        </small>
                @enderror
            </div>

            <div class="d-block mb-3">
            <input class="btn btn-light text-danger" type="submit" value="Register">
            </div>

            <span style="color: rgba(255, 255, 255, 0.445)">Already have an account? </span><a href="/login" class="text-white">Login here!</a>
        </form>
	 </div>
</div>

@endsection
