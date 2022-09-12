  <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-danger position-fixed col-2 h-100">
    <a href="/" class="d-flex mx-auto align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
		<img src="/assets/img/theblog_logo.svg" alt="">
    </a>
    <hr>

    {{-- menu --}}
    <small class=" badge text-start">
        Menu
    </small>
	<ul class="nav nav-pills flex-column">
		<li class="nav-item ">
			<a href="/dashboard" class="nav-link
            {{ request()->is('dashboard') ? 'text-danger bg-white shadow-sm' : 'text-white' }}">
                <i class="bi-window"></i>
                Dashboard
            </a>
		</li>

        <li class="nav-item ">
			<a href="/dashboard/posts" class="nav-link
            {{ request()->is('dashboard/post*') ? 'text-danger bg-white shadow-sm' : 'text-white' }}">
                <i class="bi-file-text"></i>
                My posts
            </a>
		</li>
	</ul>
    <hr>

    {{-- administration --}}
    <small class="badge text-start">Administration</small>
    <ul class="nav nav-pills flex-column">
		<li class="nav-item ">
			<a href="/dashboard/categories" class="nav-link
            {{ request()->is('dashboard/categories*') ? 'text-danger bg-white shadow-sm' : 'text-white' }}">
                <i class="bi-bookmarks"></i>
                Categories
            </a>
		</li>
	</ul>

    <div class="dropdown mt-auto">
      <a href="#" class="d-flex align-items-center link-light text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="/assets/img/authors/{{ auth()->user()->id }}.jpg" alt="{{ auth()->user()->name }}" width="32" height="32" class="rounded-circle me-2">
        <strong class="text-white">{{ auth()->user()->name }}</strong>
      </a>
      <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
        <li><a class="dropdown-item" href="/dashboard/posts/create">New post</a></li>
        <li><a class="dropdown-item" href="#">Settings</a></li>
        <li><a class="dropdown-item" href="#">Profile</a></li>
        <li><hr class="dropdown-divider"></li>
        <li>
            <form action="/logout" method="POST">
                @csrf
                <button class="dropdown-item">Logout</button>
            </form>
        </li>
      </ul>
    </div>

  </div>



