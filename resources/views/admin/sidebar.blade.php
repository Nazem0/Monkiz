<aside class="col-2 min-vh-100 bg-secondary bg-gradient">
    <!-- Sidebar content -->
    <ul class="nav nav-pills flex-column mb-auto py-5">
        <li class="nav-item scale">
            <a href="{{route('admin')}}" class="d-flex gap-3 align-items-center nav-link text-white">
                <span class="material-symbols-rounded">
                    dashboard
                </span>
                <span class="d-none d-lg-block">Home</span>
            </a>
        </li>
        <hr>
        <li class="nav-item scale">
            <a href="{{route('admin.users')}}" class="d-flex gap-3 align-items-center nav-link text-white">
                <span class="material-symbols-rounded">
                    groups
                </span>
                <span class="d-none d-lg-block">Users</span>
            </a>
        </li>
        <hr>
        <li class="nav-item scale">
            <a href="{{route('admin.tasks')}}" class="d-flex gap-3 align-items-center nav-link text-white">
                <span class="material-symbols-rounded">
                    task
                </span>
                <span class="d-none d-lg-block">Tasks</span>
            </a>
        </li>
        <hr>
        <li class="nav-item scale">
            <a href="{{route('admin.offers')}}" class="d-flex gap-3 align-items-center nav-link text-white">
                <span class="material-symbols-rounded">
                    comment
                </span>
                <span class="d-none d-lg-block">Offers</span>
            </a>
        </li>
        <hr>
        <li class="nav-item scale">
            <a href="{{route('admin.services')}}" class="d-flex gap-3 align-items-center nav-link text-white">
                <span class="material-symbols-rounded">
                    handyman
                </span>
                <span class="d-none d-lg-block">Services</span>
            </a>
        </li>
    </ul>
</aside>
