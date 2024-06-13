<!-- Nav Item - Dashboard -->
{{--Request::is('admin/home*')--}}
<li class="nav-item {{ Nav::isRoute('admin.home*') }}">
    <a class="nav-link" href="{{ route('admin.home') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Heading -->
<div class="sidebar-heading">
    Master Data
</div>



<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
@role(\App\Models\Role::SUPER_ADMIN)
<div class="sidebar-heading">
    Super Admin
</div>
@endrole
@role('Admin')
<div class="sidebar-heading">
    Admin
</div>
@endrole

<!-- Nav Item - Permissions -->
@can('permissions.read')
    <li class="nav-item {{ Nav::isRoute('admin.permissions.*') }}">
        <a class="nav-link" href="{{ route('admin.permissions.index') }}">
            <i class="fas fa-fw fa-unlock"></i>
            <span>Permissions</span>
        </a>
    </li>
@endcan

<!-- Nav Item - Users -->
@can('users.read')
    <li class="nav-item {{ Nav::isRoute('admin.users.*') }}">
        <a class="nav-link" href="{{ route('admin.users.index') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Users</span>
        </a>
    </li>
@endcan

<!-- Nav Item - Roles -->
@can('roles.read')
    <li class="nav-item {{ Nav::isRoute('admin.roles.*') }}">
        <a class="nav-link" href="{{ route('admin.roles.index') }}">
            <i class="fas fa-fw fa-briefcase"></i>
            <span>Roles</span>
        </a>
    </li>
@endcan

@can('configs.read')
    <li class="nav-item {{ Nav::isRoute('admin/configs.*') }}">
        <a class="nav-link" href="{{ route('admin.configs.index') }}">
            <i class="fas fa-fw fa-cog"></i>
            <span>Configs</span>
        </a>
    </li>
@endcan

<!-- Nav Item - Log -->
@role(\App\Models\Role::SUPER_ADMIN)
<li class="nav-item {{ Nav::isRoute('logs.*') }}">
    <a class="nav-link" href="{{ route('log-viewer::dashboard') }}">
        <i class="fas fa-fw fa-list"></i>
        <span>Logs</span>
    </a>
</li>
@endrole

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Heading -->
<div class="sidebar-heading">
    Personal
</div>

<!-- Nav Item - Profile -->
<li class="nav-item {{ Nav::isRoute('admin.profile*') }}">
    <a class="nav-link" href="{{ route('admin.profile') }}">
        <i class="fas fa-fw fa-user"></i>
        <span>Profile</span>
    </a>
</li>

