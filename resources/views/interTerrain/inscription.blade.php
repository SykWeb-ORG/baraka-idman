@extends('layouts.app')

@section('content_page')
    <!-- Form Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Inscription Form</h6>
                    <form class="form-benefaicaire">
                        <div class="mb-3">
                            <label for="code-benef" class="form-label">Code Bénéfaicre</label>
                            <input type="text" class="form-control" id="code-benef">
                        </div>
                        <div class="mb-3">
                            <label for="first-name-benef" class="form-label">Prénom</label>
                            <input type="text" class="form-control" id="first-name-benef">
                        </div>
                        <div class="mb-3">
                            <label for="last-name-benef" class="form-label">Nom</label>
                            <input type="text" class="form-control" id="last-name-benef">
                        </div>
                        <div class="mb-3">
                            <label for="adresse-benef" class="form-label">Adresse</label>
                            <input type="text" class="form-control" id="adresse-benef">
                        </div>
                        <fieldset class="row mb-3">
                            <legend class="col-form-label col-sm-2 pt-0">Sexe</legend>
                            <div id="sexe-benef" class="col-sm-10">
                                <div class="form-check d-inline-block mr-5">
                                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1"
                                        value="Homme">
                                    <label class="form-check-label" for="gridRadios1">
                                        Homme
                                    </label>
                                </div>
                                <div class="form-check d-inline-block">
                                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2"
                                        value="Femme">
                                    <label class="form-check-label" for="gridRadios2">
                                        Femme
                                    </label>
                                </div>
                            </div>
                        </fieldset>
                        <div class="mb-3">
                            <label for="cin-benef" class="form-label">CIN</label>
                            <input type="text" class="form-control" id="cin-benef">
                        </div>
                        <div class="mb-3">
                            <label for="phone-number-benef" class="form-label">N° de telephone</label>
                            <input type="number" class="form-control" id="phone-number-benef">
                        </div>
                        <div class="mb-3">
                            <label for="type-travail-benef" class="form-label">Type de travail</label>
                            <input type="text" class="form-control" id="type-travail-benef">
                        </div>
                        <div class="mb-3">
                            <label for="intervenant-benef" class="form-label">Intervenant</label>
                            <input type="text" class="form-control" id="intervenant-benef">
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
@endsection

@section('custom_scripts')
<script src="{{asset("jsApi/intervenant/manipDataInter.js")}}"></script>
@endsection