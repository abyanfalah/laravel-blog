@extends('layouts.login')

@section('content')

<div class="row w-100 vh-100">
    <div class="col d-flex justify-content-center align-items-center mx-3 ">
        <img src="/assets/img/theblog_logo.svg" alt="The Blog" height="300px">
    </div>
    <div class="col bg-white d-flex flex-column align-items-center justify-content-center mx-3 text-danger shadow-lg">

        {{-- <div class="card bg-white shadow-lg text-danger">
            <div class="card-body " style=""> --}}
                <h1 class="mb-5">Let's log you in...</h1>

                <form action="/login" method="POST">
                    @csrf

                    <div class="form-group mb-3">
                        <input type="text" class="form-control rounded-0 rounded-top" placeholder="Username">
                        <input type="password" class="form-control mb-3 border-top-0 rounded-0 rounded-bottom" placeholder="Password">

                        <button class="btn btn-danger w-100">
                            Login
                        </button>
                    </div>

                    <div class="text-center d-block">
                        <small class="text-dark d-block">
                        <span class="text-muted">Have no account yet?</span>
                        <a href="#">Register here</a>
                    </small>

                    <small class="text-dark d-block">
                        <span class="text-muted">
                            Or maybe you
                        </span>
                        <a href="#">forgot your password</a>
                    </small>
                    </div>


                </form>
            {{-- </div>
        </div> --}}

    </div>
</div>
@endsection
