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
            <div class="table-responsive">
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
                            <th scope="col" colspan="7">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($beneficiaires as $beneficiaire)
                        @if ((!$beneficiaire->validation_social_assistant || !$beneficiaire->validation_directive) && Auth::user()->medical_assistant)
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
                            @can('update', $beneficiaire)
                            <td><a href='{{ route('beneficiaires.edit', ['beneficiaire'=>$beneficiaire->id]) }}' class="btn btn-sm btn-sm-square btn-primary m-2"><i class="fas fa-user-edit"></i></a></td>
                            @endcan
                            @can('delete', $beneficiaire)
                            <td>
                                <form action="{{ route('beneficiaires.destroy', ['beneficiaire'=>$beneficiaire->id]) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-sm-square btn-primary m-2"><i class="fas fa-user-minus"></i></button>
                                </form>
                            </td>
                            @endcan
                            @can('view', $beneficiaire)
                            <td><a href='{{ route('beneficiaires.show', ['beneficiaire'=>$beneficiaire->id, 'page'=>'La fiche d\'inscription']) }}' class="btn btn-sm btn-sm-square btn-primary m-2"><i class="fas fa-user"></i></a></td>
                            @endcan
                            @if (!Auth::user()->intervenant)
                            <td>
                                <form action="{{ route('validation-state', ['beneficiaire' => $beneficiaire->id, 'user' => Auth::id()]) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-sm btn-sm-square btn-primary m-2"><i class="fas fa-check"></i></button>
                                </form>
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
{{-- @section('custom_scripts')
<script src="{{asset("jsApi/intervenant/main.js")}}"></script>
@endsection --}}