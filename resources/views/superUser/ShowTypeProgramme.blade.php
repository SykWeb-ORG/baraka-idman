@extends('layouts.app')

@section('title')
    Liste des Types De Programmes
@endsection
@section('content_page')
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Tous Les Types De Programme </h6>
            </div>
            <div class="table-responsive table-height">
                <table class="table text-start align-middle table-bordered table-hover mb-0" id="tableUser">
                    <thead>
                        <tr class="text-dark">
                            <th scope="col">N°</th>
                            <th>Nom Du Type De Programme</th>
                            <th colspan="2" class="actions">Action</th>
                        </tr>
                    </thead>
                    <tbody id="tbl_programme_types">
                    </tbody>
                </table>
                <!--Edit Type De Programme-->
                <!-- Modal -->
                <div class="modal fade" id="modal_EditTypeProgramme" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Modifier Type De Programme</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                </button>
                            </div>
                            <div class="modal-bodyEdit">
                                <form class="form-user" action="" method="POST">
                                    <div class="mb-3">
                                        <label for="programme_type_nom" class="form-label">Nom du Type De Programme</label>
                                        <input type="text" name="programme_type_nom" class="form-control" id="programme_type_nom">
                                    </div>
                                    <div class="mb-3">
                                        <button id="btn-edit-programme-type" class="btn btn-primary">Modifier</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Modal-->
                <!--End Edit Type De Programme-->
                <!--Delete Type De Programme-->
                <!-- Modal -->
                <div class="modal fade" id="modal_DeleteTypeProgramme" data-bs-backdrop="static" data-bs-keyboard="false"
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
                                        <button id="btn-delete-programme-type" class="btn btn-secondary">Oui</button>
                                        <button class="btn btn-primary">Non</button>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Modal-->
                <!--End Delete Type De Programme-->
            </div>
        </div>
    </div>
@endsection
@section('custom_scripts')
    <script src="{{ asset('jsApi/') }}"></script>
@endsection
