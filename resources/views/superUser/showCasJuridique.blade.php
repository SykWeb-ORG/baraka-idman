@extends('layouts.app')

@section('title')
    Liste des Cas Juridique
@endsection
@section('content_page')
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Tous Les Cas Juridique </h6>
            </div>
            <div class="table-responsive table-height">
                <table class="table text-start align-middle table-bordered table-hover mb-0" id="tableUser">
                    <thead>
                        <tr class="text-dark">
                            <th scope="col">N°</th>
                            <th>Nom Du Cas Juridique</th>
                            <th colspan="2" class="Qactions">Action</th>
                        </tr>
                    </thead>
                    <tbody id="tbl_cas_juridique">
                    </tbody>
                </table>
                <!--Edit Cas-->
                <!-- Modal -->
                <div class="modal fade" id="modal_Edit" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Modifier Cas Juridique</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                </button>
                            </div>
                            <div class="modal-bodyEdit">
                                <form class="form-user" action="" method="POST">
                                    <div class="mb-3">
                                        <label for="nom-cas" class="form-label">Nom du Cas Juridique</label>
                                        <input type="text" name="nom-cas" class="form-control" id="nom-cas">
                                    </div>
                                    <div class="mb-3">
                                        <button id="btn-edit-cas" class="btn btn-primary">Modifier</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Modal-->
                <!--End Edit Cas-->
                <!--Delete Cas-->
                <!-- Modal -->
                <div class="modal fade" id="modal_Delete" data-bs-backdrop="static" data-bs-keyboard="false"
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
                                        <button id="btn-delete-cas" class="btn btn-secondary" data-bs-dismiss="modal">Oui</button>
                                        <button class="btn btn-primary" data-bs-dismiss="modal">Non</button>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Modal-->
                <!--End Delete Cas-->
            </div>
        </div>
    </div>
@endsection
@section('custom_scripts')
    <script src="{{ asset('jsApi/cas/all-cas.js') }}"></script>
@endsection
