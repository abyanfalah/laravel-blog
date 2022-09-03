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
                <a href="/login" class="nav-item nav-link">
                    <i class="bi-box-arrow-in-right"></i>
                    Login
                </a>

                <a href="/testpage" class="nav-item nav-link">
                    <i class="bi-gear-wide"></i>
                    Testpage
                </a>
            </div>
        </div>
    </div>
</nav>
