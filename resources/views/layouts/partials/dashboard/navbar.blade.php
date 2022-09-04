<nav class="navbar navbar-expand-lg navbar-dark bg-danger mb-3">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="/assets/img/logo_white.png" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">




            {{-- right navbar menu --}}
            <div class="navbar-nav ms-auto">
                @auth
                    <div class="dropdown">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ auth()->user->name }}
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </div>

                @else
                    <a href="/login" class="nav-item nav-link">
                        <i class="bi-box-arrow-in-right"></i>
                        Login
                    </a>

                @endauth



                <a href="/testpage" class="nav-item nav-link">
                    <i class="bi-gear-wide"></i>
                    Testpage
                </a>
            </div>
        </div>
    </div>
</nav>
