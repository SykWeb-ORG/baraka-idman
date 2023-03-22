@extends('layouts.app')

@section('title')
Liste des Visites Juridiques
@endsection
@section('content_page')
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Toutes Les Visites Juridiques</h6>
                {{-- <a href="">Show All</a> --}}
            </div>
            <div class="table-responsive table-height">
                <table class="table text-start align-middle table-bordered table-hover mb-0" id="tableUser">
                    <thead>
                        <tr class="text-dark">
                            <th scope="col">N°</th>
                            <th>Remarque de la visite</th>
                            <th>Bénéficiaire</th>
                            <th>Pièce jointe</th>
                            @if (Auth::user()->admin)
                                <th>Assistant Juridique</th>
                            @endif
                            <th colspan="2" class="actions">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="tbl_juridique_visites">
                    </tbody>
                </table>
                <!--Edit Visite Juridique-->
                <!-- Modal -->
                <div class="modal fade" id="modal_EditVisite_Juridique" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Modifier Visite Juridique</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                </button>
                            </div>
                            <div class="modal-bodyEdit">
                                <form class="form-user" action="" method="POST">
                                    <div class="mb-3">
                                        <label for="remarque-visite" class="form-label">Remarque de la visite</label>
                                        <input type="text" name="remarque" class="form-control" id="remarque-visite">
                                    </div>
                                    <div class="mb-3">
                                        <label for="beneficiaire" class="form-label">Bénéficiaire</label>
                                        <select name="beneficiaire" class="form-select" aria-label="Default select example" id="beneficiaire">
                                            <option value=""></option>
                                        </select>
                                    </div>
                                    <label for="recipient-name" class="form-label">Pièce jointe (optionelle):</label>
                                    <div class="input-group-outline mb-3 d-flex align-items-center justify-content-center">
                                        <input type="file" name="image_url" id="visite-juridique-preuve" hidden onchange="changeTextContent(this, '')">
                                        <label for="visite-juridique-preuve" class="lbl_img_upload">Choisir fichier</label>
                                        <span id="file-chosen"></span>
                                    </div>
                                    <div class="mb-3">
                                        <button id="btn-edit-visite-juridique" class="btn btn-primary">Modifier</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Modal-->
                <!--Delete Visite Juridique-->
                <!-- Modal -->
                <div class="modal fade" id="modal_DeleteVisite_juridique" data-bs-backdrop="static" data-bs-keyboard="false"
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
                                        <button id="btn-delete-visite-Juridique" class="btn btn-secondary" data-bs-dismiss="modal">Oui</button>
                                        <button class="btn btn-primary" data-bs-dismiss="modal">Non</button>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Modal-->
            </div>
        </div>
    </div>
    <!-- Show All Users End -->
@endsection
@section('custom_scripts')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('jsApi/juridiqueVisite/all-juridique-visites.js') }}"></script>
@endsection
