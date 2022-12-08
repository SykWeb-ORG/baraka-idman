@extends('layouts.app')

@section('content_page')
    <!-- Form Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Inscription Form</h6>
                    <form class="form-benefaicaire" action="{{ route('beneficiaires.store') }}" method="POST">
                        @csrf
                        {{-- <div class="mb-3">
                            <label for="code-benef" class="form-label">Code Bénéfaicre</label>
                            <input type="text" class="form-control" id="code-benef">
                        </div> --}}
                        <div class="mb-3">
                            <label for="first-name-benef" class="form-label">Prénom</label>
                            <input type="text" name="prenom" class="form-control" id="first-name-benef">
                        </div>
                        <div class="mb-3">
                            <label for="last-name-benef" class="form-label">Nom</label>
                            <input type="text" name="nom" class="form-control" id="last-name-benef">
                        </div>
                        <div class="mb-3">
                            <label for="adresse-benef" class="form-label">Adresse</label>
                            <input type="text" name="adresse" class="form-control" id="adresse-benef">
                        </div>
                        <fieldset class="row mb-3">
                            <legend class="col-form-label col-sm-2 pt-0">Sexe</legend>
                            <div id="sexe-benef" class="col-sm-10">
                                <div class="form-check d-inline-block mr-5">
                                    <input class="form-check-input" type="radio" name="sexe" id="gridRadios1"
                                        value="Homme">
                                    <label class="form-check-label" for="gridRadios1">
                                        Homme
                                    </label>
                                </div>
                                <div class="form-check d-inline-block">
                                    <input class="form-check-input" type="radio" name="sexe" id="gridRadios2"
                                        value="Femme">
                                    <label class="form-check-label" for="gridRadios2">
                                        Femme
                                    </label>
                                </div>
                            </div>
                        </fieldset>
                        <div class="mb-3">
                            <label for="cin-benef" class="form-label">CIN</label>
                            <input type="text" name="cin" class="form-control" id="cin-benef">
                        </div>
                        <div class="mb-3">
                            <label for="phone-number-benef" class="form-label">N° de telephone</label>
                            <input type="number" name="telephone" class="form-control" id="phone-number-benef">
                        </div>
                        <div class="mb-3">
                            <label for="type-travail-benef" class="form-label">Type de travail</label>
                            <input type="text" name="type_travail" class="form-control" id="type-travail-benef">
                        </div>
                        <div class="mb-3">
                            <label for="intervenant-benef" class="form-label">Niveau Scolaire</label>
                            <fieldset>
                                <div class="Nv-scolaire">
                                    <div class="form-check d-inline-block mr-5">
                                        <input class="form-check-input" type="radio" name="niveau" id="gridRadios1"
                                            value="1">
                                        <label class="form-check-label" for="gridRadios1">
                                            NON Scolarisé
                                        </label>
                                    </div>
                                    <div class="form-check d-inline-block">
                                        <input class="form-check-input" type="radio" name="niveau" id="gridRadios2"
                                            value="0">
                                        <label class="form-check-label" for="gridRadios2">
                                            Primaire
                                        </label>
                                    </div>
                                    <div class="form-check d-inline-block">
                                        <input class="form-check-input" type="radio" name="niveau" id="gridRadios2"
                                            value="0">
                                        <label class="form-check-label" for="gridRadios2">
                                            Collège
                                        </label>
                                    </div>
                                    <div class="form-check d-inline-block">
                                        <input class="form-check-input" type="radio" name="niveau" id="gridRadios2"
                                            value="0">
                                        <label class="form-check-label" for="gridRadios2">
                                            Lycée
                                        </label>
                                    </div>
                                    <div class="form-check d-inline-block">
                                        <input class="form-check-input" type="radio" name="niveau" id="gridRadios2"
                                            value="0">
                                        <label class="form-check-label" for="gridRadios2">
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
                                        <input class="form-check-input" type="radio" name="situation" id="gridRadios1"
                                            value="1">
                                        <label class="form-check-label" for="gridRadios1">
                                            Célibataire
                                        </label>
                                    </div>
                                    <div class="form-check d-inline-block">
                                        <input class="form-check-input" type="radio" name="situation" id="gridRadios2"
                                            value="0">
                                        <label class="form-check-label" for="gridRadios2">
                                            marié(e)
                                        </label>
                                    </div>
                                    <div class="form-check d-inline-block">
                                        <input class="form-check-input" type="radio" name="situation" id="gridRadios2"
                                            value="0">
                                        <label class="form-check-label" for="gridRadios2">
                                            divorcé(e)
                                        </label>
                                    </div>
                                    <div class="form-check d-inline-block">
                                        <input class="form-check-input" type="radio" name="situation" id="gridRadios2"
                                            value="0">
                                        <label class="form-check-label" for="gridRadios2">
                                            veuf(ve)
                                        </label>
                                    </div>
                                </div>
                            </fieldset>
                       </div>
                        <fieldset class="row mb-3">
                            <legend class="col-form-label col-sm-2 pt-0">Orphelin</legend>
                            <div id="sexe-benef" class="col-sm-10">
                                <div class="form-check d-inline-block mr-5">
                                    <input class="form-check-input" type="radio" name="orphelin" id="gridRadios1"
                                        value="1">
                                    <label class="form-check-label" for="gridRadios1">
                                        Oui
                                    </label>
                                </div>
                                <div class="form-check d-inline-block">
                                    <input class="form-check-input" type="radio" name="orphelin" id="gridRadios2"
                                        value="0">
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
                                        <input class="form-check-input" type="radio" name="profession" id="gridRadios1"
                                            value="1">
                                        <label class="form-check-label" for="gridRadios1">
                                            SANS
                                        </label>
                                    </div>
                                    <div class="form-check d-inline-block">
                                        <input class="form-check-input" type="radio" name="profession" id="gridRadios2"
                                            value="0">
                                        <label class="form-check-label" for="gridRadios2">
                                            Salarié
                                        </label>
                                    </div>
                                    <div class="form-check d-inline-block">
                                        <input class="form-check-input" type="radio" name="profession" id="gridRadios2"
                                            value="0">
                                        <label class="form-check-label" for="gridRadios2">
                                            Ouvrier
                                        </label>
                                    </div>
                                    <div class="form-check d-inline-block">
                                        <input class="form-check-input" type="radio" name="profession" id="gridRadios2"
                                            value="0">
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
                                        <input class="form-check-input" type="radio" name="habitation" id="gridRadios1"
                                            value="1">
                                        <label class="form-check-label" for="gridRadios1">
                                            Urbain
                                        </label>
                                    </div>
                                    <div class="form-check d-inline-block">
                                        <input class="form-check-input" type="radio" name="habitation" id="gridRadios2"
                                            value="0">
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
                                        <input class="form-check-input" type="radio" name="Localisation" id="gridRadios1"
                                            value="1">
                                        <label class="form-check-label" for="gridRadios1">
                                            A l'intérieur de la clôture
                                        </label>
                                    </div>
                                    <div class="form-check d-inline-block">
                                        <input class="form-check-input" type="radio" name="Localisation" id="gridRadios2"
                                            value="0">
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
                                <div class="Nv-scolaire">
                                    <div class="form-check d-inline-block mr-5">
                                        <input class="form-check-input" type="radio" name="medical" id="gridRadios1"
                                            value="1">
                                        <label class="form-check-label" for="gridRadios1">
                                            SANS
                                        </label>
                                    </div>
                                    <div class="form-check d-inline-block">
                                        <input class="form-check-input" type="radio" name="medical" id="gridRadios2"
                                            value="0">
                                        <label class="form-check-label" for="gridRadios2">
                                            CNSS
                                        </label>
                                    </div>
                                    <div class="form-check d-inline-block">
                                        <input class="form-check-input" type="radio" name="medical" id="gridRadios2"
                                            value="0">
                                        <label class="form-check-label" for="gridRadios2">
                                            RAMED
                                        </label>
                                    </div>
                                    <div class="form-check d-inline-block">
                                        <input class="form-check-input" type="radio" name="medical" id="gridRadios2"
                                            value="0">
                                        <label class="form-check-label" for="gridRadios2">
                                            AMO
                                        </label>
                                    </div>
                                    <div class="form-check d-inline-block">
                                        <input class="form-check-input" type="radio" name="medical" id="gridRadios2"
                                            value="0">
                                        <label class="form-check-label" for="gridRadios2">
                                            CNOPS
                                        </label>
                                    </div>
                                </div>
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
                                        <tr>
                                            <td><input type="checkbox" class="form-check-input" name="" id=""><label for="">Cigarette</label></td>
                                            <td><input type="number" name="" id=""></td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" class="form-check-input" name="" id=""><label for="">Cannabis</label></td>
                                            <td><input type="number" name="" id=""></td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" class="form-check-input" name="" id=""><label for="">Alcool</label></td>
                                            <td><input type="number" name="" id=""></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <fieldset class="row mb-3">
                            <legend class="col-form-label col-sm-2 pt-0">Famille Informé</legend>
                            <div id="sexe-benef" class="col-sm-10">
                                <div class="form-check d-inline-block mr-5">
                                    <input class="form-check-input" type="radio" name="famille_informee" id="gridRadios1"
                                        value="1">
                                    <label class="form-check-label" for="gridRadios1">
                                        Oui
                                    </label>
                                </div>
                                <div class="form-check d-inline-block">
                                    <input class="form-check-input" type="radio" name="famille_informee" id="gridRadios2"
                                        value="0">
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
                                    <input class="form-check-input" type="radio" name="intégrer_famille" id="gridRadios1"
                                        value="1">
                                    <label class="form-check-label" for="gridRadios1">
                                        Oui
                                    </label>
                                </div>
                                <div class="form-check d-inline-block">
                                    <input class="form-check-input" type="radio" name="intégrer_famille" id="gridRadios2"
                                        value="0">
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
                                        <input class="form-check-input" type="radio" name="cause" id="gridRadios1"
                                            value="1">
                                        <label class="form-check-label" for="gridRadios1">
                                            Famille
                                        </label>
                                    </div>
                                    <div class="form-check d-inline-block">
                                        <input class="form-check-input" type="radio" name="cause" id="gridRadios2"
                                            value="0">
                                        <label class="form-check-label" for="gridRadios2">
                                            Amis
                                        </label>
                                    </div>
                                    <div class="form-check d-inline-block">
                                        <input class="form-check-input" type="radio" name="cause" id="gridRadios2"
                                            value="0">
                                        <label class="form-check-label" for="gridRadios2">
                                            Entourage
                                        </label>
                                    </div>
                                    <div class="form-check d-inline-block">
                                        <input class="form-check-input" type="radio" name="cause" id="gridRadios2"
                                            value="0">
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
                                            <td><input type="radio" class="form-check-input" name="age" id=""></td>
                                            <td>Entre 10 et 15ans</td>
                                        </tr>
                                        <tr>
                                            <td><input type="radio" class="form-check-input" name="age" id=""></td>
                                            <td>Entre 15 et 20ans</td>
                                        </tr>
                                        <tr>
                                            <td><input type="radio" class="form-check-input" name="age" id=""></td>
                                            <td>Plus de 20ans</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="phone-number-benef" class="form-label">Duree Addiction</label>
                            <input type="number" name="duree_addiction" class="form-control" id="phone-number-benef">
                        </div>
                        <fieldset class="row mb-3">
                            <legend class="col-form-label col-sm-2 pt-0">TS</legend>
                            <div id="sexe-benef" class="col-sm-10">
                                <div class="form-check d-inline-block mr-5">
                                    <input class="form-check-input" type="radio" name="ts" id="gridRadios1"
                                        value="1">
                                    <label class="form-check-label" for="gridRadios1">
                                        Oui
                                    </label>
                                </div>
                                <div class="form-check d-inline-block">
                                    <input class="form-check-input" type="radio" name="ts" id="gridRadios2"
                                        value="0">
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
                                            <td><input type="radio" class="form-check-input"  name="violence" id="oui"><label for="">Oui</label></td>
                                            <td><input type="radio" class="form-check-input" name="violence" id="non"><label for="">Non</label></td>
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
                                        <tr>
                                            <td><input type="radio" class="form-check-input" name="typeViol" id=""></td>
                                            <td>Psychologique</td>
                                        </tr>
                                        <tr>
                                            <td><input type="radio" class="form-check-input" name="typeViol" id=""></td>
                                            <td>Sexuelle</td>
                                        </tr>
                                        <tr>
                                            <td><input type="radio" class="form-check-input" name="typeViol" id=""></td>
                                            <td>Physique</td>
                                        </tr>
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
                                            {{-- <form id="form_beneficiaire_suicide" action="{{ route('match-beneficiaire-suicide_causes', ['beneficiaire' => $beneficiaire->id]) }}" method="post"> --}}
                                                @csrf
                                                {{-- <td><input type="radio" class="form-check-input" name="suicide" id="oui" {{(count($beneficiaire->suicide_causes))? 'checked': ''}}><label for="oui">Oui</label></td> --}}
                                                {{-- <td><input type="radio" class="form-check-input" name="suicide" id="non" {{(count($beneficiaire->suicide_causes) == 0)? 'checked': ''}}><label for="non">Non</label></td> --}}
                                                {{-- <td><textarea name="suicide_causes" id="" cols="30" rows="10">{{(count($beneficiaire->suicide_causes))? $beneficiaire->suicide_causes[0]->cause : ''}}</textarea></td> --}}
                                            </form>
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
                                        <tr>
                                            <td><input type="checkbox" class="form-check-input" name="" id=""></td>
                                            <td>Accompagnement sanitaire</td>
                
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" class="form-check-input" name="" id=""></td>
                                            <td>Accompagnement sociale</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" class="form-check-input" name="" id=""></td>
                                            <td>Accompagnement juridique/administratif</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Ajouter</button>
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
<script src="jsApi/intervenant/manipDataInter.js"></script>
@endsection --}}
