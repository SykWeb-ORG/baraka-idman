@extends('layouts.app')

@section('title')
Ajout d'une Formation
@endsection
@section('content_page')
    <!-- Form Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 id="title-form" class="mb-4">Ajouter Formation</h6>
                    <form class="form-user" action="" method="POST">
                        <div class="mb-3">
                            <label for="titre-formation" class="form-label">Titre De la Formation :</label>
                            <input type="text" name="titre-formation" class="form-control" id="titre-formation">
                        </div>
                        <div class="mb-3">
                            <label for="date_formation" class="form-label">Date De la Formation :</label>
                            <input type="date" name="date_formation" class="form-control" id="date_formation">
                        </div>
                        <div class="mb-3">
                            <label for="durée_formation" class="form-label">Durée De la Formation par jours :</label>
                            <input type="number" name="durée_formation" class="form-control" id="duree_formation">
                        </div>
                        <div class="mb-3">
                            <label for="organisme-formation" class="form-label">Organisme chargé de la Formation :</label>
                            <input type="text" name="organisme-formation" class="form-control" id="organisme-formation">
                        </div>
                        <div class="mb-3">
                            <label for="formateur" class="form-label">Formateur :</label>
                            <input type="text" name="formateur" class="form-control" id="formateur">
                        </div>
                        <div class="mb-3">
                            <label for="objet" class="form-label">Objet :</label>
                            <input type="text" name="objet" class="form-control" id="objet">
                        </div>
                        <div class="participant">
                            <legend>Ajouter Participant</legend>
                            <div class="form-part">
                                <div class="mb-3">
                                    <label for="nom-participant" class="form-label">Nom :</label>
                                    <input type="text" name="nom-participant" class="form-control" id="nom-participant">
                                </div>
                                <div class="mb-3">
                                    <label for="prenom-participant" class="form-label">Prénom :</label>
                                    <input type="text" name="prenom-participant" class="form-control" id="prenom-participant">
                                </div>
                                <div class="mb-3">
                                    <label for="cin_participant" class="form-label">CIN :</label>
                                    <input type="text" name="cin_participant" class="form-control" id="cin_participant">
                                </div>
                                <div class="mb-3">
                                    <label for="numero-participant" class="form-label">Numéro de téléphone :</label>
                                    <input type="number" name="numero-participant" class="form-control" id="numero-participant">
                                </div>
                            </div>
                            <div class="mb-3">
                                <button id="btn-add-group" class="btn btn-primary">Ajouter Participant</button>
                            </div>
                        </div>
                        <table class="table text-start align-middle table-bordered table-hover mb-5" id="tableUser">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col">N°</th>
                                    <th>Nom Participant</th>
                                    <th>Prénom Participant</th>
                                    <th>CIN Du Participant / jours</th>
                                    <th>Numéro De téléphone</th>    
                                    <th colspan="2" class="actions">Action</th>
                                </tr>
                            </thead>
                            <tbody id="tbl_participant">
                            </tbody>
                        </table>
                        <div class="mb-3">
                            <button id="btn-add-formation" class="btn btn-primary">Ajouter Formation</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Form End -->
@endsection
@section('custom_scripts')
    <script src="{{ asset('jsApi/formations/addFormation.js') }}"></script>
@endsection
