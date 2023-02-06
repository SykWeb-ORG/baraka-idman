@extends('layouts.app')

@section('title')
    Liste des Zones
@endsection
@section('content_page')
    <!-- Recent Sales Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Zone d'intervenance</h6>
            </div>
            <div class="table-responsive table-height">
                <table class="table text-start align-middle table-bordered table-hover mb-0" id="tablebenificiere">
                    <thead>
                        <tr class="text-dark">
                            <th scope="col">ID</th>
                            <th scope="col">Nom</th>
                            <th scope="col" colspan="2" class="actions">Action</th>
                        </tr>
                    </thead>
                    <tbody id="tbl_zone">
                            
                    </tbody>
                </table>
                <!--Edit Zone-->
                <!-- Modal -->
                <div class="modal fade" id="modal_EditZone" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Modifier zone</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                </button>
                            </div>
                            <div class="modal-bodyEdit">
                                <form class="form-user" action="" method="POST">
                                    <div class="mb-3">
                                        <label for="nom-zone" class="form-label">Nom de la zone</label>
                                        <input type="text" name="nom-zone" class="form-control" id="nom-zone">
                                    </div>
                                    <div class="mb-3">
                                        <button id="btn-edit-zone" class="btn btn-primary">Modifier</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Modal-->
                <!--End Edit Zone-->
                <!--Delete Zone-->
                <!-- Modal -->
                <div class="modal fade" id="modal_DeleteZone" data-bs-backdrop="static" data-bs-keyboard="false"
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
                                    <button id="btn-delete-zone" class="btn btn-secondary">Oui</button>
                                    <button class="btn btn-primary">Non</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Modal-->
                <!--End Delete Zone-->
            </div>
        </div>
    </div>
    <!-- Recent Sales End -->
@endsection
@section('custom_scripts')
    <script src="{{ asset('jsApi/zone/all-zones.js') }}"></script>
@endsection
