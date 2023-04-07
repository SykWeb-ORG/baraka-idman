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
                            <th>Description</th>
                            <th>Objectif Du Projet (Sexe)</th>
                            <th>Objectif Du Projet (âge)</th>
                            <th>Progression Du Projet</th>
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
                                        <label for="partenaire" class="form-label">Partenaire:</label>
                                        <input type="text" name="partenaire" class="form-control" id="partenaire">
                                    </div>
                                    <div class="mb-3">
                                        <label for="num_concen" class="form-label">N concention :</label>
                                        <input type="date" name="num_concen" class="form-control" id="num_concen">
                                    </div>
                                    <div class="mb-3">
                                        <label for="titre-prjt" class="form-label">Titre Du Projet :</label>
                                        <input type="number" name="titre-prjt" class="form-control" id="titre-prjt">
                                    </div>
                                    <div class="mb-3">
                                        <label for="desc-prjt" class="form-label">Description Du Projet :</label>
                                        <input type="text" name="desc-prjt" class="form-control" id="desc-prjt">
                                    </div>
                                    <div class="mb-3">
                                        <label for="formateur" class="form-label">Formateur :</label>
                                        <input type="text" name="formateur" class="form-control" id="formateur">
                                    </div>
                                    <div class="mb-3">
                                        <label for="objetcif-sexe" class="form-label">Objectif du Projet (sexe) :</label>
                                        <input class="form-control" type="text" name="objetcif-sexe-homme" id="objetcif-sexe-homme"
                                        value="0">
                                        <label class="form-check-label" for="objetcif-sexe-homme">
                                            Homme
                                        </label>
                                        <input class="form-control" type="text" name="objetcif-sexe-femme" id="objetcif-sexe-femme"
                                            value="0">
                                        <label class="form-check-label" for="objetcif-sexe-femme">
                                            Femme
                                        </label>
                                    </div>
                                    <div class="mb-3">
                                        <label for="objetcif-age" class="form-label">Objectif du Projet (âge) :</label>
                                        <input class="form-control" type="text" name="objetcif-age" id="objetcif-age"
                                        value="0">
                                        <label class="form-check-label" for="objetcif-age">
                                            -15ans
                                        </label>
                                        <input class="form-control" type="text" name="objetcif-age" id="objetcif-age"
                                            value="0">
                                        <label class="form-check-label" for="objetcif-age">
                                            15-18ans
                                        </label>
                                        <input class="form-control" type="text" name="objetcif-age" id="objetcif-age"
                                            value="0">
                                        <label class="form-check-label" for="objetcif-age">
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
    <script src="{{ asset('jsApi/') }}"></script>
@endsection
