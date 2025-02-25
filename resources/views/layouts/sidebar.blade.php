<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{\Illuminate\Support\Facades\URL::to('/')}}">
        {{--<div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>--}}
        <div class="sidebar-brand-text mx-3">{{config('app.name')}}<sup>v{{env('APP_VERSION')}}</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    @include('layouts.menu')

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
