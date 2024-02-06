<div class="logo-area">

    <div class="logo">
        User
    </div>
    <button class="sidebar-toggler btn btn-lg">
        <i class="fa fa-bars"></i>
    </button>
</div>

<ul class="navigation">
    <li>
        <a class="@if(request()->routeIs('address_book.dashboard.index')) active @endif" href="{{ route('address_book.dashboard.index') }}">
            <i class="fa fa-gauge-high"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <li>
        <a class="@if(request()->routeIs('address_book.contracts.*')) active @endif" href="{{ route('address_book.contracts.index') }}">
            <i class="fa fa-file"></i>
            <span>Contracts</span>
        </a>
    </li>

    <li>
        <a class="@if(request()->routeIs('address_book.tasks.*')) active @endif" href="{{ route('address_book.tasks.index') }}">
            <i class="fa fa-file-circle-check"></i>
            <span>Tasks</span>
        </a>
    </li>
    <li>
        <a class="@if(request()->routeIs('address_book.key-dates.*')) active @endif" href="{{ route('address_book.key-dates.index') }}">
            <i class="fa fa-calendar"></i>
            <span>Key Dates</span>
        </a>
    </li>

</ul>