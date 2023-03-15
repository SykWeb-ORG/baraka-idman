@extends('layouts.app')

@section('title')
Ajout d'un Partenaire
@endsection
@section('content_page')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 id="title-form" class="mb-4">Ajouter Partenaire</h6>
                    <form class="form-user" action="" method="POST">
                        <div class="mb-3">
                            <label for="nom-partenaire" class="form-label">Nom Du Partenaire</label>
                            <input type="text" name="nom-partenaire" class="form-control" id="nom-partenaire">
                        </div>
                        <div class="mb-3">
                            <label for="objectif-partenaire" class="form-label">Objectif Du Partenaire</label>
                            <input type="text" name="objectif-partenaire" class="form-control" id="objectif-partenaire">
                        </div>
                        <div class="mb-3">
                            <label for="logo-partenaire" class="form-label">Logo Du Partenaire</label>
                            <input type="file" name="logo-partenaire" class="form-control" id="logo-partenaire">
                        </div>
                        <div class="mb-3">
                            <button id="btn-add-partenaire" class="btn btn-primary">Ajouter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('custom_scripts')
    <script src="{{ asset('jsApi/partenaire/add-partenaire.js') }}"></script>
@endsection
