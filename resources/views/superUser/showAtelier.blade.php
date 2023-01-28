@extends('layouts.app')

@section('title')
Liste des Ateliers
@endsection
@section('content_page')
    <!-- Show All Users Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Tous Les Ateliers </h6>
                {{-- <a href="">Show All</a> --}}
            </div>
            <div class="table-responsive table-height">
                <table class="table text-start align-middle table-bordered table-hover mb-0" id="tableUser">
                    <thead>
                        <tr class="text-dark">
                            <th scope="col">N°</th>
                            <th>Nom d'atelier</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody id="tbl_atelier">
                        <!--Edit Cas-->
                        <button type="submit" class="btn btn-sm btn-sm-square btn-primary m-2" data-bs-toggle="modal"
                            data-bs-target="#modal_EditAtelier"><i class="fas fa-edit"></i></button>
                        <!-- Modal -->
                        <div class="modal fade" id="modal_EditAtelier" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">>
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Modifier Atelier</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                        </button>
                                    </div>
                                    <div class="modal-bodyEdit">
                                        <form class="form-user" action="" method="POST">
                                            <div class="mb-3">
                                                <label for="nom-atelier" class="form-label">Nom d'atelier</label>
                                                <input type="text" name="nom-atelier" class="form-control" id="nom-atelier">
                                            </div>
                                            <div class="mb-3">
                                                <button id="btn-add-atelier" class="btn btn-primary">Ajouter</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End Modal-->
                        <!--End Edit Cas-->
                        <!--Delete Cas-->
                        <button type="submit" class="btn btn-sm btn-sm-square btn-primary m-2" data-bs-toggle="modal"
                            data-bs-target="#modal_DeleteAtelier"><i class="fas fa-trash"></i></button>
                        <!-- Modal -->
                        <div class="modal fade" id="modal_DeleteAtelier" data-bs-backdrop="static" data-bs-keyboard="false"
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
                                                <button id="btn-delete-cas" class="btn btn-secondary">Oui</button>
                                                <button id="btn-delete-cas" class="btn btn-primary">Non</button>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End Modal-->
                        <!--End Delete Cas-->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Show All Users End -->
@endsection
@section('custom_scripts')
    <script src="{{ asset('jsApi/atelier/all-ateliers.js') }}"></script>
@endsection
