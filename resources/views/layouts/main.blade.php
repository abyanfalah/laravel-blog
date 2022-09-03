@include('layouts.partials.main.header')
@include('layouts.partials.main.navbar')

<div class="container">
    <div class="row">
        <div class="col">
            {{-- content here --}}
            @yield('content')
        </div>
    </div>
</div>

@include('layouts.partials.main.footer')
