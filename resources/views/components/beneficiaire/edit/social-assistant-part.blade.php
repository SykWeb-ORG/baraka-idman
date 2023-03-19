<div class="mb-3">
    <label for="intervenant-benef" class="form-label">Niveau Scolaire</label>
    <fieldset>
        <div class="Nv-scolaire">
            <div class="form-check d-inline-block mr-5">
                <input {{(Auth::user()->cannot('update', $beneficiaire))? 'disabled' : ''}} {{($beneficiaire->niveau_scolaire == 'NON Scolarisé')? 'checked': ''}} class="form-check-input" type="radio" name="niveau_scolaire" id="non_scolarisé"
                    value="NON Scolarisé">
                <label class="form-check-label" for="non_scolarisé">
                    NON Scolarisé
                </label>
            </div>
            <div class="form-check d-inline-block">
                <input {{(Auth::user()->cannot('update', $beneficiaire))? 'disabled' : ''}} {{($beneficiaire->niveau_scolaire == 'Primaire')? 'checked': ''}} class="form-check-input" type="radio" name="niveau_scolaire" id="primaire"
                    value="Primaire">
                <label class="form-check-label" for="primaire">
                    Primaire
                </label>
            </div>
            <div class="form-check d-inline-block">
                <input {{(Auth::user()->cannot('update', $beneficiaire))? 'disabled' : ''}} {{($beneficiaire->niveau_scolaire == 'Collège')? 'checked': ''}} class="form-check-input" type="radio" name="niveau_scolaire" id="college"
                    value="Collège">
                <label class="form-check-label" for="college">
                    Collège
                </label>
            </div>
            <div class="form-check d-inline-block">
                <input {{(Auth::user()->cannot('update', $beneficiaire))? 'disabled' : ''}} {{($beneficiaire->niveau_scolaire == 'Lycée')? 'checked': ''}} class="form-check-input" type="radio" name="niveau_scolaire" id="lycee"
                    value="Lycée">
                <label class="form-check-label" for="lycee">
                    Lycée
                </label>
            </div>
            <div class="form-check d-inline-block">
                <input {{(Auth::user()->cannot('update', $beneficiaire))? 'disabled' : ''}} {{($beneficiaire->niveau_scolaire == 'Bac')? 'checked': ''}} class="form-check-input" type="radio" name="niveau_scolaire" id="bac"
                    value="bac">
                <label class="form-check-label" for="bac">
                    Bac
                </label>
            </div>
            <div class="form-check d-inline-block">
                <input {{(Auth::user()->cannot('update', $beneficiaire))? 'disabled' : ''}} {{($beneficiaire->niveau_scolaire == 'bac+')? 'checked': ''}} class="form-check-input" type="radio" name="niveau_scolaire" id="bac+"
                    value="bac+">
                <label class="form-check-label" for="bac+">
                    Bac+
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
                <input {{(Auth::user()->cannot('update', $beneficiaire))? 'disabled' : ''}} {{($beneficiaire->situation_familial == 'Célibataire')? 'checked': ''}} class="form-check-input" type="radio" name="situation_familial" id="celib"
                    value="Célibataire">
                <label class="form-check-label" for="celib">
                    Célibataire
                </label>
            </div>
            <div class="form-check d-inline-block">
                <input {{(Auth::user()->cannot('update', $beneficiaire))? 'disabled' : ''}} {{($beneficiaire->situation_familial == 'marié')? 'checked': ''}} class="form-check-input" type="radio" name="situation_familial" id="marié"
                    value="marié">
                <label class="form-check-label" for="marié">
                    marié
                </label>
            </div>
            <div class="form-check d-inline-block">
                <input {{(Auth::user()->cannot('update', $beneficiaire))? 'disabled' : ''}} {{($beneficiaire->situation_familial == 'divorcé')? 'checked': ''}} class="form-check-input" type="radio" name="situation_familial" id="divorcé"
                    value="divorcé">
                <label class="form-check-label" for="divorcé">
                    divorcé
                </label>
            </div>
            <div class="form-check d-inline-block">
                <input {{(Auth::user()->cannot('update', $beneficiaire))? 'disabled' : ''}} {{($beneficiaire->situation_familial == 'veuf')? 'checked': ''}} class="form-check-input" type="radio" name="situation_familial" id="veuf"
                    value="veuf">
                <label class="form-check-label" for="veuf">
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
            <input {{(Auth::user()->cannot('update', $beneficiaire))? 'disabled' : ''}} class="form-check-input" type="radio" name="orphelin" id="Orphelin_oui"
                value="1" {{($beneficiaire->orphelin == "1")? "checked" : ""}}>
            <label class="form-check-label" for="Orphelin_oui">
                Oui
            </label>
        </div>
        <div class="form-check d-inline-block">
            <input {{(Auth::user()->cannot('update', $beneficiaire))? 'disabled' : ''}} class="form-check-input" type="radio" name="orphelin" id="Orphelin_non"
                value="0" {{($beneficiaire->orphelin == "0")? "checked" : ""}}>
            <label class="form-check-label" for="Orphelin_non">
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
                <input {{(Auth::user()->cannot('update', $beneficiaire))? 'disabled' : ''}} {{($beneficiaire->profession == 'SANS')? 'checked': ''}} class="form-check-input" type="radio" name="profession" id="sans_profession"
                    value="SANS">
                <label class="form-check-label" for="sans_profession">
                    SANS
                </label>
            </div>
            <div class="form-check d-inline-block">
                <input {{(Auth::user()->cannot('update', $beneficiaire))? 'disabled' : ''}} {{($beneficiaire->profession == 'Salarié')? 'checked': ''}} class="form-check-input" type="radio" name="profession" id="salarié"
                    value="Salarié">
                <label class="form-check-label" for="salarié">
                    Salarié
                </label>
            </div>
            <div class="form-check d-inline-block">
                <input {{(Auth::user()->cannot('update', $beneficiaire))? 'disabled' : ''}} {{($beneficiaire->profession == 'Ouvrier')? 'checked': ''}} class="form-check-input" type="radio" name="profession" id="ouvrier"
                    value="Ouvrier">
                <label class="form-check-label" for="ouvrier">
                    Ouvrier
                </label>
            </div>
            <div class="form-check d-inline-block">
                <input {{(Auth::user()->cannot('update', $beneficiaire))? 'disabled' : ''}} {{($beneficiaire->profession == 'Autres')? 'checked': ''}} class="form-check-input" type="radio" name="profession" id="autres"
                    value="Autres">
                <label class="form-check-label" for="autres">
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
                <input {{(Auth::user()->cannot('update', $beneficiaire))? 'disabled' : ''}} {{($beneficiaire->zone_habitation == 'Urbain')? 'checked': ''}} class="form-check-input" type="radio" name="zone_habitation" id="zone_urbain"
                    value="Urbain">
                <label class="form-check-label" for="zone_urbain">
                    Urbain
                </label>
            </div>
            <div class="form-check d-inline-block">
                <input {{(Auth::user()->cannot('update', $beneficiaire))? 'disabled' : ''}} {{($beneficiaire->zone_habitation == 'Village')? 'checked': ''}} class="form-check-input" type="radio" name="zone_habitation" id="zone_village"
                    value="Village">
                <label class="form-check-label" for="zone_village">
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
                <input {{(Auth::user()->cannot('update', $beneficiaire))? 'disabled' : ''}}  {{($beneficiaire->localisation == 'A l\'intérieur de la clôture')? 'checked': ''}} class="form-check-input" type="radio" name="localisation" id="local_inter"
                    value="A l'intérieur de la clôture">
                <label class="form-check-label" for="local_inter">
                    A l'intérieur de la clôture
                </label>
            </div>
            <div class="form-check d-inline-block">
                <input {{(Auth::user()->cannot('update', $beneficiaire))? 'disabled' : ''}} {{($beneficiaire->localisation == 'A l\'extérieur de la clôture')? 'checked': ''}} class="form-check-input" type="radio" name="localisation" id="local_exter"
                    value="A l'extérieur de la clôture">
                <label class="form-check-label" for="local_exter">
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
                        <td><input {{(Auth::user()->cannot('update', $beneficiaire))? 'disabled' : ''}} {{($beneficiaire->drogue_types->contains($drogue_type))? 'checked' : ''}} type="checkbox" class="form-check-input" name="drogue_types[]" id="drogue_type{{$loop->iteration}}" value="{{$drogue_type->id}}"><label for="drogue_type{{$loop->iteration}}">{{$drogue_type->drogue_nom}}</label></td>
                        <td><input {{(Auth::user()->cannot('update', $beneficiaire))? 'disabled' : ''}} type="number" name="frequences[]" value="{{($beneficiaire->drogue_types->contains($drogue_type) && $beneficiaire->drogue_types->find($drogue_type->id)->beneficiaire_drogue_type)? $beneficiaire->drogue_types->find($drogue_type->id)->beneficiaire_drogue_type->frequence : ''}}"></td>
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
            <input {{(Auth::user()->cannot('update', $beneficiaire))? 'disabled' : ''}} class="form-check-input" type="radio" name="famille_informee" id="informé_oui"
                value="1" {{($beneficiaire->famille_informee == "1")? "checked" : ""}}>
            <label class="form-check-label" for="informé_oui">
                Oui
            </label>
        </div>
        <div class="form-check d-inline-block">
            <input {{(Auth::user()->cannot('update', $beneficiaire))? 'disabled' : ''}} class="form-check-input" type="radio" name="famille_informee" id="informé_non"
                value="0" {{($beneficiaire->famille_informee == "0")? "checked" : ""}}>
            <label class="form-check-label" for="informé_non">
                Non
            </label>
        </div>
    </div>
</fieldset>
<fieldset class="row mb-3">
    <legend class="col-form-label col-sm-2 pt-0">Intégrer la famille dans le traitement</legend>
    <div id="sexe-benef" class="col-sm-10">
        <div class="form-check d-inline-block mr-5">
            <input {{(Auth::user()->cannot('update', $beneficiaire))? 'disabled' : ''}} class="form-check-input" type="radio" name="famille_integre" id="integre_famille_oui"
                value="1" {{($beneficiaire->famille_integre == "1")? "checked" : ""}}>
            <label class="form-check-label" for="integre_famille_oui">
                Oui
            </label>
        </div>
        <div class="form-check d-inline-block">
            <input {{(Auth::user()->cannot('update', $beneficiaire))? 'disabled' : ''}} class="form-check-input" type="radio" name="famille_integre" id="integre_famille_non"
                value="0" {{($beneficiaire->famille_integre == "0")? "checked" : ""}}>
            <label class="form-check-label" for="integre_famille_non">
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
                <input {{(Auth::user()->cannot('update', $beneficiaire))? 'disabled' : ''}} class="form-check-input" type="radio" name="addiction_cause" id="cause_famille"
                    value="Famille" {{($beneficiaire->addiction_cause == 'Famille')? 'checked': ''}} >
                <label class="form-check-label" for="cause_famille">
                    Famille
                </label>
            </div>
            <div class="form-check d-inline-block">
                <input {{(Auth::user()->cannot('update', $beneficiaire))? 'disabled' : ''}} class="form-check-input" type="radio" name="addiction_cause" id="cause_amis"
                    value="Amis" {{($beneficiaire->addiction_cause == 'Amis')? 'checked': ''}} >
                <label class="form-check-label" for="cause_amis">
                    Amis
                </label>
            </div>
            <div class="form-check d-inline-block">
                <input {{(Auth::user()->cannot('update', $beneficiaire))? 'disabled' : ''}} class="form-check-input" type="radio" name="addiction_cause" id="cause_entourage"
                    value="Entourage" {{($beneficiaire->addiction_cause == 'Entourage')? 'checked': ''}} >
                <label class="form-check-label" for="cause_entourage">
                    Entourage
                </label>
            </div>
            <div class="form-check d-inline-block">
                <input {{(Auth::user()->cannot('update', $beneficiaire))? 'disabled' : ''}} class="form-check-input" type="radio" name="addiction_cause" id="cause_autres"
                    value="Autres" {{($beneficiaire->addiction_cause == 'Autres')? 'checked': ''}} >
                <label class="form-check-label" for="cause_autres">
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
    <label for="duree-addiction-benef" class="form-label">Duree Addiction</label>
    <div class="dure-both">
        <input {{(Auth::user()->cannot('update', $beneficiaire))? 'disabled' : ''}} type="number" name="duree_addiction" class="form-control" id="duree-addiction-benef" value="{{$beneficiaire->duree_addiction}}">
        <select name="unite_addiction" class="form-select unite" aria-label="Default select example" id="unite-addiction-benef">
            <option value="">Selectionner unité</option>
            <option value="jour" {{($beneficiaire->unite_addiction == 'jour')? 'selected' : ''}}>Jour</option>
            <option value="mois" {{($beneficiaire->unite_addiction == 'mois')? 'selected' : ''}}>Mois</option>
            <option value="annee" {{($beneficiaire->unite_addiction == 'annee')? 'selected' : ''}}>Année</option>
        </select>
    </div>
</div>
<fieldset class="row mb-3">
    <legend class="col-form-label col-sm-2 pt-0">TS</legend>
    <div id="sexe-benef" class="col-sm-10">
        <div class="form-check d-inline-block mr-5">
            <input {{(Auth::user()->cannot('update', $beneficiaire))? 'disabled' : ''}} class="form-check-input" type="radio" name="ts" id="ts_oui"
                value="1" {{($beneficiaire->ts == "1")? "checked" : ""}}>
            <label class="form-check-label" for="ts_oui">
                Oui
            </label>
        </div>
        <div class="form-check d-inline-block">
            <input {{(Auth::user()->cannot('update', $beneficiaire))? 'disabled' : ''}} class="form-check-input" type="radio" name="ts" id="ts_non"
                value="0" {{($beneficiaire->ts == "0")? "checked" : ""}}>
            <label class="form-check-label" for="ts_non">
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
                    <th scope="col" colspan="2">Pensée au suicide</th>
                    <th scope="col">Les Causes</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input {{(Auth::user()->cannot('update', $beneficiaire))? 'disabled' : ''}} type="radio" class="form-check-input" name="suicide" id="oui" {{(count($beneficiaire->suicide_causes))? 'checked': ''}}><label for="oui">Oui</label></td>
                    <td><input {{(Auth::user()->cannot('update', $beneficiaire))? 'disabled' : ''}} type="radio" class="form-check-input" name="suicide" id="non" {{(count($beneficiaire->suicide_causes) == 0)? 'checked': ''}}><label for="non">Non</label></td>
                    <td><textarea {{(Auth::user()->cannot('update', $beneficiaire))? 'disabled' : ''}} name="suicide_causes" id="suicide_causes" cols="30" rows="10">{{(count($beneficiaire->suicide_causes))? $beneficiaire->suicide_causes[0]->cause : ''}}</textarea></td>
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
                    <th scope="col"></th>
                    <th scope="col">Services</th>
                    <th>Pole</th>
                </tr>
            </thead>
            <tbody id="tbodyServices">
                @foreach ($services as $service)
                    <tr>
                        <td><input {{(Auth::user()->cannot('update', $beneficiaire))? 'disabled' : ''}} {{($beneficiaire->services->contains($service))? 'checked' : ''}} type="checkbox" class="form-check-input" name="services[]" value="{{$service->id}}" id=""></td>
                        <td>{{$service->service_nom}}</td>
                        <td>
                            <select name="poles[]" class="form-select mb-3" aria-label="Default select example" id="poles">
                                <option value="">Choisir Utilisateur</option>
                                @if ($service->role != null)
                                    @php
                                        if ($service->role->role_nom == 'admin') {
                                            $poles = App\Models\Admin::all();
                                        } elseif ($service->role->role_nom == 'medical assistant') {
                                            $poles = App\Models\MedicalAssistant::all();
                                        } elseif ($service->role->role_nom == 'social assistant') {
                                            $poles = App\Models\SocialAssistant::all();
                                        } elseif ($service->role->role_nom == 'intervenant') {
                                            $poles = App\Models\Intervenant::all();
                                        }
                                    @endphp
                                    @foreach ($poles as $pole)
                                        <option value="{{$pole->user->id}}" {{($beneficiaire->services->contains($service) && $beneficiaire->services->find($service->id)->beneficiaire_service_user->user_id == $pole->user->id) ? 'selected' : ''}}>{{$pole->user->first_name . ' ' . $pole->user->last_name}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>