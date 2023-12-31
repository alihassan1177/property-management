<div class="logo-area">

    <div class="logo">
        Tenant
    </div>
    <button class="sidebar-toggler btn btn-lg">
        <i class="fa fa-bars"></i>
    </button>
</div>

<ul class="navigation">
    <li>
        <a class="@if(request()->routeIs('tenant.dashboard.index')) active @endif" href="{{ route('tenant.dashboard.index') }}">
            <i class="fa fa-gauge-high"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <li>
        <a class="@if(request()->routeIs('tenant.contracts.*')) active @endif" href="{{ route('tenant.contracts.index') }}">
            <i class="fa fa-file"></i>
            <span>Contracts</span>
        </a>
    </li>

    <li>
        <a class="@if(request()->routeIs('tenant.tasks.*')) active @endif" href="{{ route('tenant.tasks.index') }}">
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

</ul>