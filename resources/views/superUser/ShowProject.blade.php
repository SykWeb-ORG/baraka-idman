@extends('layouts.app')

@section('title')
Liste des Projets
@endsection
@section('content_page')
    <!-- Show All Users Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Tous Les Projets </h6>
                {{-- <a href="">Show All</a> --}}
            </div>
            <div class="table-responsive table-height">
                <table class="table text-start align-middle table-bordered table-hover mb-0" id="tableProgramme">
                    <thead>
                        <tr class="text-dark">
                            <th scope="col">N°</th>
                            <th>Partenaire</th>
                            <th>N concention</th>
                            <th>Titre Du Projet</th>
                            <th>Période Du Projet</th>
                            <th>Description</th>
                            <th>Objectif Du Projet (Homme)</th>
                            <th>Objectif Du Projet (Femme)</th>
                            <th>Objectif Du Projet (-15)</th>
                            <th>Objectif Du Projet (15-18)</th>
                            <th>Objectif Du Projet (+18)</th>
                            <th>Status</th>
                            <th colspan="3" class="Qactions">Action</th>
                        </tr>
                    </thead>
                    <tbody id="tbl_projet">
                    </tbody>
                </table>
                <button
                      class="btn btn-primary m-2"type="button"
                      data-bs-toggle="modal" data-bs-target="#modal_Progress">
                      <i class="fas fa-spinner me-2"></i>Afficher
                  </button>
                <!--Progress Modal -->
                <div class="modal fade" id="modal_Progress" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Progression Du Projet</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                </button>
                            </div>
                            <div class="modal-bodyEdit">
                                <div class="mb-3">
                                    <label for="filter-value" class="form-label">Partenaire:</label>
                                    <select type="text" name="" class="form-select" id="filter-value">
                                        <option value="Homme" data-filter="gender">Homme</option>
                                        <option value="Femme" data-filter="gender">Femme</option>
                                        <option value="-15" data-filter="age">-15</option>
                                        <option value="15-18" data-filter="age">15 - 18</option>
                                        <option value="+18" data-filter="age">+18</option>
                                    </select>
                                </div>
                                <div class="circular-progress">
                                    <span class="progress-value">0%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Progress Modal -->
                <!--Edit projet-->
                <!-- Modal -->
                <div class="modal fade" id="modal_Editprojet" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Modifier Programme</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                </button>
                            </div>
                            <div class="modal-bodyEdit">
                                <form class="form-user" action="" method="POST">
                                    <div class="mb-3">
                                        <label for="projet-partenaire" class="form-label">Partenaire:</label>
                                        <select type="text" name="projet_partenaire" class="form-select" id="projet-partenaire">
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="projet-num-concention" class="form-label">N concention :</label>
                                        <input type="text" name="projet_num_concention" class="form-control" id="projet-num-concention">
                                    </div>
                                    <div class="mb-3">
                                        <label for="projet-titre" class="form-label">Titre Du Projet :</label>
                                        <input type="text" name="projet_titre" class="form-control" id="projet-titre">
                                    </div>
                                    <div class="mb-3">
                                        <label for="projet-periode" class="form-label">Période du projet</label>
                                        <input type="date" name="projet_periode" class="form-control" id="projet-periode">
                                    </div>
                                    <div class="mb-3">
                                        <label for="projet-description" class="form-label">Description Du Projet :</label>
                                        <textarea type="text" name="projet_description" class="form-control" id="projet-description">
                                        </textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="objetcif-sexe" class="form-label">Objectif du Projet (sexe) :</label>
                                        <input class="form-control" type="text" name="" id="projet-objectif-homme"
                                        value="0">
                                        <label class="form-check-label" for="projet-objectif-homme">
                                            Homme
                                        </label>
                                        <input class="form-control" type="text" name="objetcif-sexe-femme" id="projet-objectif-femme"
                                            value="0">
                                        <label class="form-check-label" for="projet-objectif-femme">
                                            Femme
                                        </label>
                                    </div>
                                    <div class="mb-3">
                                        <label for="objetcif-age" class="form-label">Objectif du Projet (âge) :</label>
                                        <input class="form-control" type="text" name="objetcif-age" id="projet-objectif-15"
                                        value="0">
                                        <label class="form-check-label" for="projet-objectif-15">
                                            -15ans
                                        </label>
                                        <input class="form-control" type="text" name="objetcif-age" id="projet-objectif-15-18"
                                            value="0">
                                        <label class="form-check-label" for="projet-objectif-15-18">
                                            15-18ans
                                        </label>
                                        <input class="form-control" type="text" name="objetcif-age" id="projet-objectif-18"
                                            value="0">
                                        <label class="form-check-label" for="projet-objectif-18">
                                            +18ans
                                        </label>
                                    </div>
                                    <div class="mb-3">
                                        <button id="btn-edit-projet" class="btn btn-primary">Modifier</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Modal-->
                <!--End Edit projet-->
                <!--Delete projet-->
                <!-- Modal -->
                <div class="modal fade" id="modal_DeleteProjet" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Confirmer Suppression</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                </button>
                            </div>
                            <div class="modal-bodyEdit">
                                    <div class="mb-3 mt-3">
                                        <button id="btn-delete-projet" class="btn btn-secondary" data-bs-dismiss="modal">Oui</button>
                                        <button class="btn btn-primary" data-bs-dismiss="modal">Non</button>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Modal-->
                <!--End Delete Projet-->
            </div>
        </div>
    </div>
    <!-- Show All Users End -->
@endsection
@section('custom_scripts')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script src="{{ asset('jsApi/projet/all-projets.js') }}"></script>
@endsection
