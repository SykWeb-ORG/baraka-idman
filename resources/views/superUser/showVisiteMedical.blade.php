@extends('layouts.app')

@section('title')
Liste des Visites Medicales
@endsection
@section('content_page')
    <!-- Show All Users Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Toutes Les Visites Medicales</h6>
                {{-- <a href="">Show All</a> --}}
            </div>
            <div class="table-responsive table-height">
                <table class="table text-start align-middle table-bordered table-hover mb-0" id="tableUser">
                    <thead>
                        <tr class="text-dark">
                            <th scope="col">N°</th>
                            <th>Date De Visite</th>
                            <th>Présence</th>
                            <th>Remarque de la visite</th>
                            <th>Bénéficiaire</th>
                            @if (Auth::user()->admin)
                                <th>Assistant Medical</th>
                            @endif
                            <th colspan="2">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="tbl_medicale_visites">
                    </tbody>
                </table>
                <!--Edit Visite Medical-->
                <!-- Modal -->
                <div class="modal fade" id="modal_EditMedicaleVisite" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Modifier Visite Medical</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                </button>
                            </div>
                            <div class="modal-bodyEdit">
                                <form class="form-user" action="" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="date_visite" class="form-label">Date De Visite</label>
                                        <input type="date" name="date_visite" class="form-control" id="date_visite">
                                    </div>
                                    <fieldset class="row mb-3">
                                        <legend class="col-form-label col-sm-2 pt-0">Présence</legend>
                                        <div id="presence-benef">
                                            <div class="form-check d-inline-block mr-5">
                                                <input class="form-check-input" type="radio" name="presence" id="gridRadios1"
                                                    value="Oui">
                                                <label class="form-check-label" for="gridRadios1">
                                                    Oui
                                                </label>
                                            </div>
                                            <div class="form-check d-inline-block">
                                                <input class="form-check-input" type="radio" name="presence" id="gridRadios2"
                                                    value="Non">
                                                <label class="form-check-label" for="gridRadios2">
                                                    Non
                                                </label>
                                            </div>
                                        </div>
                                    </fieldset>
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
                                    <div class="mb-3">
                                        <button id="btn-edit-visite-medical" class="btn btn-primary">Modifier</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Modal-->
                <!--Delete Visite Medical-->
                <!-- Modal -->
                <div class="modal fade" id="modal_DeleteMedicaleVisite" data-bs-backdrop="static" data-bs-keyboard="false"
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
                                        <button id="btn-delete-visite-medical" class="btn btn-secondary">Oui</button>
                                        <button class="btn btn-primary">Non</button>
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
    <script src="{{ asset('jsApi/medicaleVisite/all-medicale-visites.js') }}"></script>
@endsection
