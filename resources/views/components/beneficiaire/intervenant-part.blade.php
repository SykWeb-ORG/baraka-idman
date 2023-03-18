<div class="mb-3">
    <label for="matricule-benef" class="form-label">Numéro De Benéficiaire</label>
    <input type="text" name="matricule" class="form-control" id="matricule-benef">
</div>
<div class="mb-3">
    <label for="first-name-benef" class="form-label">Prénom</label>
    <input type="text" name="prenom" class="form-control" id="first-name-benef">
</div>
<div class="mb-3">
    <label for="last-name-benef" class="form-label">Nom</label>
    <input type="text" name="nom" class="form-control" id="last-name-benef">
</div>
<div class="mb-3">
    <label for="date-naissance-benef" class="form-label">Date naissance</label>
    <input type="date" name="date_naissance" class="form-control" id="date-naissance-benef" required value="{{(new \Carbon\Carbon)->today()->format('Y-m-d')}}">
</div>
<div class="mb-3">
    <label for="adresse-benef" class="form-label">Adresse</label>
    <input type="text" name="adresse" class="form-control" id="adresse-benef">
</div>
<fieldset class="row mb-3">
    <legend class="col-form-label col-sm-2 pt-0">Sexe</legend>
    <div id="sexe-benef" class="col-sm-10">
        <div class="form-check d-inline-block mr-5">
            <input class="form-check-input" type="radio" name="sexe" id="sexe_homme"
                value="Homme">
            <label class="form-check-label" for="sexe_homme">
                Homme
            </label>
        </div>
        <div class="form-check d-inline-block">
            <input class="form-check-input" type="radio" name="sexe" id="sexe_femme"
                value="Femme">
            <label class="form-check-label" for="sexe_femme">
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
    <input type="text" name="telephone" class="form-control" id="phone-number-benef">
</div>
<div class="mb-3">
    <label for="type-travail-benef" class="form-label">Type de travail</label>
    <input type="text" name="type_travail" class="form-control" id="type-travail-benef">
</div>
<div class="mb-3">
    <label for="social-appointment" class="form-label">Date de la visite sociale</label>
    <input type="date" name="social_visite_date" class="form-control" id="social-appointment" required value="{{(new \Carbon\Carbon)->today()->format('Y-m-d')}}">
</div>
<div class="mb-3">
    <label for="registred-date" class="form-label">Date d'inscription</label>
    <input type="date" name="registred_date" class="form-control" id="registred-date" required value="{{(new \Carbon\Carbon)->today()->format('Y-m-d')}}">
</div>
