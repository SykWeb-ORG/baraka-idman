@extends('layouts.app')

@section('title')
    Liste des Types De Drogue
@endsection
@section('content_page')
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Tous Les Types De Drogue </h6>
            </div>
            <div class="table-responsive table-height">
                <table class="table text-start align-middle table-bordered table-hover mb-0" id="tableUser">
                    <thead>
                        <tr class="text-dark">
                            <th scope="col">N°</th>
                            <th>Nom Du Type De Drogue</th>
                            <th colspan="2" class="actions">Action</th>
                        </tr>
                    </thead>
                    <tbody id="tbl_type-drogue">
                    </tbody>
                </table>
                <!--Edit Type De Drogue-->
                <button
                      class="btn btn-sm btn-sm-square btn-primary m-2"type="button"
                      data-bs-toggle="modal" data-bs-target="#modal_EditTypeDrogue">
                      <i class="fas fa-edit"></i>
                  </button>
                <!-- Modal -->
                <div class="modal fade" id="modal_EditTypeDrogue" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Modifier Type De Drogue</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                </button>
                            </div>
                            <div class="modal-bodyEdit">
                                <form class="form-user" action="" method="POST">
                                    <div class="mb-3">
                                        <label for="nom-type-drogue" class="form-label">Nom du Type De Drogue</label>
                                        <input type="text" name="nom-type-drogue" class="form-control" id="nom-type-drogue">
                                    </div>
                                    <div class="mb-3">
                                        <button id="btn-edit-type-drogue" class="btn btn-primary">Modifier</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Modal-->
                <!--End Edit Type De Drogue-->
                <!--Delete Type De Drogue-->
                <button class="btn btn-sm btn-sm-square btn-primary m-2"type="button" data-bs-toggle="modal"
                    data-bs-target="#modal_DeleteTypeDrogue">
                    <i class="fas fa-trash"></i>
                </button>
                <!-- Modal -->
                <div class="modal fade" id="modal_DeleteTypeDrogue" data-bs-backdrop="static" data-bs-keyboard="false"
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
                                        <button id="btn-delete-type-drogue" class="btn btn-secondary">Oui</button>
                                        <button id="btn-delete-type-drogue" class="btn btn-primary">Non</button>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Modal-->
                <!--End Delete Type De Drogue-->
            </div>
        </div>
    </div>
@endsection
