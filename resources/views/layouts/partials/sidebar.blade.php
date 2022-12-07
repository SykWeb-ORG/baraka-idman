<!-- Sidebar Start -->
<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
        <a href="#" class="navbar-brand mx-4 mb-3">
            <h4 class="text-primary"><img src={{asset("images/LOGO-DROGUES.png")}} alt="" class="logo_sidebar"></h4>
        </a>
        {{-- <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="{{asset('img/user.jpg')}}" alt="" style="width: 40px; height: 40px;">
                <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0">Jhon Doe</h6>
                <span>Admin</span>
            </div>
        </div> --}}
        <div class="navbar-nav w-100">
            {{-- <a href="index.html" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a> --}}
            @canany(['create', 'viewAny'], App\Models\User::class)
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown"><i class="fas fa-users me-2"></i>Utilisateurs</a>
                    <div class="dropdown-menu bg-transparent border-0">
                        @can('create', App\Models\User::class)
                            <a href="{{ route('new-user-form') }}" class="dropdown-item">Ajouter</a>
                        @endcan
                        @can('viewAny', App\Models\User::class)
                            <a href="{{ route('users.index') }}" class="dropdown-item">Afficher</a>
                        @endcan
                    </div>
                </div>
            @endcanany
            @canany(['create', 'viewAny'], App\Models\Beneficiaire::class)
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fas fa-user-shield me-2"></i>Bénéficiaires</a>
                    <div class="dropdown-menu bg-transparent border-0">
                        @can('create', App\Models\Beneficiaire::class)
                            <a href="{{ route('new-user-form') }}" class="dropdown-item">Ajouter</a>
                        @endcan
                        @can('viewAny', App\Models\Beneficiaire::class)
                            <a href="{{ route('beneficiaires.index') }}" class="dropdown-item">Afficher</a>
                        @endcan
                    </div>
                </div>
            @endcanany
            @can('roles-permissions-ability')
                <a href="{{ route('roles-permissions') }}" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Gérer les roles</a>
            @endcan
            <a href="{{ route('logout') }}" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Quitter</a>
        </div>
    </nav>
</div>
<!-- Sidebar End -->
