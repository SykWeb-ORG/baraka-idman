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
                            <th colspan="2" class="actions">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="tbl_juridique_visites">
                    </tbody>
                </table>
                <!--Edit Visite Juridique-->
                <!-- Modal -->
                <button
                      class="btn btn-sm btn-sm-square btn-primary m-2"type="button"
                      data-bs-toggle="modal" data-bs-target="#modal_EditMedicaleJuridique">
                      <i class="fas fa-edit"></i>
                  </button>
                <div class="modal fade" id="modal_EditMedicaleJuridique" data-bs-backdrop="static" data-bs-keyboard="false"
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
                                    <label for="recipient-name" class="form-label">Pièce jointe:</label>
                                    <div class="input-group-outline mb-3 d-flex align-items-center justify-content-center">
                                        <input type="file" name="image_url" id="service_img" hidden onchange="changeTextContent(this, '')">
                                        <label for="service_img" class="lbl_img_upload">Choisir fichier</label>
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
                <button
                      class="btn btn-sm btn-sm-square btn-primary m-2"type="button"
                      data-bs-toggle="modal" data-bs-target="#modal_DeleteMedicaleJuridique">
                      <i class="fas fa-trash"></i>
                  </button>
                <div class="modal fade" id="modal_DeleteMedicaleJuridique" data-bs-backdrop="static" data-bs-keyboard="false"
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