@extends('layouts.app')

@section('title')
Liste des Programs
@endsection
@section('content_page')
    <!-- Show All Users Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Tous Les Programs </h6>
                {{-- <a href="">Show All</a> --}}
            </div>
            <div class="table-responsive table-height">
                <table class="table text-start align-middle table-bordered table-hover mb-0" id="tableProgramme">
                    <thead>
                        <tr class="text-dark">
                            <th scope="col">N°</th>
                            <th>Nom du Programme</th>
                            <th>Type Du Programme</th>
                            <th colspan="3" class="actions">Action</th>
                        </tr>
                    </thead>
                    <tbody id="tbl_programme">
                    </tbody>
                </table>
                <!--List Place-->
                <!-- Modal -->
                <div class="modal" id="modal_ListePlace" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Liste Place</h5>
                                <button id="btn-show-modal-add-place" class="btn btn-sm btn-sm-square btn-primary m-2"type="button"
                                        data-bs-toggle="modal" data-bs-target="#modal_EditPlace">
                                    <i class="fas fa-plus"></i>
                                </button>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                </button>
                            </div>
                            <div class="modal-bodyListe">
                                <div class="table-responsive table-heightPlace">
                                    <table class="table text-start align-middle table-bordered table-hover mb-5" id="tablePlaces">
                                        <thead>
                                            <tr class="text-dark">
                                                <th scope="col">N°</th>
                                                <th>Nom Place</th> 
                                                <th>Date programme</th> 
                                                <th>Résultat</th>
                                                <th colspan="2" class="actions">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbl_place">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Edit place-->
                <!-- Modal -->
                <div class="modal fade" id="modal_EditPlace" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="place-modal-title">Modifier Place</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                </button>
                            </div>
                            <div class="modal-bodyEdit">
                                <form id="form-place" class="form-user" action="" method="POST">
                                    <div class="mb-3">
                                        <label for="nom-place" class="form-label">Nom Du place</label>
                                        <input type="text" name="nom-place" class="form-control" id="nom-place">
                                    </div>
                                    <div class="mb-3">
                                        <label for="date-programme" class="form-label">Date programme:</label>
                                        <input type="date" name="date-programme" class="form-control" id="date-programme">
                                    </div>
                                    <div class="mb-3">
                                        <label for="resultat-programme" class="form-label">Résultat:</label>
                                        <input type="text" name="resultat-programme" class="form-control" id="resultat-programme">
                                    </div>
                                    <div class="mb-3">
                                        <button id="btn-add-place" class="btn btn-primary" data-action="add">Ajouter place</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Modal-->
                <!--End Edit Place-->
                <!--End Modal-->
                <!--End List Place-->
                <!--Edit Program-->
                <!-- Modal -->
                <div class="modal fade" id="modal_EditPrgrm" data-bs-backdrop="static" data-bs-keyboard="false"
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
                                        <label for="nom-program" class="form-label">Nom Du Programme</label>
                                        <input type="text" name="nom-program" class="form-control" id="nom-program">
                                    </div>
                                    <div class="mb-3">
                                        <label for="type-programme" class="form-label">Type Du Programme</label>
                                        <select type="text" name="type-programme" class="form-control" id="type-programme">
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <button id="btn-edit-program" class="btn btn-primary">Modifier</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Modal-->
                <!--End Edit Programm-->
                <!--Delete Program-->
                <!-- Modal -->
                <div class="modal fade" id="modal_DeleteProgram" data-bs-backdrop="static" data-bs-keyboard="false"
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
                                        <button id="btn-delete-program" class="btn btn-secondary" data-bs-dismiss="modal">Oui</button>
                                        <button class="btn btn-primary" data-bs-dismiss="modal">Non</button>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Modal-->
                <!--End Delete Program-->
            </div>
        </div>
    </div>
    <!-- Show All Users End -->
@endsection
@section('custom_scripts')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('jsApi/programme/all-programmes.js') }}"></script>
@endsection
