<nav class="navbar navbar-expand-lg navbar-dark bg-danger mb-3">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="/assets/img/logo_white.png" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">

            {{-- navbar menu --}}
            <div class="navbar-nav">
                <a href="/posts" class="nav-item nav-link {{ request()->is('post*') ? 'active' : '' }}">Posts</a>
            </div>

            <div class="navbar-nav">
                <a href="/categories" class="nav-item nav-link {{ request()->is('categories') ? 'active' : '' }}">Categories</a>
            </div>

            <div class="navbar-nav">
                <a href="/authors" class="nav-item nav-link {{ request()->is('authors') ? 'active' : '' }}">Authors</a>
            </div>


            {{-- right navbar menu --}}
            <div class="navbar-nav ms-auto">
                 @auth
                    <div class="dropdown">
                        <a class="nav-item nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ auth()->user()->name }}
                        </a>

                        <ul class="dropdown-menu">
                            {{-- dashboard --}}
                            <li>
                                <a class="dropdown-item" href="/dashboard">
                                    <i class="bi-window"></i>
                                    Dashboard
                                </a>
                            </li>

                            {{-- profile --}}
                            <li>
                                <a href="/profile" class="dropdown-item">
                                    <i class="bi-person-fill"></i>
                                    Profile
                                </a>
                            </li>

                            <li><hr class="dropdown-divider"></li>

                            {{-- logout --}}
                            <li>
                                <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#logoutModal">
                                    <i class="bi-box-arrow-right"></i>
                                    Logout
                                </button>

                            </li>
                        </ul>
                    </div>

                @else
                    <a href="/login" class="nav-item nav-link">
                        <i class="bi-box-arrow-in-right"></i>
                        Login
                    </a>

                @endauth

            </div>
        </div>
    </div>
    <a href="/testpage" class="text-light me-3">
        <i class="bi-gear-wide"></i>
        Testpage
    </a>
</nav>
