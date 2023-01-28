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
                            <th>Assistant Medical</th>
                            <th colspan="2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>22-01-2023</td>
                            <td>Oui</td>
                            <td>azazdz dzdzhdjzd zdzjdjkd adjdkajbda</td>
                            <td>Soufiane</td>
                            <td>Ahmed</td>
                            <td>
                                <!--Edit Visite Medical-->
                                <button type="submit" class="btn btn-sm btn-sm-square btn-primary m-2" data-bs-toggle="modal"
                                    data-bs-target="#modal_EditAtelier"><i class="fas fa-edit"></i></button>
                                <!-- Modal -->
                                <div class="modal fade" id="modal_EditAtelier" data-bs-backdrop="static" data-bs-keyboard="false"
                                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">>
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
                                                        <input type="text" name="beneficiaire" class="form-control" id="beneficiaire">
                                                    </div>
                                                    <div class="mb-3">
                                                        <button id="btn-visite-medical" class="btn btn-primary">Modifier</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--End Modal-->
                            </td>
                            <td>
                                <!--Delete Visite Medical-->
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
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Show All Users End -->
@endsection