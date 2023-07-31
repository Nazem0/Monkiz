<nav class="navbar navbar-dark sticky-top z-1 bg-secondary bg-gradient navbar-expand-lg justify-content-end shadow">
    <div class="container-fluid mx-3 align-items-center">
        <a class="navbar-brand text-white scale" href="/">
            <img id="logo" src="{{ asset('assets/img/logo.svg') }}" alt="مُنقذ"><span class="arabic fs-4">مُنقذ</span>
        </a>
        <button class="navbar-toggler collapsed scale" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse flex-grow-0" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-auto">
                @if (auth()->user() && auth()->user()->role == 'Admin')
                    <a class='nav-item nav-link text-white scale' href='{{route('admin')}}'>Admin Dashboard</a>
                @endif
                <!-- <a class="nav-item nav-link text-white scale active" href="/urgent/">Urgent Repair</a> -->
                <a class="nav-item nav-link text-white scale" href="{{ route('mcs') }}">Maintenance Centers</a>
                <a class="nav-item nav-link text-white scale" href="/about_us/">About Us</a>
                <a class="nav-item nav-link text-white scale" href="/contact_us/">Contact Us</a>

                @if (auth()->check())
                    <a class='nav-item nav-link text-white scale' href='/profile'>{{ auth()->user()->name }}</a>
                    <a class='nav-item nav-link text-white scale' href='/logout'>Logout</a>
                @else
                    <a class='nav-item nav-link text-white scale' href='/login'>Login</a>
                    <a class='nav-item nav-link text-white scale' href='/register/'>Register</a>
                @endif
            </div>
        </div>
    </div>
</nav>
