<nav id="sidebarMenu" class="sidebar d-lg-block bg-gray-800 text-white collapse" data-simplebar>
    <div class="sidebar-inner px-2 pt-3">
        @include('layouts.responsive-topbar')
        {{-- @include('layouts.navigation') --}}

        @if (auth()->user()->is_admin)
            @include('layouts.admin.navigation')
        @else
            @include('layouts.nazir.navigation')
        @endif
    </div>
</nav>
