<div class="mt-2 mb-4">
    <div class="avatar dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="{{ asset('assets/img/avatar.png') }}" alt="Avatar">
        </button>
        <ul class="dropdown-menu">

            <li>
                <form class="dropdown-item" action="{{ route('admin.logout') }}" method="post">
                    @csrf
                    <button class="btn btn-sm btn-danger" type="submit">Logout</button>
                </form>
            </li>

        </ul>
    </div>
</div>

