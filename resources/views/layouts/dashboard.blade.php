@include('layouts.partials.dashboard.header')

<div class="container-fluid">
    <div class="row">
        <div class="col-2 bg-dark px-0 me-0 vh-100"">
            @include('layouts.partials.dashboard.sidebar')
        </div>
        <div class="col bg-light">
            {{-- @include('layouts.partials.dashboard.navbar') --}}
            {{-- content here --}}
            <div class="px-3 pb-5 mt-3">
                @yield('content')
            </div>
        </div>
    </div>
</div>

@include('modals.success-modal')
@include('modals.delete')
@include('layouts.partials.main.footer')
