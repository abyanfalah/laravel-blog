  <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-danger position-fixed col-2 h-100">
    <a href="/" class="d-flex mx-auto align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
		<img src="/assets/img/theblog_logo.svg" alt="">
    </a>
    <hr>
	<ul class="nav nav-pills flex-column mb-auto">

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

  </div>



