<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

<!-- Sidebar Toggle (Topbar) -->
<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
    <i class="fa fa-bars"></i>
</button>

<!-- Topbar Navbar -->
<ul class="navbar-nav ml-auto">

    <!-- Nav Item - User Information -->
    <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline text-gray-600 small">Halo, {{ auth()->user()->username ?? 'User'}} </span>
           <img class="img-profile rounded-circle" src="{{asset ('img/undraw_profile.svg') }}">
           {{-- &nbsp; <i class="far fa-caret-square-down"></i> --}}
        </a>
        <!-- Dropdown - User Information -->
        {{-- <div class="dropdown-menu dropdown-menu-right">
            <a href="/login" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
            </a>
            <div class="dropdown-divider"></div>
            @auth

            <form action="/logout" method="POST">
                @csrf
                <button type="submit" class="dropdown-item">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </form>
            @else
                <a href="/login" class="dropdown-item has-icon">
                    <i class="fas fa-sign-in-alt"></i> Login
                </a>
            @endauth
        </div>
    </li> --}}

</ul>

</nav>
