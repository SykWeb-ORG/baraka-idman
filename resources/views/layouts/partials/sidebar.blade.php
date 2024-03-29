<!-- Sidebar Start -->
<div class="sidebar pe-4 pb-3 open">
    <a href="#" class="sidebar-toggler flex-shrink-0">
        <i class="fa fa-bars"></i>
    </a>
    <nav class="navbar bg-light navbar-light">
        <a href="#" class="navbar-brand mx-4 mb-3">
            <h4 class="text-primary"><img src={{asset("images/baraka-idman.png")}} alt="" class="logo_sidebar"></h4>
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
            @if (Auth::user()->admin)
                <a href="{{ route('dashboard') }}" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
            @endif
            @canany(['create', 'viewAny'], App\Models\User::class)
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fas fa-user me-2"></i>Utilisateurs</a>
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
                            <a href="{{ route('beneficiaires.create') }}" class="dropdown-item">Ajouter</a>
                        @endcan
                        @can('viewAny', App\Models\Beneficiaire::class)
                            <a href="{{ route('beneficiaires.index') }}" class="dropdown-item">Afficher</a>
                        @endcan
                        @can('show-history-beneficiaire-ability')
                        <a href="{{ route('beneficiaires-history') }}" class="dropdown-item">L'archivage</a>
                        @endcan
                    </div>
                </div>
            @endcanany
            @if (Auth::user()->intervenant)
                <a href="{{ route('programme-zone-affected') }}" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Afféctations</a>
            @endif
            @canany(['create', 'viewAny'], App\Models\Cas::class)
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle d-flex text-wrap" data-bs-toggle="dropdown"><i class="fas fa-balance-scale"></i>Gestion des cas juridique</a>
                    <div class="dropdown-menu bg-transparent border-0">
                        @can('create', App\Models\Cas::class)
                            <a href="{{ route('AddCasJuridique') }}" class="dropdown-item">Ajouter</a>
                        @endcan
                        @can('viewAny', App\Models\Cas::class)
                            <a href="{{ route('showCasJuridique') }}" class="dropdown-item">Afficher</a>
                        @endcan
                    </div>
                </div>
            @endcanany
            @canany(['create', 'viewAny'], App\Models\Atelier::class)
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle d-flex text-wrap align-items-center" data-bs-toggle="dropdown"><i class="fas fa-briefcase"></i>Ateliers</a>
                    <div class="dropdown-menu bg-transparent border-0">
                        @can('create', App\Models\Atelier::class)
                            <a href="{{ route('AddAtelier') }}" class="dropdown-item">Ajouter</a>
                        @endcan
                        @can('viewAny', App\Models\Atelier::class)
                            <a href="{{ route('showAtelier') }}" class="dropdown-item">Afficher</a>
                        @endcan
                    </div>
                </div>
            @endcanany
            @canany(['create', 'viewAny'], App\Models\DrogueType::class)
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle d-flex text-wrap align-items-center" data-bs-toggle="dropdown"><i class="fas fa-pills me-2"></i>Type de drogues</a>
                    <div class="dropdown-menu bg-transparent border-0">
                        @can('create', App\Models\DrogueType::class)
                            <a href="{{ route('add-type-drogue') }}" class="dropdown-item">Ajouter</a>
                        @endcan
                        @can('viewAny', App\Models\DrogueType::class)
                            <a href="{{ route('all-type-drogue') }}" class="dropdown-item">Afficher</a>
                        @endcan
                    </div>
                </div>
            @endcanany
            @canany(['create', 'viewAny'], App\Models\Couverture::class)
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle d-flex text-wrap align-items-center" data-bs-toggle="dropdown"><i class="fas fa-blanket me-2"></i>Couvertures</a>
                    <div class="dropdown-menu bg-transparent border-0">
                        @can('create', App\Models\Couverture::class)
                            <a href="{{ route('AddCouvertureMedical') }}" class="dropdown-item">Ajouter</a>
                        @endcan
                        @can('viewAny', App\Models\Couverture::class)
                            <a href="{{ route('ShowCouvertureMedical') }}" class="dropdown-item">Afficher</a>
                        @endcan
                    </div>
                </div>
            @endcanany
            @canany(['create', 'viewAny'], App\Models\Groupe::class)
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle d-flex text-wrap align-items-center" data-bs-toggle="dropdown"><i class="fas fa-users me-2"></i>Groupes</a>
                    <div class="dropdown-menu bg-transparent border-0">
                        @can('create', App\Models\Groupe::class)
                            <a href="{{ route('AddGroups') }}" class="dropdown-item">Ajouter</a>
                        @endcan
                        @can('viewAny', App\Models\Groupe::class)
                            <a href="{{ route('showGroups') }}" class="dropdown-item">Afficher</a>
                        @endcan
                    </div>
                </div>
            @endcanany
            @canany(['create', 'viewAny'], App\Models\Service::class)
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle d-flex text-wrap align-items-center" data-bs-toggle="dropdown"><i class="fas fa-tasks me-2"></i>Services</a>
                    <div class="dropdown-menu bg-transparent border-0">
                        @can('create', App\Models\Service::class)
                            <a href="{{ route('AddService') }}" class="dropdown-item">Ajouter</a>
                        @endcan
                        @can('viewAny', App\Models\Service::class)
                            <a href="{{ route('showService') }}" class="dropdown-item">Afficher</a>
                        @endcan
                    </div>
                </div>
            @endcanany
            @canany(['create', 'viewAny'], App\Models\ServiceType::class)
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle d-flex text-wrap align-items-center" data-bs-toggle="dropdown"><i class="fas fa-headset"></i>Types de service</a>
                    <div class="dropdown-menu bg-transparent border-0">
                        @can('create', App\Models\ServiceType::class)
                            <a href="{{ route('AddServiceType') }}" class="dropdown-item">Ajouter</a>
                        @endcan
                        @can('viewAny', App\Models\ServiceType::class)
                            <a href="{{ route('ShowServiceType') }}" class="dropdown-item">Afficher</a>
                        @endcan
                    </div>
                </div>
            @endcanany
            @canany(['create', 'viewAny'], App\Models\Projet::class)
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle d-flex text-wrap align-items-center" data-bs-toggle="dropdown"><i class="fas fa-code-branch me-2"></i>Projets</a>
                    <div class="dropdown-menu bg-transparent border-0">
                        @can('create', App\Models\Projet::class)
                            <a href="{{ route('add-projet') }}" class="dropdown-item">Ajouter</a>
                        @endcan
                        @can('viewAny', App\Models\Projet::class)
                            <a href="{{ route('showProjet') }}" class="dropdown-item">Afficher</a>
                        @endcan
                    </div>
                </div>
            @endcanany
            @if (Auth::user()->admin)
            {{-- @canany(['create', 'viewAny'], App\Models\Service::class) --}}
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle d-flex text-wrap align-items-center" data-bs-toggle="dropdown"><i class="fas fa-flask me-2"></i>Recherche scientifiques</a>
                    <div class="dropdown-menu bg-transparent border-0">
                        {{-- @can('create', App\Models\Service::class) --}}
                            <a href="{{ route('add-recherche') }}" class="dropdown-item">Ajouter</a>
                        {{-- @endcan --}}
                        {{-- @can('viewAny', App\Models\Service::class) --}}
                            <a href="{{ route('list-recherches') }}" class="dropdown-item">Afficher</a>
                        {{-- @endcan --}}
                    </div>
                </div>
            {{-- @endcanany --}}
            @endif
            @canany(['create', 'viewAny'], App\Models\Partenaire::class)
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle d-flex text-wrap align-items-center" data-bs-toggle="dropdown"><i class="fas fa-fist-raised me-2"></i>Partenaires</a>
                    <div class="dropdown-menu bg-transparent border-0">
                        @can('create', App\Models\Partenaire::class)
                            <a href="{{ route('add-partenaire') }}" class="dropdown-item">Ajouter</a>
                        @endcan
                        @can('viewAny', App\Models\Partenaire::class)
                            <a href="{{ route('show-partenaire') }}" class="dropdown-item">Afficher</a>
                        @endcan
                    </div>
                </div>
            @endcanany
            @canany(['create', 'viewAny'], App\Models\Zone::class)
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle d-flex text-wrap align-items-center" data-bs-toggle="dropdown"><i class="fas fa-street-view"></i>Zones</a>
                    <div class="dropdown-menu bg-transparent border-0">
                        @can('create', App\Models\Zone::class)
                            <a href="{{ route('addzoneIntervenant') }}" class="dropdown-item">Ajouter</a>
                        @endcan
                        @can('viewAny', App\Models\Zone::class)
                            <a href="{{ route('zoneintervenance') }}" class="dropdown-item">Afficher</a>
                        @endcan
                    </div>
                </div>
            @endcanany
            @canany(['create', 'viewAny'], App\Models\Programme::class)
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle d-flex text-wrap align-items-center" data-bs-toggle="dropdown"><i class="fab fa-product-hunt"></i>Programmes</a>
                    <div class="dropdown-menu bg-transparent border-0">
                        @can('create', App\Models\Programme::class)
                            <a href="{{ route('AddProgram') }}" class="dropdown-item">Ajouter</a>
                        @endcan
                        @can('viewAny', App\Models\Programme::class)
                            <a href="{{ route('showProgram') }}" class="dropdown-item">Afficher</a>
                        @endcan
                    </div>
                </div>
            @endcanany
            @canany(['create', 'viewAny'], App\Models\ProgrammeType::class)
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle d-flex text-wrap align-items-center" data-bs-toggle="dropdown"><i class="fas fa-chalkboard-teacher"></i>Types de programme</a>
                    <div class="dropdown-menu bg-transparent border-0">
                        @can('create', App\Models\ProgrammeType::class)
                            <a href="{{ route('add-program-type') }}" class="dropdown-item">Ajouter</a>
                        @endcan
                        @can('viewAny', App\Models\ProgrammeType::class)
                            <a href="{{ route('show-program-type') }}" class="dropdown-item">Afficher</a>
                        @endcan
                    </div>
                </div>
            @endcanany
            @canany(['create', 'viewAny'], App\Models\Formation::class)
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle d-flex text-wrap align-items-center" data-bs-toggle="dropdown"><i class="fas fa-school me-2"></i>Formations</a>
                    <div class="dropdown-menu bg-transparent border-0">
                        @can('create', App\Models\Formation::class)
                            <a href="{{ route('AddFormation') }}" class="dropdown-item">Ajouter</a>
                        @endcan
                        @can('viewAny', App\Models\Formation::class)
                            <a href="{{ route('showFormation') }}" class="dropdown-item">Afficher</a>
                        @endcan
                    </div>
                </div>
            @endcanany
            @canany(['create', 'viewAny'], App\Models\MedicaleVisite::class)
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle d-flex text-wrap align-items-center" data-bs-toggle="dropdown"><i class="fas fa-notes-medical me-2"></i>Visites médicales</a>
                    <div class="dropdown-menu bg-transparent border-0">
                        @can('create', App\Models\MedicaleVisite::class)
                            <a href="{{ route('visitemedical') }}" class="dropdown-item">Ajouter</a>
                        @endcan
                        @can('viewAny', App\Models\MedicaleVisite::class)
                            <a href="{{ route('showVisiteMedical') }}" class="dropdown-item">Afficher</a>
                        @endcan
                        @can('create', App\Models\MedicaleVisite::class)
                            <a href="{{ route('rapport') }}" class="dropdown-item">Rapport</a>
                        @endcan
                    </div>
                </div>
            @endcanany
            @canany(['create', 'viewAny'], App\Models\SocialeVisite::class)
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle d-flex text-wrap align-items-center" data-bs-toggle="dropdown"><i class="fas fa-comment-alt me-2"></i>Visites sociales</a>
                    <div class="dropdown-menu bg-transparent border-0">
                        @can('create', App\Models\SocialeVisite::class)
                            <a href="{{ route('AddSocialVisite') }}" class="dropdown-item">Ajouter</a>
                        @endcan
                        @can('viewAny', App\Models\SocialeVisite::class)
                            <a href="{{ route('showSocialVisite') }}" class="dropdown-item">Afficher</a>
                        @endcan
                    </div>
                </div>
            @endcanany
            @canany(['create', 'viewAny'], App\Models\JuridiqueVisite::class)
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle d-flex text-wrap align-items-center" data-bs-toggle="dropdown"><i class="fas fa-gavel me-2"></i>Visites juridiques</a>
                    <div class="dropdown-menu bg-transparent border-0">
                        @can('create', App\Models\JuridiqueVisite::class)
                            <a href="{{ route('AddVisiteJuridique') }}" class="dropdown-item">Ajouter</a>
                        @endcan
                        @can('viewAny', App\Models\JuridiqueVisite::class)
                            <a href="{{ route('ShowVisiteJuridique') }}" class="dropdown-item">Afficher</a>
                        @endcan
                    </div>
                </div>
            @endcanany
            @canany(['roles-permissions-ability', 'roles-services-ability'])
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fas fa-pencil-ruler me-2"></i>Gestion des roles</a>
                    <div class="dropdown-menu bg-transparent border-0">
                        @can('roles-permissions-ability')
                            <a href="{{ route('roles-permissions') }}" class="dropdown-item">Avec les permissions</a>
                        @endcan
                        @can('roles-services-ability')
                            <a href="{{ route('AffectServiceRole') }}" class="dropdown-item">Avec les services</a>
                        @endcan
                    </div>
                </div>
            @endcanany
            <a href="{{ route('logout') }}" class="nav-item nav-link"><i class="fa fa-sign-out-alt me-2"></i>Quitter</a>
        </div>
    </nav>
</div>
<!-- Sidebar End -->
