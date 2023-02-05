@extends('layouts.app')

@section('title')
Liste des Bénéficiaires
@endsection
@section('content_page')
    <!-- Recent Sales Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Béneficiaires</h6>
            </div>
            <div class="filter_service">
                <a href="#" class="service_item">Service</a>
                <a href="#" class="service_item">Service</a>
                <a href="#" class="service_item">Service</a>
                <a href="#" class="service_item">Service</a>
                <a href="#" class="service_item">Service</a>
                <a href="#" class="service_item">Service</a>
                <a href="#" class="service_item">Service</a>
                <a href="#" class="service_item">Service</a>
                <a href="#" class="service_item">Service</a>
                <a href="#" class="service_item">Service</a>
            </div>
            <div class="table-responsive table-height">
                <table class="table text-start align-middle table-bordered table-hover mb-0" id="tablebenificiere">
                    <thead>
                        <tr class="text-dark">
                            {{-- <th scope="col"><input class="form-check-input" type="checkbox"></th> --}}
                            <th scope="col">N°</th>
                            <th scope="col">Code</th>
                            <th scope="col">prénom</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Adresse</th>
                            <th scope="col">Sexe</th>
                            <th scope="col">CIN</th>
                            <th scope="col">N° de telephone</th>
                            <th scope="col">Type de travail</th>
                            <th scope="col">Niveau Scolaire</th>
                            <th scope="col">Situation Familiale</th>
                            <th scope="col">Orphelin</th>
                            <th scope="col">Profession</th>
                            <th scope="col">Zone Habitation</th>
                            <th scope="col">Localisation</th>
                            <th scope="col">Famille Informée</th>
                            <th scope="col">Famille intégrée</th>
                            <th scope="col">Cause d'addiction</th>
                            <th scope="col">Age Debut Addiction</th>
                            <th scope="col">Duree Addiction</th>
                            <th scope="col">TS</th>
                            @if (Auth::user()->intervenant == null)
                                <th scope="col">Validation sociale</th>
                            @endif
                            @if (Auth::user()->admin || Auth::user()->medical_assistant)
                                <th scope="col">Validation directive</th>
                            @endif
                            @if (Auth::user()->medical_assistant)
                                <th scope="col">Validation médicale</th>
                            @endif
                            <th scope="col" colspan="2">Integrated / Pre-Integrated</th>
                            <th scope="col" colspan="3" class="actions">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($beneficiaires as $beneficiaire)
                        @if (((!$beneficiaire->validation_social_assistant || !$beneficiaire->validation_directive) && Auth::user()->medical_assistant) || $beneficiaire->archive)
                            @continue
                        @endif
                        <tr>
                            {{-- <td><input class="form-check-input" type="checkbox"></td> --}}
                            <td>{{$loop->iteration}}</td>
                            <td>{{$beneficiaire->id}}</td>
                            <td>{{$beneficiaire->prenom}}</td>
                            <td>{{$beneficiaire->nom}}</td>
                            <td>{{$beneficiaire->adresse}}</td>
                            <td>{{$beneficiaire->sexe}}</td>
                            <td>{{$beneficiaire->cin}}</td>
                            <td>{{$beneficiaire->telephone}}</td>
                            <td>{{$beneficiaire->type_travail}}</td>
                            <td>{{$beneficiaire->niveau_scolaire}}</td>
                            <td>{{$beneficiaire->situation_familial}}</td>
                            <td>{{($beneficiaire->orphelin)? "oui" : "non"}}</td>
                            <td>{{$beneficiaire->profession}}</td>
                            <td>{{$beneficiaire->zone_habitation}}</td>
                            <td>{{$beneficiaire->localisation}}</td>
                            <td>{{($beneficiaire->famille_informee)? "oui" : "non"}}</td>
                            <td>{{($beneficiaire->famille_integre)? "oui" : "non"}}</td>
                            <td>{{$beneficiaire->addiction_cause}}</td>
                            <td>{{$beneficiaire->age_debut_addiction}}</td>
                            <td>{{$beneficiaire->duree_addiction}}</td>
                            <td>{{($beneficiaire->ts)? "oui" : "non"}}</td>
                            @if (Auth::user()->intervenant == null)
                                <td>{{($beneficiaire->validation_social_assistant)? "oui" : "non"}}</td>
                            @endif
                            @if (Auth::user()->admin || Auth::user()->medical_assistant)
                                <td>{{($beneficiaire->validation_directive)? "oui" : "non"}}</td>
                            @endif
                            @if (Auth::user()->medical_assistant)
                                <td>{{($beneficiaire->validation_medical_assistant)? "oui" : "non"}}</td>
                            @endif
                            @if(Auth::user()->admin || Auth::user()->social_assistant)
                            <td>
                                <div class="form-check d-inline-block">
                                    <input class="form-check-input" type="radio" {{($beneficiaire->integration_status == 'intégration')? 'checked' : ''}} name="integrated{{$beneficiaire->id}}" id="integrated{{$beneficiaire->id}}"
                                        value="intégration" data-beneficiaire-id="{{$beneficiaire->id}}">
                                    <label class="form-check-label" for="integrated{{$beneficiaire->id}}">
                                        Integrated
                                    </label>
                                </div>
                            </td>
                            <td>
                                <div class="form-check d-inline-block">
                                    <input class="form-check-input" type="radio" {{($beneficiaire->integration_status == 'pré intégration')? 'checked' : ''}} name="integrated{{$beneficiaire->id}}" id="Pre-integrated{{$beneficiaire->id}}"
                                        value="pré intégration" data-beneficiaire-id="{{$beneficiaire->id}}">
                                    <label class="form-check-label" for="Pre-integrated{{$beneficiaire->id}}">
                                        Pre-Integrated
                                    </label>
                                </div>
                            </td>
                            @endif
                            @can('update', $beneficiaire)
                            <td class="actionU"><a href='{{ route('beneficiaires.edit', ['beneficiaire'=>$beneficiaire->id]) }}' class="btn btn-sm btn-sm-square btn-primary m-2"><i class="fas fa-user-edit"></i></a></td>
                            @endcan
                            @can('delete', $beneficiaire)
                            <td class="actionD">
                                <form action="{{ route('beneficiaires.destroy', ['beneficiaire'=>$beneficiaire->id]) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-sm-square btn-primary m-2"><i class="fas fa-user-minus"></i></button>
                                </form>
                            </td>
                            @endcan
                            @if (!Auth::user()->intervenant)
                            <td class="actionMenu">
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
                                                @can('update', $beneficiaire)
                                                <a href='{{ route('beneficiaires.edit', ['beneficiaire'=>$beneficiaire->id]) }}' class="actionModal btn btn-sm btn-sm-square btn-primary m-2"><i class="fas fa-user-edit"></i></a>
                                                @endcan
                                                @can('delete', $beneficiaire)
                                                <form action="{{ route('beneficiaires.destroy', ['beneficiaire'=>$beneficiaire->id]) }}" method="post" class="actionModal">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-sm-square btn-primary m-2"><i class="fas fa-user-minus"></i></button>
                                                </form>
                                                @endcan
                                                @can('view', $beneficiaire)
                                                <a href='{{ route('beneficiaires.show', ['beneficiaire'=>$beneficiaire->id, 'page'=>'La fiche d\'inscription']) }}' class="btn btn-sm btn-sm-square btn-primary m-2"><i class="fas fa-user"></i></a>
                                                @endcan
                                                <form action="{{ route('validation-state', ['beneficiaire' => $beneficiaire->id, 'user' => Auth::id()]) }}" method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-sm btn-sm-square btn-primary m-2"><i class="fas fa-check"></i></button>
                                                </form>
                                                @can('archive-beneficiaire-ability')
                                                <form action="{{ route('archive-beneficiaire', ['beneficiaire' => $beneficiaire->id]) }}" method="post">
                                                    @method('PUT')
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-sm-square btn-primary m-2"><i class="fas fa-archive"></i></button>
                                                </form>
                                                @endcan
                                                @can('beneficiaire-ateliers-ability')
                                                <a href='{{ route('all-ateliers', ['beneficiaire'=>$beneficiaire->id]) }}' class="btn btn-sm btn-sm-square btn-primary m-2"><i class="fas fa-briefcase"></i></a>
                                                @endcan
                                                @can('beneficiaire-cas-ability')
                                                <a href='{{ route('all-cas', ['beneficiaire'=>$beneficiaire->id]) }}' class="btn btn-sm btn-sm-square btn-primary m-2"><i class="fas fa-balance-scale"></i></a>
                                                @endcan
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            @endif
                            {{-- <td><a href='{{ route('couverture-medical', ['beneficiaire'=>$beneficiaire->id]) }}' class="btn btn-primary m-2">Couverture et types de drogues</a></td>
                            <td><a href='{{ route('violence', ['beneficiaire'=>$beneficiaire->id]) }}' class="btn  btn-primary m-2">Types de violence</a></td>
                            <td><a href='{{ route('suicide', ['beneficiaire'=>$beneficiaire->id]) }}' class="btn  btn-primary m-2">Causes de suicide</a></td>
                            <td><a href='{{ route('service', ['beneficiaire'=>$beneficiaire->id]) }}' class="btn  btn-primary m-2">Services</a></td> --}}
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Recent Sales End -->
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
    <script src="{{asset('jsApi/beneficiaire/all-beneficiaires.js')}}"></script>
@endsection
