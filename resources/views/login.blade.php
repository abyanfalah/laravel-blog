@extends('layouts.login')

@section('content')

<div class="row w-100 vh-100">

    <div class="col d-flex justify-content-center align-items-center mx-3 ">
        <img src="/assets/img/theblog_logo.svg" alt="The Blog" height="300px">
    </div>

    <div class="col bg-white d-flex flex-column align-items-center justify-content-center mx-3 text-danger shadow-lg">

        <h2 id="loginTitle" class="mb-3 mx-5">
            @if (session('login_message'))
                {{ session('login_message') }}
            @else
                Let's log you in...
            @endif
        </h2>

        <form action="/login" method="POST">
            @csrf

            <div class="form-group mb-3">

                <input name="username" type="text"
                class="form-control rounded-0 rounded-top
                @error('username')
                    is-invalid
                @enderror
                " placeholder="Username" value="{{ @old('username') }}">
                @error('username')
                    <small class="text-danger d-block">
                        {{ $message }}
                    </small>
                @enderror

                <input name="password" type="password"
                class="form-control rounded-0 rounded-bottom
                @error('password')
                    is-invalid

                @enderror
                " placeholder="Password">
                @error('password')
                    <small class="text-danger d-block">
                        {{ $message }}
                    </small>
                @enderror


                <button class="btn btn-danger w-100 mt-3">
                    Login
                </button>
            </div>

            <div class="text-center d-block">
                <small class="text-dark d-block">
                <span class="text-muted">Have no account yet?</span>
                {{-- <a href="/registration" data-bs-toggle="modal" data-bs-target="#registrationModal">Register here</a> --}}
                <a href="/registration">Register here</a>
            </small>

            <small class="text-dark d-block">
                <span class="text-muted">
                    Or maybe you
                </span>
                <a href="#">forgot your password</a>
            </small>
            </div>


        </form>
    </div>
</div>

@if(session('login_message'))
<script>
    $("input").change(function(){
        loginTitle.textContent = "Aight, let's see this one.."
    })
</script>
@endif

{{-- @include('modals.registration') --}}
@endsection
