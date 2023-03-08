@extends('layouts.app')

@section('title')
Ajout d'un rapport
@endsection
@section('content_page')
    <!-- Form Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 id="title-form" class="mb-4">Ajouter rapport</h6>
                    <form class="form-user" action="" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="rapport_file" class="form-label">Rapport</label>
                            <input type="file" name="rapport_file" class="form-control" id="rapport_file">
                        </div>
                        <div class="mb-3">
                            <label for="beneficiaire" class="form-label">Bénéficiaire</label>
                            <select name="beneficiaire" class="form-select" aria-label="Default select example" id="beneficiaire">
                                <option value=""></option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <button id="btn-visite-medical" class="btn btn-primary" onclick="alert('Bien téléchargé')">Ajouter</button>
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
