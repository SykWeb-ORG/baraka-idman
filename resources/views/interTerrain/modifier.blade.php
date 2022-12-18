@extends('layouts.app')

@section('title')
Modification du Bénéficiaire
@endsection
@section('content_page')
    <!-- Form Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">{{(!request()->has('page'))? 'Modifier beneficiaire' : request()->query('page')}}</h6>
                    <form class="form-benefaicaire" action="{{ route('beneficiaires.update', ['beneficiaire' => $beneficiaire->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        {{-- <div class="mb-3">
                            <label for="code-benef" class="form-label">Code Bénéfaicre</label>
                            <input type="text" class="form-control" id="code-benef">
                        </div> --}}
                        <div class="mb-3">
                            <label for="first-name-benef" class="form-label">Prénom</label>
                            <input {{(Auth::user()->cannot('update', $beneficiaire))? 'disabled' : ''}} type="text" name="prenom" class="form-control" id="first-name-benef" value="{{$beneficiaire->prenom}}">
                        </div>
                        <div class="mb-3">
                            <label for="last-name-benef" class="form-label">Nom</label>
                            <input {{(Auth::user()->cannot('update', $beneficiaire))? 'disabled' : ''}} type="text" name="nom" class="form-control" id="last-name-benef" value="{{$beneficiaire->nom}}">
                        </div>
                        <div class="mb-3">
                            <label for="adresse-benef" class="form-label">Adresse</label>
                            <input {{(Auth::user()->cannot('update', $beneficiaire))? 'disabled' : ''}} type="text" name="adresse" class="form-control" id="adresse-benef" value="{{$beneficiaire->adresse}}">
                        </div>
                        <fieldset class="row mb-3">
                            <legend class="col-form-label col-sm-2 pt-0">Sexe</legend>
                            <div id="sexe-benef" class="col-sm-10">
                                <div class="form-check d-inline-block mr-5">
                                    <input {{(Auth::user()->cannot('update', $beneficiaire))? 'disabled' : ''}} class="form-check-input" type="radio" name="sexe" id="gridRadios1"
                                        value="Homme" {{($beneficiaire->sexe == "Homme")? "checked" : ""}}>
                                    <label class="form-check-label" for="gridRadios1">
                                        Homme
                                    </label>
                                </div>
                                <div class="form-check d-inline-block">
                                    <input {{(Auth::user()->cannot('update', $beneficiaire))? 'disabled' : ''}} class="form-check-input" type="radio" name="sexe" id="gridRadios2"
                                        value="Femme" {{($beneficiaire->sexe == "Femme")? "checked" : ""}}>
                                    <label class="form-check-label" for="gridRadios2">
                                        Femme
                                    </label>
                                </div>
                            </div>
                        </fieldset>
                        <div class="mb-3">
                            <label for="cin-benef" class="form-label">CIN</label>
                            <input {{(Auth::user()->cannot('update', $beneficiaire))? 'disabled' : ''}} type="text" name="cin" class="form-control" id="cin-benef" value="{{$beneficiaire->cin}}">
                        </div>
                        <div class="mb-3">
                            <label for="phone-number-benef" class="form-label">N° de telephone</label>
                            <input {{(Auth::user()->cannot('update', $beneficiaire))? 'disabled' : ''}} type="number" name="telephone" class="form-control" id="phone-number-benef" value="{{$beneficiaire->telephone}}">
                        </div>
                        <div class="mb-3">
                            <label for="type-travail-benef" class="form-label">Type de travail</label>
                            <input {{(Auth::user()->cannot('update', $beneficiaire))? 'disabled' : ''}} type="text" name="type_travail" class="form-control" id="type-travail-benef" value="{{$beneficiaire->type_travail}}">
                        </div>
                        <div class="mb-3">
                            <label for="intervenant-benef" class="form-label">Niveau Scolaire</label>
                            <fieldset>
                                <div class="Nv-scolaire">
                                    <div class="form-check d-inline-block mr-5">
                                        <input {{(Auth::user()->cannot('update', $beneficiaire))? 'disabled' : ''}} {{($beneficiaire->niveau_scolaire == 'NON Scolarisé')? 'checked': ''}} class="form-check-input" type="radio" name="niveau_scolaire" id="gridRadios1"
                                            value="NON Scolarisé">
                                        <label class="form-check-label" for="gridRadios1">
                                            NON Scolarisé
                                        </label>
                                    </div>
                                    <div class="form-check d-inline-block">
                                        <input {{(Auth::user()->cannot('update', $beneficiaire))? 'disabled' : ''}} {{($beneficiaire->niveau_scolaire == 'Primaire')? 'checked': ''}} class="form-check-input" type="radio" name="niveau_scolaire" id="gridRadios2"
                                            value="Primaire">
                                        <label class="form-check-label" for="gridRadios2">
                                            Primaire
                                        </label>
                                    </div>
                                    <div class="form-check d-inline-block">
                                        <input {{(Auth::user()->cannot('update', $beneficiaire))? 'disabled' : ''}} {{($beneficiaire->niveau_scolaire == 'Collège')? 'checked': ''}} class="form-check-input" type="radio" name="niveau_scolaire" id="gridRadios3"
                                            value="Collège">
                                        <label class="form-check-label" for="gridRadios3">
                                            Collège
                                        </label>
                                    </div>
                                    <div class="form-check d-inline-block">
                                        <input {{(Auth::user()->cannot('update', $beneficiaire))? 'disabled' : ''}} {{($beneficiaire->niveau_scolaire == 'Lycée')? 'checked': ''}} class="form-check-input" type="radio" name="niveau_scolaire" id="gridRadios4"
                                            value="Lycée">
                                        <label class="form-check-label" for="gridRadios4">
                                            Lycée
                                        </label>
                                    </div>
                                    <div class="form-check d-inline-block">
                                        <input {{(Auth::user()->cannot('update', $beneficiaire))? 'disabled' : ''}} {{($beneficiaire->niveau_scolaire == 'bac+')? 'checked': ''}} class="form-check-input" type="radio" name="niveau_scolaire" id="gridRadios5"
                                            value="bac+">
                                        <label class="form-check-label" for="gridRadios5">
                                            bac+
                                        </label>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="mb-3">
                            <label for="intervenant-benef" class="form-label">Situation Familiale</label>
                            <fieldset class="row mb-3">
                                <div id="sexe-benef" class="col-sm-10">
                                    <div class="form-check d-inline-block mr-5">
                                        <input {{(Auth::user()->cannot('update', $beneficiaire))? 'disabled' : ''}} {{($beneficiaire->situation_familial == 'Célibataire')? 'checked': ''}} class="form-check-input" type="radio" name="situation_familial" id="gridRadios1"
                                            value="Célibataire">
                                        <label class="form-check-label" for="gridRadios1">
                                            Célibataire
                                        </label>
                                    </div>
                                    <div class="form-check d-inline-block">
                                        <input {{(Auth::user()->cannot('update', $beneficiaire))? 'disabled' : ''}} {{($beneficiaire->situation_familial == 'marié')? 'checked': ''}} class="form-check-input" type="radio" name="situation_familial" id="gridRadios2"
                                            value="marié">
                                        <label class="form-check-label" for="gridRadios2">
                                            marié
                                        </label>
                                    </div>
                                    <div class="form-check d-inline-block">
                                        <input {{(Auth::user()->cannot('update', $beneficiaire))? 'disabled' : ''}} {{($beneficiaire->situation_familial == 'divorcé')? 'checked': ''}} class="form-check-input" type="radio" name="situation_familial" id="gridRadios3"
                                            value="divorcé">
                                        <label class="form-check-label" for="gridRadios3">
                                            divorcé
                                        </label>
                                    </div>
                                    <div class="form-check d-inline-block">
                                        <input {{(Auth::user()->cannot('update', $beneficiaire))? 'disabled' : ''}} {{($beneficiaire->situation_familial == 'veuf')? 'checked': ''}} class="form-check-input" type="radio" name="situation_familial" id="gridRadios4"
                                            value="veuf">
                                        <label class="form-check-label" for="gridRadios4">
                                            veuf
                                        </label>
                                    </div>
                                </div>
                            </fieldset>
                       </div>
                        <fieldset class="row mb-3">
                            <legend class="col-form-label col-sm-2 pt-0">Orphelin</legend>
                            <div id="sexe-benef" class="col-sm-10">
                                <div class="form-check d-inline-block mr-5">
                                    <input {{(Auth::user()->cannot('update', $beneficiaire))? 'disabled' : ''}} class="form-check-input" type="radio" name="orphelin" id="gridRadios1"
                                        value="1" {{($beneficiaire->orphelin == "1")? "checked" : ""}}>
                                    <label class="form-check-label" for="gridRadios1">
                                        Oui
                                    </label>
                                </div>
                                <div class="form-check d-inline-block">
                                    <input {{(Auth::user()->cannot('update', $beneficiaire))? 'disabled' : ''}} class="form-check-input" type="radio" name="orphelin" id="gridRadios2"
                                        value="0" {{($beneficiaire->orphelin == "0")? "checked" : ""}}>
                                    <label class="form-check-label" for="gridRadios2">
                                        Non
                                    </label>
                                </div>
                            </div>
                        </fieldset>
                        <div class="mb-3">
                            <label for="intervenant-benef" class="form-label">Profession</label>
                            <fieldset class="row mb-3">
                                <div id="sexe-benef" class="col-sm-10">
                                    <div class="form-check d-inline-block mr-5">
                                        <input {{(Auth::user()->cannot('update', $beneficiaire))? 'disabled' : ''}} {{($beneficiaire->profession == 'SANS')? 'checked': ''}} class="form-check-input" type="radio" name="profession" id="gridRadios1"
                                            value="SANS">
                                        <label class="form-check-label" for="gridRadios1">
                                            SANS
                                        </label>
                                    </div>
                                    <div class="form-check d-inline-block">
                                        <input {{(Auth::user()->cannot('update', $beneficiaire))? 'disabled' : ''}} {{($beneficiaire->profession == 'Salarié')? 'checked': ''}} class="form-check-input" type="radio" name="profession" id="gridRadios2"
                                            value="Salarié">
                                        <label class="form-check-label" for="gridRadios2">
                                            Salarié
                                        </label>
                                    </div>
                                    <div class="form-check d-inline-block">
                                        <input {{(Auth::user()->cannot('update', $beneficiaire))? 'disabled' : ''}} {{($beneficiaire->profession == 'Ouvrier')? 'checked': ''}} class="form-check-input" type="radio" name="profession" id="gridRadios2"
                                            value="Ouvrier">
                                        <label class="form-check-label" for="gridRadios2">
                                            Ouvrier
                                        </label>
                                    </div>
                                    <div class="form-check d-inline-block">
                                        <input {{(Auth::user()->cannot('update', $beneficiaire))? 'disabled' : ''}} {{($beneficiaire->profession == 'Autres')? 'checked': ''}} class="form-check-input" type="radio" name="profession" id="gridRadios2"
                                            value="Autres">
                                        <label class="form-check-label" for="gridRadios2">
                                            Autres
                                        </label>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="mb-3">
                            <label for="intervenant-benef" class="form-label">Zone Habitation</label>
                            <fieldset class="row mb-3">
                                <div id="sexe-benef" class="col-sm-10">
                                    <div class="form-check d-inline-block mr-5">
                                        <input {{(Auth::user()->cannot('update', $beneficiaire))? 'disabled' : ''}} {{($beneficiaire->zone_habitation == 'Urbain')? 'checked': ''}} class="form-check-input" type="radio" name="zone_habitation" id="gridRadios1"
                                            value="Urbain">
                                        <label class="form-check-label" for="gridRadios1">
                                            Urbain
                                        </label>
                                    </div>
                                    <div class="form-check d-inline-block">
                                        <input {{(Auth::user()->cannot('update', $beneficiaire))? 'disabled' : ''}} {{($beneficiaire->zone_habitation == 'Village')? 'checked': ''}} class="form-check-input" type="radio" name="zone_habitation" id="gridRadios2"
                                            value="Village">
                                        <label class="form-check-label" for="gridRadios2">
                                            Village
                                        </label>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="mb-3">
                            <label for="intervenant-benef" class="form-label">Localisation</label>
                            <fieldset class="row mb-3">
                                <div id="sexe-benef" class="col-sm-10">
                                    <div class="form-check d-inline-block mr-5">
                                        <input {{(Auth::user()->cannot('update', $beneficiaire))? 'disabled' : ''}}  {{($beneficiaire->localisation == 'A l\'intérieur de la clôture')? 'checked': ''}} class="form-check-input" type="radio" name="localisation" id="gridRadios1"
                                            value="A l'intérieur de la clôture">
                                        <label class="form-check-label" for="gridRadios1">
                                            A l'intérieur de la clôture
                                        </label>
                                    </div>
                                    <div class="form-check d-inline-block">
                                        <input {{(Auth::user()->cannot('update', $beneficiaire))? 'disabled' : ''}} {{($beneficiaire->localisation == 'A l\'extérieur de la clôture')? 'checked': ''}} class="form-check-input" type="radio" name="localisation" id="gridRadios2"
                                            value="A l'extérieur de la clôture">
                                        <label class="form-check-label" for="gridRadios2">
                                            A l'extérieur de la clôture
                                        </label>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="mb-3">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Couverture médical</h6>
                            </div>
                            <fieldset>
                                @foreach ($couvertures as $couverture)
                                    <div class="form-check d-inline-block mr-5">
                                        <input {{(Auth::user()->cannot('update', $beneficiaire))? 'disabled' : ''}} {{($beneficiaire->couvertures->contains($couverture))? 'checked' : ''}} class="form-check-input" type="checkbox" name="couvertures[]" id="couverture{{$loop->iteration}}"
                                            value="{{$couverture->id}}">
                                        <label class="form-check-label" for="couverture{{$loop->iteration}}">
                                            {{$couverture->couverture_nom}}
                                        </label>
                                    </div>
                                @endforeach
                            </fieldset>
                            <div class="table-responsive">
                                <table class="table text-start align-middle table-bordered table-hover mb-0" id="tablebenificiere">
                                    <thead>
                                        <tr class="text-dark">
                                            <th scope="col">Type de drogue</th>
                                            <th scope="col">Quantité utilisée / fréquence</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbodyDrogueTypes">
                                        @foreach ($drogue_types as $drogue_type)
                                            <tr>
                                                <td><input {{(Auth::user()->cannot('update', $beneficiaire))? 'disabled' : ''}} {{($beneficiaire->drogue_types->contains($drogue_type))? 'checked' : ''}} type="checkbox" class="form-check-input" name="drogue_types[]" id="drogue_type{{$loop->iteration}}" value="{{$drogue_type->id}},{{$loop->index}}"><label for="drogue_type{{$loop->iteration}}">{{$drogue_type->service_nom}}</label></td>
                                                <td><input {{(Auth::user()->cannot('update', $beneficiaire))? 'disabled' : ''}} type="number" name="frequences[]" value="{{($beneficiaire->drogue_types->contains($drogue_type))? $beneficiaire->drogue_types->find($drogue_type)->frequence : ''}}"></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <fieldset class="row mb-3">
                            <legend class="col-form-label col-sm-2 pt-0">Famille Informé</legend>
                            <div id="sexe-benef" class="col-sm-10">
                                <div class="form-check d-inline-block mr-5">
                                    <input {{(Auth::user()->cannot('update', $beneficiaire))? 'disabled' : ''}} class="form-check-input" type="radio" name="famille_informee" id="gridRadios1"
                                        value="1" {{($beneficiaire->famille_informee == "1")? "checked" : ""}}>
                                    <label class="form-check-label" for="gridRadios1">
                                        Oui
                                    </label>
                                </div>
                                <div class="form-check d-inline-block">
                                    <input {{(Auth::user()->cannot('update', $beneficiaire))? 'disabled' : ''}} class="form-check-input" type="radio" name="famille_informee" id="gridRadios2"
                                        value="0" {{($beneficiaire->famille_informee == "0")? "checked" : ""}}>
                                    <label class="form-check-label" for="gridRadios2">
                                        Non
                                    </label>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset class="row mb-3">
                            <legend class="col-form-label col-sm-2 pt-0">Intégrer la famille dans le traitement</legend>
                            <div id="sexe-benef" class="col-sm-10">
                                <div class="form-check d-inline-block mr-5">
                                    <input {{(Auth::user()->cannot('update', $beneficiaire))? 'disabled' : ''}} class="form-check-input" type="radio" name="famille_integre" id="gridRadios1"
                                        value="1" {{($beneficiaire->famille_integre == "1")? "checked" : ""}}>
                                    <label class="form-check-label" for="gridRadios1">
                                        Oui
                                    </label>
                                </div>
                                <div class="form-check d-inline-block">
                                    <input {{(Auth::user()->cannot('update', $beneficiaire))? 'disabled' : ''}} class="form-check-input" type="radio" name="famille_integre" id="gridRadios2"
                                        value="0" {{($beneficiaire->famille_integre == "0")? "checked" : ""}}>
                                    <label class="form-check-label" for="gridRadios2">
                                        Non
                                    </label>
                                </div>
                            </div>
                        </fieldset>
                        <div class="mb-3">
                            <label for="intervenant-benef" class="form-label">Les causes d'addiction</label>
                            <fieldset class="row mb-3">
                                <div id="sexe-benef" class="col-sm-10">
                                    <div class="form-check d-inline-block mr-5">
                                        <input {{(Auth::user()->cannot('update', $beneficiaire))? 'disabled' : ''}} class="form-check-input" type="radio" name="addiction_cause" id="gridRadios1"
                                            value="Famille" {{($beneficiaire->addiction_cause == 'Famille')? 'checked': ''}} >
                                        <label class="form-check-label" for="gridRadios1">
                                            Famille
                                        </label>
                                    </div>
                                    <div class="form-check d-inline-block">
                                        <input {{(Auth::user()->cannot('update', $beneficiaire))? 'disabled' : ''}} class="form-check-input" type="radio" name="addiction_cause" id="gridRadios2"
                                            value="Amis" {{($beneficiaire->addiction_cause == 'Amis')? 'checked': ''}} >
                                        <label class="form-check-label" for="gridRadios2">
                                            Amis
                                        </label>
                                    </div>
                                    <div class="form-check d-inline-block">
                                        <input {{(Auth::user()->cannot('update', $beneficiaire))? 'disabled' : ''}} class="form-check-input" type="radio" name="addiction_cause" id="gridRadios2"
                                            value="Entourage" {{($beneficiaire->addiction_cause == 'Entourage')? 'checked': ''}} >
                                        <label class="form-check-label" for="gridRadios2">
                                            Entourage
                                        </label>
                                    </div>
                                    <div class="form-check d-inline-block">
                                        <input {{(Auth::user()->cannot('update', $beneficiaire))? 'disabled' : ''}} class="form-check-input" type="radio" name="addiction_cause" id="gridRadios2"
                                            value="Autres" {{($beneficiaire->addiction_cause == 'Autres')? 'checked': ''}} >
                                        <label class="form-check-label" for="gridRadios2">
                                            Autres
                                        </label>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="mb-3">
                            <label for="phone-number-benef" class="form-label">Age Debut Addiction</label>
                            <div class="table-responsive">
                                <table class="table text-start align-middle table-bordered table-hover mb-0" id="tablebenificiere">
                                    <thead>
                                        <tr class="text-dark">
                                            <th scope="col"></th>
                                            <th scope="col">Age de Début de l'Addiction</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbodyDrogueTypes">
                                        <tr>
                                            <td><input {{(Auth::user()->cannot('update', $beneficiaire))? 'disabled' : ''}} {{($beneficiaire->age_debut_addiction == 10)? 'checked': ''}} type="radio" class="form-check-input" name="age_debut_addiction" id="" value="10"></td>
                                            <td>Entre 10 et 15ans</td>
                                        </tr>
                                        <tr>
                                            <td><input {{(Auth::user()->cannot('update', $beneficiaire))? 'disabled' : ''}} {{($beneficiaire->age_debut_addiction == 15)? 'checked': ''}} type="radio" class="form-check-input" name="age_debut_addiction" id="" value="15"></td>
                                            <td>Entre 15 et 20ans</td>
                                        </tr>
                                        <tr>
                                            <td><input {{(Auth::user()->cannot('update', $beneficiaire))? 'disabled' : ''}} {{($beneficiaire->age_debut_addiction == 20)? 'checked': ''}} type="radio" class="form-check-input" name="age_debut_addiction" id="" value="20"></td>
                                            <td>Plus de 20ans</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="phone-number-benef" class="form-label">Duree Addiction</label>
                            <input {{(Auth::user()->cannot('update', $beneficiaire))? 'disabled' : ''}} type="number" name="duree_addiction" class="form-control" id="phone-number-benef" value="{{$beneficiaire->duree_addiction}}">
                        </div>
                        <fieldset class="row mb-3">
                            <legend class="col-form-label col-sm-2 pt-0">TS</legend>
                            <div id="sexe-benef" class="col-sm-10">
                                <div class="form-check d-inline-block mr-5">
                                    <input {{(Auth::user()->cannot('update', $beneficiaire))? 'disabled' : ''}} class="form-check-input" type="radio" name="ts" id="gridRadios1"
                                        value="1" {{($beneficiaire->ts == "1")? "checked" : ""}}>
                                    <label class="form-check-label" for="gridRadios1">
                                        Oui
                                    </label>
                                </div>
                                <div class="form-check d-inline-block">
                                    <input {{(Auth::user()->cannot('update', $beneficiaire))? 'disabled' : ''}} class="form-check-input" type="radio" name="ts" id="gridRadios2"
                                        value="0" {{($beneficiaire->ts == "0")? "checked" : ""}}>
                                    <label class="form-check-label" for="gridRadios2">
                                        Non
                                    </label>
                                </div>
                            </div>
                        </fieldset>
                        <div class="mb-3">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Exposition à la violence</h6>
                            </div>
                            <div class="table-responsive table2">
                                <table class="table text-start align-middle table-bordered table-hover mb-0" id="tablebenificiere">
                                    <thead>
                                        <tr class="text-dark">
                                            {{-- <th scope="col"><input class="form-check-input" type="checkbox"></th> --}}
                                            <th scope="col" colspan="2">Exposition à la violence</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><input type="radio" {{(count($beneficiaire->violence_types))? 'checked': ''}} class="form-check-input"  name="violence" id="oui"><label for="">Oui</label></td>
                                            <td><input type="radio" {{(count($beneficiaire->violence_types) == 0)? 'checked': ''}} class="form-check-input" name="violence" id="non"><label for="">Non</label></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="table text-start align-middle table-bordered table-hover mb-0" id="tablebenificiere">
                                    <thead>
                                        <tr class="text-dark">
                                            {{-- <th scope="col"><input class="form-check-input" type="checkbox"></th> --}}
                                            <th scope="col" colspan="2">Type de violence</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbodyViolenceTypes">
                                        @foreach ($violence_types as $violence_type)
                                            <tr>
                                                <td><input {{(Auth::user()->cannot('update', $beneficiaire))? 'disabled' : ''}} {{($beneficiaire->violence_types->contains($violence_type))? 'checked' : ''}} type="checkbox" class="form-check-input" name="violence_types[]" value="{{$violence_type->id}}" id=""></td>
                                                <td>{{$violence_type->violence_nom}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <span>NB:Mettre une croix dans la case approprié</span>
                        </div>
                        <div class="mb-3">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">La pensée au suicide</h6>
                            </div>
                            <div class="table-responsive table2">
                                <table class="table text-start align-middle table-bordered table-hover mb-0" id="tablebenificiere">
                                    <thead>
                                        <tr class="text-dark">
                                            {{-- <th scope="col"><input class="form-check-input" type="checkbox"></th> --}}
                                            <th scope="col" colspan="2">Pensée au suicide</th>
                                            <th scope="col">Les Causes</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><input {{(Auth::user()->cannot('update', $beneficiaire))? 'disabled' : ''}} type="radio" class="form-check-input" name="suicide" id="oui" {{(count($beneficiaire->suicide_causes))? 'checked': ''}}><label for="oui">Oui</label></td>
                                            <td><input {{(Auth::user()->cannot('update', $beneficiaire))? 'disabled' : ''}} type="radio" class="form-check-input" name="suicide" id="non" {{(count($beneficiaire->suicide_causes) == 0)? 'checked': ''}}><label for="non">Non</label></td>
                                            <td><textarea {{(Auth::user()->cannot('update', $beneficiaire))? 'disabled' : ''}} name="suicide_causes" id="" cols="30" rows="10">{{(count($beneficiaire->suicide_causes))? $beneficiaire->suicide_causes[0]->cause : ''}}</textarea></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Services</h6>
                            </div>
                            <div class="table-responsive table2">
                                <table class="table text-center align-middle table-bordered table-hover mb-0" id="tablebenificiere">
                                    <thead>
                                        <tr class="text-dark">
                                            {{-- <th scope="col"><input class="form-check-input" type="checkbox"></th> --}}
                                            <th scope="col"></th>
                                            <th scope="col">Services</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbodyServices">
                                        @foreach ($services as $service)
                                            <tr>
                                                <td><input {{(Auth::user()->cannot('update', $beneficiaire))? 'disabled' : ''}} {{($beneficiaire->services->contains($service))? 'checked' : ''}} type="checkbox" class="form-check-input" name="services[]" value="{{$service->id}}" id=""></td>
                                                <td>{{$service->service_nom}}</td>
                    
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="social-appointment" class="form-label">Date de la visite sociale</label>
                            <input type="date" {{(count($beneficiaire->sociale_visites) > 1)? 'disabled': ''}} name="social_visite_date" class="form-control" id="social-appointment" value="{{$beneficiaire->sociale_visites[0]->visite_date}}">
                        </div>
                        @can('update', $beneficiaire)
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Modifier</button>
                        </div>
                        @endcan
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
