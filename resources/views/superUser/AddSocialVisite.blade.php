@extends('layouts.app')

@section('title')
Ajout d'une visite sociale
@endsection
@section('content_page')
    <!-- Form Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 id="title-form" class="mb-4">Ajouter Visite Sociale</h6>
                    <form class="form-user" action="" method="POST">
                        <div class="mb-3">
                            <label for="date_visiteS" class="form-label">Date De Visite</label>
                            <input type="date" name="date_visite" class="form-control" id="date_visite">
                        </div>
                        <div class="mb-3">
                            <label for="remarque-visiteS" class="form-label">Remarque de la visite</label>
                            <input type="text" name="remarque" class="form-control" id="remarque-visite" placeholder="Entrez vos remarques">
                        </div>
                        <div class="mb-3">
                            <label for="beneficiaire" class="form-label">Bénéficiaire</label>
                            <select name="beneficiaire" class="form-select" aria-label="Default select example" id="beneficiaire">
                                <option value=""></option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <button id="btn-visite-sociale" class="btn btn-primary">Ajouter</button>
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
    <script src="{{ asset('jsApi/socialeVisite/add-sociale-visite.js') }}"></script>
@endsection
