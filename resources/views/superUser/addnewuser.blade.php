@extends('layouts.app')

@section('content_page')
    <!-- Form Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Ajouter Utilisateur</h6>
                    <form>
                        <div class="mb-3">
                            <label for="exampleInputnom" class="form-label">Nom et prénom</label>
                            <input type="text" class="form-control" id="exampleInputnom">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputadresse" class="form-label">Adresse</label>
                            <input type="text" class="form-control" id="exampleInputadresse">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputcin" class="form-label">CIN</label>
                            <input type="text" class="form-control" id="exampleInputcin">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputntel" class="form-label">N° de telephone</label>
                            <input type="number" class="form-control" id="exampleInputntel">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputntel" class="form-label">Rôles</label>
                            <select class="form-select mb-3" aria-label="Default select example">
                                <option selected="">Choisir rôle</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Ajouter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Form End -->
@endsection
