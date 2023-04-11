@extends('layouts.app')

@section('title')
Ajout d'un projet
@endsection
@section('content_page')
    <!-- Form Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 id="title-form" class="mb-4">Ajouter projet</h6>
                    <form class="form-user form-projet" action="" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="projet-partenaire" class="form-label">Partenaire</label>
                            <select type="text" name="projet_partenaire" class="form-control" id="projet-partenaire">
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="projet-num-concention" class="form-label">N concention</label>
                            <input type="text" name="projet_num_concention" class="form-control" id="projet-num-concention">
                        </div>
                        <div class="mb-3">
                            <label for="projet-titre" class="form-label">Titre du projet</label>
                            <input type="text" name="projet_titre" class="form-control" id="projet-titre">
                        </div>
                        <div class="mb-3">
                            <label for="projet-periode" class="form-label">Période du projet</label>
                            <input type="date" name="projet_periode" class="form-control" id="projet-periode">
                        </div>
                        <div class="mb-3">
                            <label for="projet-description" class="form-label">Description</label>
                            <textarea name="projet_description" class="form-control" id="projet-description"></textarea>
                        </div>
                        <fieldset class="row mb-3">
                            <legend class="col-form-label col-sm-2 pt-0">Objectif du projet (sexe)</legend>
                            <div id="presence-benef" class="col-sm-10">
                                <div class="form-check d-inline-block mr-5">
                                    <input class="form-control" type="text" name="" id="projet-objectif-homme"
                                        value="0">
                                    <label class="form-check-label" for="projet-objectif-homme">
                                        Homme
                                    </label>
                                </div>
                                <div class="form-check d-inline-block">
                                    <input class="form-control" type="text" name="" id="projet-objectif-femme"
                                        value="0">
                                    <label class="form-check-label" for="projet-objectif-femme">
                                        Femme
                                    </label>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset class="row mb-3">
                            <legend class="col-form-label col-sm-2 pt-0">Objectif du projet (age)</legend>
                            <div id="presence-benef" class="col-sm-10">
                                <div class="form-check d-inline-block mr-5">
                                    <input class="form-control" type="text" name="" id="projet-objectif-15"
                                        value="0">
                                    <label class="form-check-label" for="projet-objectif-15">
                                        -15 ans
                                    </label>
                                </div>
                                <div class="form-check d-inline-block">
                                    <input class="form-control" type="text" name="" id="projet-objectif-15-18"
                                        value="0">
                                    <label class="form-check-label" for="projet-objectif-15-18">
                                        15-18 ans
                                    </label>
                                </div>
                                <div class="form-check d-inline-block">
                                    <input class="form-control" type="text" name="" id="projet-objectif-18"
                                        value="0">
                                    <label class="form-check-label" for="projet-objectif-18">
                                        +18 ans
                                    </label>
                                </div>
                            </div>
                        </fieldset>
                        {{-- <label for="evolution" class="form-label">Progression</label>
                        <div class="progress mb-3">
                            <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                        </div> --}}
                        <div class="mb-3">
                            <button id="btn-add-projet" class="btn btn-primary" onclick="alert('Bien ajouté')">Ajouter</button>
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
    <script src="{{ asset('jsApi/projet/add-projet.js') }}"></script>
@endsection
