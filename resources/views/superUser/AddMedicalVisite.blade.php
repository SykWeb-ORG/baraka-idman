@extends('layouts.app')

@section('title')
Ajout d'une visite medicale
@endsection
@section('content_page')
    <!-- Form Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 id="title-form" class="mb-4">Ajouter Visite Medicale</h6>
                    <form class="form-user" action="" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="date_visite" class="form-label">Date De Visite</label>
                            <input type="date" name="date_visite" class="form-control" id="date_visite">
                        </div>
                        <fieldset class="row mb-3">
                            <legend class="col-form-label col-sm-2 pt-0">Présence</legend>
                            <div id="presence-benef" class="col-sm-10">
                                <div class="form-check d-inline-block mr-5">
                                    <input class="form-check-input" type="radio" name="presence" id="gridRadios1"
                                        value="Oui">
                                    <label class="form-check-label" for="gridRadios1">
                                        Oui
                                    </label>
                                </div>
                                <div class="form-check d-inline-block">
                                    <input class="form-check-input" type="radio" name="presence" id="gridRadios2"
                                        value="Non">
                                    <label class="form-check-label" for="gridRadios2">
                                        Non
                                    </label>
                                </div>
                            </div>
                        </fieldset>
                        <div class="mb-3">
                            <label for="remarque-visite" class="form-label">Remarque de la visite</label>
                            <input type="text" name="remarque" class="form-control" id="remarque-visite">
                        </div>
                        <div class="mb-3">
                            <label for="beneficiaire" class="form-label">Bénéficiaire</label>
                            <select name="beneficiaire" class="form-select" aria-label="Default select example" id="beneficiaire">
                                <option value=""></option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <button id="btn-visite-medical" class="btn btn-primary">Ajouter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Form End -->
@endsection
@section('custom_scripts')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('jsApi/medicaleVisite/add-medicale-visite.js') }}"></script>
@endsection
