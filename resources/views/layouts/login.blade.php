@include('layouts.partials.main.header')

<div class="container-fluid bg-danger text-white vh-100 d-flex justify-content-center align-items-center">
    {{-- content here --}}
    @yield('content')
</div>

@include('layouts.partials.main.footer')
