@extends('layouts.app')

@section('title')
Ajout d'un Programme
@endsection
@section('content_page')
    <!-- Form Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 id="title-form" class="mb-4">Ajouter Programme</h6>
                    <form class="form-user" action="" method="POST">
                        <div class="mb-3">
                            <label for="nom-programme" class="form-label">Nom Du Programme :</label>
                            <input type="text" name="nom-programme" class="form-control" id="nom-programme">
                        </div>
                        <div class="mb-3">
                            <label for="type-programme" class="form-label">Type De Programme :</label>
                            <select type="text" name="type-programme" class="form-control" id="type-programme">
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="partenaire" class="form-label">Partenaire</label>
                            <select name="partenaire" class="form-select" aria-label="Default select example" id="partenaire">
                                <option value="">Selectionner un partenaire</option>
                            </select>
                        </div>
                        <div class="place">
                            <legend>Ajouter Place</legend>
                            <div class="form-part flex-column">
                                <div class="mb-3">
                                    <label for="nom-place" class="form-label">Nom:</label>
                                    <input type="text" name="nom-place" class="form-control" id="nom-place">
                                </div>
                                <div class="mb-3">
                                    <label for="date-programme" class="form-label">Date programme:</label>
                                    <input type="date" name="date-programme" class="form-control" id="date-programme">
                                </div>
                                <div class="mb-3">
                                    <label for="resultat-programme" class="form-label">Résultat:</label>
                                    <input type="text" name="resultat-programme" class="form-control" id="resultat-programme">
                                </div>
                            </div>
                            <div class="mb-3">
                                <button id="btn-add-place" class="btn btn-primary" data-action="add">Ajouter Place</button>
                            </div>
                        </div>
                        <table class="table text-start align-middle table-bordered table-hover mb-5" id="tableUser">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col">N°</th>
                                    <th>Nom Place</th>
                                    <th>Date programme</th>
                                    <th>Résultat</th>
                                    <th colspan="2" class="actions">Action</th>
                                </tr>
                            </thead>
                            <tbody id="tbl_place">
                            </tbody>
                        </table>
                        <div class="mb-3">
                            <button id="btn-add-programme" class="btn btn-primary">Ajouter Programme</button>
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
    <script src="{{ asset('jsApi/programme/add-programme.js') }}"></script>
@endsection
