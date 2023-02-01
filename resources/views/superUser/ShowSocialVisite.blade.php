@extends('layouts.app')

@section('title')
Liste des Visites Sociales
@endsection
@section('content_page')
    <!-- Show All Users Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Tous Les Visites Sociales </h6>
                {{-- <a href="">Show All</a> --}}
            </div>
            <div class="table-responsive table-height">
                <table class="table text-start align-middle table-bordered table-hover mb-0" id="tableUser">
                    <thead>
                        <tr class="text-dark">
                            <th scope="col">N°</th>
                            <th>Date de la visite</th>
                            <th>Remarque de la visite</th>
                            <th>Bénéficiaire</th>
                            @if (Auth::user()->admin)
                                <th>Assistant Social</th>
                            @endif
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody id="tbl_sociale_visites">
                    </tbody>
                </table>
                <!--Edit Visites Sociales-->
                <!-- Modal -->
                <div class="modal fade" id="modal_EditVisite_Sociale" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Modifier Visite Sociale</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                </button>
                            </div>
                            <div class="modal-bodyEdit">
                                <form class="form-user" action="" method="POST">
                                    <div class="mb-3">
                                        <label for="date_visiteS" class="form-label">Date De Visite</label>
                                        <input type="date" name="date_visite" class="form-control" id="date_visite">
                                    </div>
                                    <div class="mb-3">
                                        <label for="remarque-visiteS" class="form-label">Remarque de la visite</label>
                                        <input type="text" name="remarque" class="form-control" id="remarque-visite" placeholder="Entrez vos remarques">
                                    </div>
                                    <div class="mb-3">
                                        <label for="beneficiaire" class="form-label">Bénéficiaire</label>
                                        <select name="beneficiaire" class="form-select" aria-label="Default select example" id="beneficiaire">
                                            <option value=""></option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <button id="btn-edit-visite-sociale" class="btn btn-primary">Modifier</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Modal-->
                <!--End Edit Visites Sociales-->
                <!--Delete Visites Sociales-->
                <!-- Modal -->
                <div class="modal fade" id="modal_DeleteVisite_sociale" data-bs-backdrop="static" data-bs-keyboard="false"
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
                                        <button id="btn-delete-visite-sociale" class="btn btn-secondary">Oui</button>
                                        <button class="btn btn-primary">Non</button>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Modal-->
                <!--End Delete visite-sociale-->
            </div>
        </div>
    </div>
    <!-- Show All Users End -->
@endsection
@section('custom_scripts')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('jsApi/socialeVisite/all-sociale-visites.js') }}"></script>
@endsection
