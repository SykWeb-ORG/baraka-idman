@extends('layouts.app')

@section('title')
Ajout d'une recherche scientifique
@endsection
@section('content_page')
    <!-- Form Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 id="title-form" class="mb-4">Ajouter recherche scientifique</h6>
                    <form class="form-user" action="" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nom-recherche" class="form-label">Nom de recherche</label>
                            <input type="text" name="nom-recherche" class="form-control" id="nom-recherche">
                        </div>
                        <div class="mb-3">
                            <label for="rapport_file" class="form-label">support</label>
                            <input type="file" name="rapport_file" class="form-control" id="rapport_file">
                        </div>
                        <div class="mb-3">
                            <button id="btn-visite-medical" class="btn btn-primary" onclick="alert('Bien ajouté')">Ajouter</button>
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
