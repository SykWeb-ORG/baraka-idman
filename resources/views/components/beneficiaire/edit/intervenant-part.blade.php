<div class="mb-3">
    <label for="matricule-benef" class="form-label">Numéro De Benéficiaire</label>
    <input type="text" name="matricule" class="form-control" id="matricule-benef" value="{{$beneficiaire->nb_dosier}}">
</div>
<div class="mb-3">
    <label for="first-name-benef" class="form-label">Prénom</label>
    <input {{(Auth::user()->cannot('update', $beneficiaire))? 'disabled' : ''}} type="text" name="prenom" class="form-control" id="first-name-benef" value="{{$beneficiaire->prenom}}">
</div>
<div class="mb-3">
    <label for="last-name-benef" class="form-label">Nom</label>
    <input {{(Auth::user()->cannot('update', $beneficiaire))? 'disabled' : ''}} type="text" name="nom" class="form-control" id="last-name-benef" value="{{$beneficiaire->nom}}">
</div>
<div class="mb-3">
    <label for="date-naissance-benef" class="form-label">Date naissance</label>
    <input type="date" name="date_naissance" class="form-control" id="date-naissance-benef" required value="{{ ($beneficiaire->date_naissance)? $beneficiaire->date_naissance : (new \Carbon\Carbon)->today()->format('Y-m-d')}}">
</div>
<div class="mb-3">
    <label for="adresse-benef" class="form-label">Adresse</label>
    <input {{(Auth::user()->cannot('update', $beneficiaire))? 'disabled' : ''}} type="text" name="adresse" class="form-control" id="adresse-benef" value="{{$beneficiaire->adresse}}">
</div>
<fieldset class="row mb-3">
    <legend class="col-form-label col-sm-2 pt-0">Sexe</legend>
    <div id="sexe-benef" class="col-sm-10">
        <div class="form-check d-inline-block mr-5">
            <input {{(Auth::user()->cannot('update', $beneficiaire))? 'disabled' : ''}} class="form-check-input" type="radio" name="sexe" id="sexe_homme"
                value="Homme" {{($beneficiaire->sexe == "Homme")? "checked" : ""}}>
            <label class="form-check-label" for="sexe_homme">
                Homme
            </label>
        </div>
        <div class="form-check d-inline-block">
            <input {{(Auth::user()->cannot('update', $beneficiaire))? 'disabled' : ''}} class="form-check-input" type="radio" name="sexe" id="sexe_femme"
                value="Femme" {{($beneficiaire->sexe == "Femme")? "checked" : ""}}>
            <label class="form-check-label" for="sexe_femme">
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
    <input {{(Auth::user()->cannot('update', $beneficiaire))? 'disabled' : ''}} type="text" name="telephone" class="form-control" id="phone-number-benef" value="{{$beneficiaire->telephone}}">
</div>
<div class="mb-3">
    <label for="type-travail-benef" class="form-label">Type de travail</label>
    <input {{(Auth::user()->cannot('update', $beneficiaire))? 'disabled' : ''}} type="text" name="type_travail" class="form-control" id="type-travail-benef" value="{{$beneficiaire->type_travail}}">
</div>
<div class="mb-3">
    <label for="social-appointment" class="form-label">Date de la visite sociale</label>
    <input type="date" {{(count($beneficiaire->sociale_visites) > 1)? 'disabled': ''}} name="social_visite_date" class="form-control" id="social-appointment" value="{{(count($beneficiaire->sociale_visites) > 0)? $beneficiaire->sociale_visites[0]->visite_date : (new \Carbon\Carbon)->today()->format('Y-m-d')}}" required>
</div>
<div class="mb-3">
    <label for="registred-date" class="form-label">Date d'inscription</label>
    <input type="date" name="registred_date" class="form-control" id="registred-date" required value="{{$beneficiaire->created_at->format('Y-m-d')}}">
</div>
