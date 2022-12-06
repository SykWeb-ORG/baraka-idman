@extends('layouts.app')

@section('content_page')
    <!-- Form Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Modification Form</h6>
                    <form class="form-benefaicaire" action="{{ route('beneficiaires.update', ['beneficiaire' => $beneficiaire->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        {{-- <div class="mb-3">
                            <label for="code-benef" class="form-label">Code Bénéfaicre</label>
                            <input type="text" class="form-control" id="code-benef">
                        </div> --}}
                        <div class="mb-3">
                            <label for="first-name-benef" class="form-label">Prénom</label>
                            <input type="text" name="prenom" class="form-control" id="first-name-benef" value="{{$beneficiaire->prenom}}">
                        </div>
                        <div class="mb-3">
                            <label for="last-name-benef" class="form-label">Nom</label>
                            <input type="text" name="nom" class="form-control" id="last-name-benef" value="{{$beneficiaire->nom}}">
                        </div>
                        <div class="mb-3">
                            <label for="adresse-benef" class="form-label">Adresse</label>
                            <input type="text" name="adresse" class="form-control" id="adresse-benef" value="{{$beneficiaire->adresse}}">
                        </div>
                        <fieldset class="row mb-3">
                            <legend class="col-form-label col-sm-2 pt-0">Sexe</legend>
                            <div id="sexe-benef" class="col-sm-10">
                                <div class="form-check d-inline-block mr-5">
                                    <input class="form-check-input" type="radio" name="sexe" id="gridRadios1"
                                        value="Homme" {{($beneficiaire->sexe == "Homme")? "checked" : ""}}>
                                    <label class="form-check-label" for="gridRadios1">
                                        Homme
                                    </label>
                                </div>
                                <div class="form-check d-inline-block">
                                    <input class="form-check-input" type="radio" name="sexe" id="gridRadios2"
                                        value="Femme" {{($beneficiaire->sexe == "Femme")? "checked" : ""}}>
                                    <label class="form-check-label" for="gridRadios2">
                                        Femme
                                    </label>
                                </div>
                            </div>
                        </fieldset>
                        <div class="mb-3">
                            <label for="cin-benef" class="form-label">CIN</label>
                            <input type="text" name="cin" class="form-control" id="cin-benef" value="{{$beneficiaire->cin}}">
                        </div>
                        <div class="mb-3">
                            <label for="phone-number-benef" class="form-label">N° de telephone</label>
                            <input type="number" name="telephone" class="form-control" id="phone-number-benef" value="{{$beneficiaire->telephone}}">
                        </div>
                        <div class="mb-3">
                            <label for="type-travail-benef" class="form-label">Type de travail</label>
                            <input type="text" name="type_travail" class="form-control" id="type-travail-benef" value="{{$beneficiaire->type_travail}}">
                        </div>
                        <div class="mb-3">
                            <label for="intervenant-benef" class="form-label">Niveau Scolaire</label>
                            <input type="text" name="niveau_scolaire" class="form-control" id="intervenant-benef" value="{{$beneficiaire->niveau_scolaire}}">
                        </div>
                        <div class="mb-3">
                            <label for="intervenant-benef" class="form-label">Situation Familiale</label>
                            <input type="text" name="situation_familial" class="form-control" id="intervenant-benef" value="{{$beneficiaire->situation_familial}}">
                        </div>
                        <fieldset class="row mb-3">
                            <legend class="col-form-label col-sm-2 pt-0">Orphelin</legend>
                            <div id="sexe-benef" class="col-sm-10">
                                <div class="form-check d-inline-block mr-5">
                                    <input class="form-check-input" type="radio" name="orphelin" id="gridRadios1"
                                        value="1" {{($beneficiaire->orphelin == "1")? "checked" : ""}}>
                                    <label class="form-check-label" for="gridRadios1">
                                        Oui
                                    </label>
                                </div>
                                <div class="form-check d-inline-block">
                                    <input class="form-check-input" type="radio" name="orphelin" id="gridRadios2"
                                        value="0" {{($beneficiaire->orphelin == "0")? "checked" : ""}}>
                                    <label class="form-check-label" for="gridRadios2">
                                        Non
                                    </label>
                                </div>
                            </div>
                        </fieldset>
                        <div class="mb-3">
                            <label for="intervenant-benef" class="form-label">Profession</label>
                            <input type="text" name="profession" class="form-control" id="intervenant-benef" value="{{$beneficiaire->profession}}">
                        </div>
                        <div class="mb-3">
                            <label for="intervenant-benef" class="form-label">Zone Habitation</label>
                            <input type="text" name="zone_habitation" class="form-control" id="intervenant-benef" value="{{$beneficiaire->zone_habitation}}">
                        </div>
                        <div class="mb-3">
                            <label for="intervenant-benef" class="form-label">Localisation</label>
                            <input type="text" name="localisation" class="form-control" id="intervenant-benef" value="{{$beneficiaire->localisation}}">
                        </div>
                        <fieldset class="row mb-3">
                            <legend class="col-form-label col-sm-2 pt-0">Famille Informé</legend>
                            <div id="sexe-benef" class="col-sm-10">
                                <div class="form-check d-inline-block mr-5">
                                    <input class="form-check-input" type="radio" name="famille_informee" id="gridRadios1"
                                        value="1" {{($beneficiaire->famille_informee == "1")? "checked" : ""}}>
                                    <label class="form-check-label" for="gridRadios1">
                                        Oui
                                    </label>
                                </div>
                                <div class="form-check d-inline-block">
                                    <input class="form-check-input" type="radio" name="famille_informee" id="gridRadios2"
                                        value="0" {{($beneficiaire->famille_informee == "0")? "checked" : ""}}>
                                    <label class="form-check-label" for="gridRadios2">
                                        Non
                                    </label>
                                </div>
                            </div>
                        </fieldset>
                        <div class="mb-3">
                            <label for="phone-number-benef" class="form-label">Age Debut Addiction</label>
                            <input type="number" name="age_debut_addiction" class="form-control" id="phone-number-benef" value="{{$beneficiaire->age_debut_addiction}}">
                        </div>
                        <div class="mb-3">
                            <label for="phone-number-benef" class="form-label">Duree Addiction</label>
                            <input type="number" name="duree_addiction" class="form-control" id="phone-number-benef" value="{{$beneficiaire->duree_addiction}}">
                        </div>
                        <fieldset class="row mb-3">
                            <legend class="col-form-label col-sm-2 pt-0">TS</legend>
                            <div id="sexe-benef" class="col-sm-10">
                                <div class="form-check d-inline-block mr-5">
                                    <input class="form-check-input" type="radio" name="ts" id="gridRadios1"
                                        value="1" {{($beneficiaire->ts == "1")? "checked" : ""}}>
                                    <label class="form-check-label" for="gridRadios1">
                                        Oui
                                    </label>
                                </div>
                                <div class="form-check d-inline-block">
                                    <input class="form-check-input" type="radio" name="ts" id="gridRadios2"
                                        value="0" {{($beneficiaire->ts == "0")? "checked" : ""}}>
                                    <label class="form-check-label" for="gridRadios2">
                                        Non
                                    </label>
                                </div>
                            </div>
                        </fieldset>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Modifier</button>
                        </div>
                        <div id="message-alert" class="mb-3"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Form End -->
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
<script src="{{asset("jsApi/intervenant/manipDataInter.js")}}"></script>
@endsection --}}
