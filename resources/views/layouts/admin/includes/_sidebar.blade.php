<div class="logo-area">

    <div class="logo">
        CRM
    </div>
    <button class="sidebar-toggler btn btn-lg">
        <i class="fa fa-bars"></i>
    </button>
</div>

<ul class="navigation">
    <li>
        <a class="@if(request()->routeIs('admin.dashboard.index')) active @endif" href="{{ route('admin.dashboard.index') }}">
            <i class="fa fa-gauge-high"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <li>
        <a class="@if(request()->routeIs('admin.units.*')) active @endif" href="{{ route('admin.units.index') }}">
            <i class="fa fa-box"></i>
            <span>Units Management</span>
        </a>
    </li>
    <li>
        <a class="@if(request()->routeIs('admin.owners.*')) active @endif" href="{{ route('admin.owners.index') }}">
            <i class="fa fa-users"></i>
            <span>Owners</span>
        </a>
    </li>

    <li>
        <a class="@if(request()->routeIs('admin.tenants.*')) active @endif" href="{{ route('admin.tenants.index') }}">
            <i class="fa fa-users"></i>
            <span>Tenants</span>
        </a>
    </li>

    <li>
        <a class="@if(request()->routeIs('admin.financial-tracking.index')) active @endif" href="{{ route('admin.financial-tracking.index') }}">
            <i class="fa fa-file"></i>
            <span>Financial Tracking</span>
        </a>
    </li>
    <li>
        <a href="">
            <i class="fa fa-file-circle-check"></i>
            <span>Tasks</span>
        </a>
    </li>
    <li>
        <a href="">
            <i class="fa fa-calendar"></i>
            <span>Key Dates</span>
        </a>
    </li>
    <li>
        <a href="">
            <i class="fa fa-user"></i>
            <span>Address Book</span>
        </a>
    </li>
    <li>
        <a href="">
            <i class="fa fa-user-group"></i>
            <span>Admin</span>
        </a>
    </li>
    <li>
        <a href="">
            <i class="fa fa-cog"></i>
            <span>Settings</span>
        </a>
    </li>
</ul>