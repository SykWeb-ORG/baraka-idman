@extends('layouts.app')

@section('title')
Ajout d'un groupe
@endsection
@section('content_page')
    <!-- Form Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 id="title-form" class="mb-4">Ajouter Groupe</h6>
                    <form class="form-user" action="" method="POST">
                        <div class="mb-3">
                            <label for="nom-group" class="form-label">Nom Du Groupe</label>
                            <input type="text" name="nom-group" class="form-control" id="nom-group">
                        </div>
                        <div class="mb-3">
                            <label for="capacity-group" class="form-label">Capacity Du Groupe</label>
                            <input type="number" name="capacity-group" class="form-control" id="capacity-group">
                        </div>
                        <div class="mb-3">
                            <label for="atelier" class="form-label">Atelier</label>
                            <select name="atelier" class="form-select mb-3" aria-label="Default select example" id="atelier">
                                <option selected="">Choisir atelier</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <button id="btn-add-group" class="btn btn-primary">Ajouter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Form End -->
@endsection
@section('custom_scripts')
    <script src="{{ asset('jsApi/group/add-group.js') }}"></script>
@endsection
