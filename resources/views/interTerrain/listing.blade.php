@extends('layouts.app')

@section('content_page')
    <!-- Recent Sales Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Recent Salse</h6>
                <a href="">Show All</a>
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
                            <th scope="col">Famille Informé</th>
                            <th scope="col">Age Debut Addiction</th>
                            <th scope="col">Duree Addiction</th>
                            <th scope="col">TS</th>
                            <th scope="col" colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($beneficiaires as $beneficiaire)
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
                            <td>{{$beneficiaire->age_debut_addiction}}</td>
                            <td>{{$beneficiaire->duree_addiction}}</td>
                            <td>{{($beneficiaire->ts)? "oui" : "non"}}</td>
                            <td><a href='{{ route('beneficiaires.edit', ['beneficiaire'=>$beneficiaire->id]) }}' class="btn btn-sm btn-sm-square btn-primary m-2"><i class="fas fa-user-edit"></i></a></td>
                            <td>
                                <form action="{{ route('beneficiaires.destroy', ['beneficiaire'=>$beneficiaire->id]) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-sm-square btn-primary m-2"><i class="fas fa-user-minus"></i></button>
                                </form>
                            </td>
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
    @if ($msg = session()->get('user-deleted'))
        <div class="alert alert-{{session()->get('status')}} alert-dismissible fade show" role="alert">
            <i class="fas {{session()->get('icon')}}"></i> {{$msg}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>;
    @endif
@endsection
{{-- @section('custom_scripts')
<script src="{{asset("jsApi/intervenant/main.js")}}"></script>
@endsection --}}