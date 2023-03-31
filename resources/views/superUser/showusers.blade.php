@extends('layouts.app')

@section('title')
Liste des utilisateurs
@endsection
@section('content_page')
    <!-- Show All Users Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Tous Les Utilisateurs</h6>
                {{-- <a href="">Show All</a> --}}
            </div>
            <div class="filtre">
                <h5 for="" class="form-label">Filtre:</h5>
                <button type="submit" class="btn btn-sm btn-sm-square btn-primary m-2" data-bs-toggle="modal"
                    data-bs-target="#modal_filtre"><i class="fas fa-ellipsis-v"></i></button>
                <!-- Modal -->
                <div class="modal fade" id="modal_filtre" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                    aria-labelledby="staticBackdropLabel" aria-hidden="true">>
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Filtres</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                </button>
                            </div>
                            <div class="modal-bodyF">
                                <form action="{{ route('search-users') }}" method="GET">
                                    <div class="filtre_item">
                                        <label for="role" class="form-label">Filtre Par Role</label>
                                        <select name="role" id="role" class="filter_select">
                                            <option value="">Séléctionner rôle</option>
                                        </select>
                                    </div>
                                    <div class="filtre_item">
                                        <label for="zone" class="form-label">Filtre Par Zone</label>
                                        <select name="zone" id="zone" class="filter_select">
                                            <option value="">Séléctionner zone</option>
                                        </select>
                                    </div>
                                    <div class="filtre_item">
                                        <label for="criteria" class="form-label">Filtre Par Nom ou Prénom ou CIN</label>
                                        <input type="text" name="criteria" class="form-control" id="criteria" placeholder="Recherche...">
                                    </div>
                                    <div class="mb-3 d-flex justify-content-center">
                                        <button class="btn btn-primary">Filtrer</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if (session('matricule'))
                <div class="mb-3">
                    <label for="matricule-generated" class="form-label">Code généré</label>
                    <input type="text" value="{{ session('matricule') }}" disabled class="form-control" id="matricule-generated">
                </div>
            @endif
            <div class="table-responsive table-height">
                <table class="table text-start align-middle table-bordered table-hover mb-0" id="tableUser">
                    <thead>
                        <tr class="text-dark">
                            <th scope="col">N°</th>
                            <th>PDP</th>
                            <th>Prénom</th>
                            <th>Nom</th>
                            <th>CIN</th>
                            <th>N° de telephone</th>
                            <th>Date de naissance</th>
                            <th>Email</th>
                            <th>Rôle</th>
                            <th>Active</th>
                            <th colspan="5" class="Qactions">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                {{-- <td><input class="form-check-input" type="checkbox"></td> --}}
                                <td>{{$loop->iteration}}</td>
                                <td>{!! '<img class="rounded-circle me-lg-2" src="' . asset($user->photo_profile) .'" alt="" style="width: 40px; height: 40px;">' !!}</td>
                                <td>{{$user->first_name}}</td>
                                <td>{{$user->last_name}}</td>
                                <td>{{$user->cin}}</td>
                                <td>{{$user->phone_number}}</td>
                                <td>{{$user->birthday_date}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    @php
                                        if ($user->admin) {
                                            echo 'admin';
                                        }elseif ($user->intervenant) {
                                            echo 'intervenant';
                                        }elseif ($user->social_assistant) {
                                            echo 'social assistant';
                                        }elseif ($user->medical_assistant) {
                                            echo 'medical assistant';
                                        }elseif ($user->juridique_assistant) {
                                            echo 'juridique assistant';
                                        }
                                    @endphp
                                </td>
                                <td><input type="checkbox" {{ ($user->active)? "checked" : "" }} data-user-id="{{$user->id}}" data-toggle="toggle" data-onstyle="success" data-offstyle="danger"></td>
                                <td class="QuserEdit"><a href='{{ route('users.edit', ['user'=>$user->id]) }}' class="btn btn-primary m-2" data-bs-toggle='tooltip' data-bs-placement='top' title='Modifier utilisateur'><i class="fas fa-user-edit me-2 align-item-center"></i>Modifier</a></td>
                                <td class="QuserDest">
                                    <form action="{{ route('users.destroy', ['user'=>$user->id]) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-sm-square btn-primary m-2" type="button"
                                        data-bs-toggle="modal" data-bs-target="#modal_DeleteUser{{$loop->iteration}}" data-bs-toggle='tooltip' data-bs-placement='top' title='Supprimer utilisateur'><i class="fas fa-user-minus me-2"></i>Supprimer</button>
                                        <!--Delete user-->
                                        <!-- Modal -->
                                        <div class="modal fade" id="modal_DeleteUser{{$loop->iteration}}" data-bs-backdrop="static" data-bs-keyboard="false"
                                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Confirmer Suppression</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                        </button>
                                                    </div>
                                                        <div class="modal-bodyEdit">
                                                            <div class="mb-3 mt-3">
                                                                <button id="btn-delete-user" class="btn btn-secondary" data-bs-dismiss="modal">Oui</button>
                                                                <button class="btn btn-primary" data-bs-dismiss="modal">Non</button>
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--End Modal-->
                                    </form>
                                </td>
                                <td class="QactionMenu">
                                    <button type="submit" class="btn btn-sm btn-sm-square btn-primary m-2" data-bs-toggle="modal" data-bs-target="#modal_Add{{$loop->iteration}}"><i class="fas fa-ellipsis-h"></i></button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="modal_Add{{$loop->iteration}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">>
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Actions</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close">
                                                </button>
                                                </div>
                                                <div class="modal-body">
                                                    <a href='{{ route('users.edit', ['user'=>$user->id]) }}' class="btn btn-sm btn-sm-square btn-primary m-2 actionModal" data-bs-toggle='tooltip' data-bs-placement='top' title='Modifier utilisateur'><i class="fas fa-user-edit"></i></a>
                                                    <form action="{{ route('users.destroy', ['user'=>$user->id]) }}" class="actionModal" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-sm-square btn-primary m-2" data-bs-toggle='tooltip' data-bs-placement='top' title='Supprimer utilisateur'><i class="fas fa-user-minus"></i></button>
                                                    </form>
                                                    <form action="{{ route('reinit', ['user'=>$user->id]) }}" method="post">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit" class="btn btn-primary m-2" data-bs-toggle='tooltip' data-bs-placement='top' title='Reinitialiser compte'><i class="fas fa-sync me-2"></i>Réinitialiser</button>
                                                    </form>
                                                    @if ($user->intervenant)
                                                        @can('intervenant-zones-ability')
                                                        <a href='{{ route('all-zones', ['intervenant'=>$user->intervenant->id]) }}' class="btn btn-primary m-2" data-bs-toggle='tooltip' data-bs-placement='top' title='Lier intervenant avec les zones'><i class="fas fa-map-marker me-2"></i>Zones</a>
                                                        @endcan
                                                    @endif
                                                    @if ($user->intervenant)
                                                        <a href='{{ route('all-programmes', ['intervenant'=>$user->intervenant->id]) }}' class="btn btn-primary m-2" data-bs-toggle='tooltip' data-bs-placement='top' title='Lier intervenant avec les programmes'><i class="fab fa-product-hunt me-2"></i>Programmes</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>   
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Show All Users End -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if ($msg = session()->get('msg'))
        <div class="alert alert-{{session()->get('status')}} alert-dismissible fade show" role="alert">
            <i class="fas {{session()->get('icon')}}"></i> {{$msg}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>;
    @endif
@endsection
@section('custom_scripts')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script src="{{asset("jsApi/user/all-users.js")}}"></script>
@endsection
