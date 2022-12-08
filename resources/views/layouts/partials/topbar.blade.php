<!-- Navbar Start -->
<nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
    <a href="#" class="sidebar-toggler flex-shrink-0">
        <i class="fa fa-bars"></i>
    </a>
    
    <div class="navbar-nav align-items-center ms-auto">

        
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <img class="rounded-circle me-lg-2" src="{{ asset('img/user.jpg') }}" alt="" style="width: 40px; height: 40px;">
                <span class="d-none d-lg-inline-flex">{{Auth::user()->first_name . ' ' . Auth::user()->last_name}}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                <a href="{{ route('users.edit', ['user'=>Auth::id(), 'page'=>'Mon profile']) }}" class="dropdown-item">Mon profile</a>
                {{-- <a href="#" class="dropdown-item">Settings</a> --}}
                <a href="{{ route('logout') }}" class="dropdown-item">Quitter</a>
            </div>
        </div>
    </div>
</nav>
<!-- Navbar End -->