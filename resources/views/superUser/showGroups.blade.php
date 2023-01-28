@extends('layouts.app')

@section('title')
Liste des Groupes
@endsection
@section('content_page')
    <!-- Show All Users Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Tous Les Groupes </h6>
                {{-- <a href="">Show All</a> --}}
            </div>
            <div class="table-responsive table-height">
                <table class="table text-start align-middle table-bordered table-hover mb-0" id="tableUser">
                    <thead>
                        <tr class="text-dark">
                            <th scope="col">N°</th>
                            <th>Nom du groupe</th>
                            <th>Atelier</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody id="tbl_group">
                    </tbody>
                </table>
                <!--Edit Group-->
                <!-- Modal -->
                <div class="modal fade" id="modal_EditGrp" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Modifier Groupe</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                </button>
                            </div>
                            <div class="modal-bodyEdit">
                                <form class="form-user" action="" method="POST">
                                    <div class="mb-3">
                                        <label for="nom-group" class="form-label">Nom Du Groupe</label>
                                        <input type="text" name="nom-group" class="form-control" id="nom-group">
                                    </div>
                                    <div class="mb-3">
                                        <label for="atelier" class="form-label">Atelier</label>
                                        <select name="atelier" class="form-select mb-3" aria-label="Default select example" id="atelier">
                                            <option selected="">Choisir atelier</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <button id="btn-edit-group" class="btn btn-primary">Modifier</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Modal-->
                <!--End Edit Group-->
                <!--Delete Group-->
                <!-- Modal -->
                <div class="modal fade" id="modal_DeleteGrp" data-bs-backdrop="static" data-bs-keyboard="false"
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
                                        <button id="btn-delete-group" class="btn btn-secondary">Oui</button>
                                        <button class="btn btn-primary">Non</button>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Modal-->
                <!--End Delete Group-->
            </div>
        </div>
    </div>
    <!-- Show All Users End -->
@endsection
@section('custom_scripts')
    <script src="{{ asset('jsApi/group/all-groups.js') }}"></script>
@endsection
