@extends('layouts.app')

@section('title')
    Liste des Partenaires
@endsection
@section('content_page')
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Tous Les Partenaires </h6>
            </div>
            <div class="table-responsive table-height">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr class="text-dark">
                            <th scope="col">N°</th>
                            <th>Nom Du Partenaire</th>
                            <th>Objectif Du Partenaire</th>
                            <th>Logo Du Partenaire</th>
                            <th colspan="2" class="actions">Action</th>
                        </tr>
                    </thead>
                    <tbody id="tbl_partenaire">
                    </tbody>
                </table>
                <!--Edit Cas-->
                <!-- Modal -->
                <div class="modal fade" id="modal_EditPartenaire" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Modifier Couverture Médicale</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                </button>
                            </div>
                            <div class="modal-bodyEdit">
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
                                        <button id="btn-edit-partenaire" class="btn btn-primary">Modifier</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Modal-->
                <!--End Edit Service-->
                <!--Delete Service-->
                <!-- Modal -->
                <div class="modal fade" id="modal_DeletePartenaire" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">>
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Confirmer Suppression</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                </button>
                            </div>
                            <div class="modal-bodyEdit">
                                    <div class="mb-3 mt-3">
                                        <button id="btn-delete-partenaire" class="btn btn-secondary" data-bs-dismiss="modal">Oui</button>
                                        <button class="btn btn-primary" data-bs-dismiss="modal">Non</button>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Modal-->
                <!--End Delete Couverture Médicale-->
            </div>
        </div>
    </div>
@endsection
@section('custom_scripts')
    <script src="{{ asset('jsApi/partenaire/all-partenaires.js') }}"></script>
@endsection

