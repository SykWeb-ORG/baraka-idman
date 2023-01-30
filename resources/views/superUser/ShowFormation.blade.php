@extends('layouts.app')

@section('title')
Liste des Formations
@endsection
@section('content_page')
    <!-- Show All Users Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Tous Les Formations </h6>
                {{-- <a href="">Show All</a> --}}
            </div>
            <div class="table-responsive table-height">
                <table class="table text-start align-middle table-bordered table-hover mb-0" id="tableUser">
                    <thead>
                        <tr class="text-dark">
                            <th scope="col">N°</th>
                            <th>Titre de la Formation</th>
                            <th>Date De la Formation</th>
                            <th>Durée De la Formation / jours</th>
                            <th>Organisme chargé de la Formation</th>
                            <th>Formateur</th>
                            <th>Objet</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody id="tbl_formation">
                    </tbody>
                </table>
                <!--Edit Formation-->
                <!-- Modal -->
                <button
                      class="btn btn-sm btn-sm-square btn-primary m-2"type="button"
                      data-bs-toggle="modal" data-bs-target="#modal_ListePart">
                      <i class="fas fa-list"></i>
                  </button>
                <div class="modal" id="modal_ListePart" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Modifier Formation</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                </button>
                            </div>
                            <div class="modal-bodyListe">
                                <div class="table-responsive table-heightPart">
                                    <table class="table text-start align-middle table-bordered table-hover mb-5" id="tableUser">
                                        <thead>
                                            <tr class="text-dark">
                                                <th scope="col">N°</th>
                                                <th>Nom Participant</th>
                                                <th>Prénom Participant</th>
                                                <th>CIN Du Participant / jours</th>
                                                <th>Numéro De téléphone</th>    
                                                <th colspan="2">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbl_participant">
                                            <tr>
                                                <td>zzzzzzzz</td>
                                                <td>zzzzzzzz</td>
                                                <td>zzzzzzzz</td>
                                                <td>zzzzzzzz</td>                                                <td>zzzzzzzz</td>
                                                <td class="actionEdit"><button
                                                    class="btn btn-sm btn-sm-square btn-primary m-2"type="button"
                                                    data-bs-toggle="modal" data-bs-target="#modal_DeleteFormation">
                                                    <i class="fas fa-trash"></i>
                                                </button></td>
                                                <td class="actionDelete"><button
                                                    class="btn btn-sm btn-sm-square btn-primary m-2"type="button"
                                                    data-bs-toggle="modal" data-bs-target="#modal_DeleteFormation">
                                                    <i class="fas fa-trash"></i>
                                                </button></td>
                                            </tr>
                                            <tr>
                                                <td>zzzzzzzz</td>
                                                <td>zzzzzzzz</td>
                                                <td>zzzzzzzz</td>
                                                <td>zzzzzzzz</td>                                                <td>zzzzzzzz</td>
                                                <td class="actionEdit"><button
                                                    class="btn btn-sm btn-sm-square btn-primary m-2"type="button"
                                                    data-bs-toggle="modal" data-bs-target="#modal_DeleteFormation">
                                                    <i class="fas fa-trash"></i>
                                                </button></td>
                                                <td class="actionDelete"><button
                                                    class="btn btn-sm btn-sm-square btn-primary m-2"type="button"
                                                    data-bs-toggle="modal" data-bs-target="#modal_DeleteFormation">
                                                    <i class="fas fa-trash"></i>
                                                </button></td>
                                            </tr>
                                            <tr>
                                                <td>zzzzzzzz</td>
                                                <td>zzzzzzzz</td>
                                                <td>zzzzzzzz</td>
                                                <td>zzzzzzzz</td>                                                <td>zzzzzzzz</td>
                                                <td class="actionEdit"><button
                                                    class="btn btn-sm btn-sm-square btn-primary m-2"type="button"
                                                    data-bs-toggle="modal" data-bs-target="#modal_DeleteFormation">
                                                    <i class="fas fa-trash"></i>
                                                </button></td>
                                                <td class="actionDelete"><button
                                                    class="btn btn-sm btn-sm-square btn-primary m-2"type="button"
                                                    data-bs-toggle="modal" data-bs-target="#modal_DeleteFormation">
                                                    <i class="fas fa-trash"></i>
                                                </button></td>
                                            </tr>
                                            <tr>
                                                <td>zzzzzzzz</td>
                                                <td>zzzzzzzz</td>
                                                <td>zzzzzzzz</td>
                                                <td>zzzzzzzz</td>                                                <td>zzzzzzzz</td>
                                                <td class="actionEdit"><button
                                                    class="btn btn-sm btn-sm-square btn-primary m-2"type="button"
                                                    data-bs-toggle="modal" data-bs-target="#modal_DeleteFormation">
                                                    <i class="fas fa-trash"></i>
                                                </button></td>
                                                <td class="actionDelete"><button
                                                    class="btn btn-sm btn-sm-square btn-primary m-2"type="button"
                                                    data-bs-toggle="modal" data-bs-target="#modal_DeleteFormation">
                                                    <i class="fas fa-trash"></i>
                                                </button></td>
                                            </tr>
                                            <tr>
                                                <td>zzzzzzzz</td>
                                                <td>zzzzzzzz</td>
                                                <td>zzzzzzzz</td>
                                                <td>zzzzzzzz</td>                                                <td>zzzzzzzz</td>
                                                <td class="actionEdit"><button
                                                    class="btn btn-sm btn-sm-square btn-primary m-2"type="button"
                                                    data-bs-toggle="modal" data-bs-target="#modal_DeleteFormation">
                                                    <i class="fas fa-trash"></i>
                                                </button></td>
                                                <td class="actionDelete"><button
                                                    class="btn btn-sm btn-sm-square btn-primary m-2"type="button"
                                                    data-bs-toggle="modal" data-bs-target="#modal_DeleteFormation">
                                                    <i class="fas fa-trash"></i>
                                                </button></td>
                                            </tr>
                                            <tr>
                                                <td>zzzzzzzz</td>
                                                <td>zzzzzzzz</td>
                                                <td>zzzzzzzz</td>
                                                <td>zzzzzzzz</td>                                                <td>zzzzzzzz</td>
                                                <td class="actionEdit"><button
                                                    class="btn btn-sm btn-sm-square btn-primary m-2"type="button"
                                                    data-bs-toggle="modal" data-bs-target="#modal_DeleteFormation">
                                                    <i class="fas fa-trash"></i>
                                                </button></td>
                                                <td class="actionDelete"><button
                                                    class="btn btn-sm btn-sm-square btn-primary m-2"type="button"
                                                    data-bs-toggle="modal" data-bs-target="#modal_DeleteFormation">
                                                    <i class="fas fa-trash"></i>
                                                </button></td>
                                            </tr>
                                            <tr>
                                                <td>zzzzzzzz</td>
                                                <td>zzzzzzzz</td>
                                                <td>zzzzzzzz</td>
                                                <td>zzzzzzzz</td>                                                <td>zzzzzzzz</td>
                                                <td class="actionEdit"><button
                                                    class="btn btn-sm btn-sm-square btn-primary m-2"type="button"
                                                    data-bs-toggle="modal" data-bs-target="#modal_DeleteFormation">
                                                    <i class="fas fa-trash"></i>
                                                </button></td>
                                                <td class="actionDelete"><button
                                                    class="btn btn-sm btn-sm-square btn-primary m-2"type="button"
                                                    data-bs-toggle="modal" data-bs-target="#modal_DeleteFormation">
                                                    <i class="fas fa-trash"></i>
                                                </button></td>
                                            </tr>
                                            <tr>
                                                <td>zzzzzzzz</td>
                                                <td>zzzzzzzz</td>
                                                <td>zzzzzzzz</td>
                                                <td>zzzzzzzz</td>         
                                                <td>zzzzzzzz</td>
                                                <td class="actionEdit"><button
                                                    class="btn btn-sm btn-sm-square btn-primary m-2"type="button"
                                                    data-bs-toggle="modal" data-bs-target="#modal_DeleteFormation">
                                                    <i class="fas fa-trash"></i>
                                                </button></td>
                                                <td class="actionDelete"><button
                                                    class="btn btn-sm btn-sm-square btn-primary m-2"type="button"
                                                    data-bs-toggle="modal" data-bs-target="#modal_DeleteFormation">
                                                    <i class="fas fa-trash"></i>
                                                </button></td>
                                            </tr>
                                            <tr>
                                                <td>zzzzzzzz</td>
                                                <td>zzzzzzzz</td>
                                                <td>zzzzzzzz</td>
                                                <td>zzzzzzzz</td>   
                                                <td>zzzzzzzz</td>
                                                <td class="actionEdit"><button
                                                    class="btn btn-sm btn-sm-square btn-primary m-2"type="button"
                                                    data-bs-toggle="modal" data-bs-target="#modal_DeleteFormation">
                                                    <i class="fas fa-trash"></i>
                                                </button></td>
                                                <td class="actionDelete"><button
                                                    class="btn btn-sm btn-sm-square btn-primary m-2"type="button"
                                                    data-bs-toggle="modal" data-bs-target="#modal_DeleteFormation">
                                                    <i class="fas fa-trash"></i>
                                                </button></td>
                                            </tr>
                                            <tr>
                                                <td>zzzzzzzz</td>
                                                <td>zzzzzzzz</td>
                                                <td>zzzzzzzz</td>
                                                <td>zzzzzzzz</td>
                                                <td>zzzzzzzz</td>
                                                <td class="actionEdit"><button
                                                    class="btn btn-sm btn-sm-square btn-primary m-2"type="button"
                                                    data-bs-toggle="modal" data-bs-target="#modal_DeleteFormation">
                                                    <i class="fas fa-trash"></i>
                                                </button></td>
                                                <td class="actionDelete"><button
                                                    class="btn btn-sm btn-sm-square btn-primary m-2"type="button"
                                                    data-bs-toggle="modal" data-bs-target="#modal_DeleteFormation">
                                                    <i class="fas fa-trash"></i>
                                                </button></td>  
                                            </tr>
                                            <tr>
                                                <td>zzzzzzzz</td>
                                                <td>zzzzzzzz</td>
                                                <td>zzzzzzzz</td>
                                                <td>zzzzzzzz</td>
                                                <td>zzzzzzzz</td>
                                                <td class="actionEdit"><button
                                                    class="btn btn-sm btn-sm-square btn-primary m-2"type="button"
                                                    data-bs-toggle="modal" data-bs-target="#modal_DeleteFormation">
                                                    <i class="fas fa-trash"></i>
                                                </button></td>
                                                <td class="actionDelete"><button
                                                    class="btn btn-sm btn-sm-square btn-primary m-2"type="button"
                                                    data-bs-toggle="modal" data-bs-target="#modal_DeleteFormation">
                                                    <i class="fas fa-trash"></i>
                                                </button></td>
                                           </tr>
                                            <tr>
                                                <td>zzzzzzzz</td>
                                                <td>zzzzzzzz</td>
                                                <td>zzzzzzzz</td>
                                                <td>zzzzzzzz</td>
                                                <td>zzzzzzzz</td>
                                                <td class="actionEdit"><button
                                                    class="btn btn-sm btn-sm-square btn-primary m-2"type="button"
                                                    data-bs-toggle="modal" data-bs-target="#modal_DeleteFormation">
                                                    <i class="fas fa-trash"></i>
                                                </button></td>
                                                <td class="actionDelete"><button
                                                    class="btn btn-sm btn-sm-square btn-primary m-2"type="button"
                                                    data-bs-toggle="modal" data-bs-target="#modal_DeleteFormation">
                                                    <i class="fas fa-trash"></i>
                                                </button></td>
                                            </tr>
                                            <tr>
                                                <td>zzzzzzzz</td>
                                                <td>zzzzzzzz</td>
                                                <td>zzzzzzzz</td>
                                                <td>zzzzzzzz</td>
                                                <td>zzzzzzzz</td>
                                                <td class="actionEdit"><button
                                                    class="btn btn-sm btn-sm-square btn-primary m-2"type="button"
                                                    data-bs-toggle="modal" data-bs-target="#modal_DeleteFormation">
                                                    <i class="fas fa-trash"></i>
                                                </button></td>
                                                <td class="actionDelete"><button
                                                    class="btn btn-sm btn-sm-square btn-primary m-2"type="button"
                                                    data-bs-toggle="modal" data-bs-target="#modal_DeleteFormation">
                                                    <i class="fas fa-trash"></i>
                                                </button></td>
                                            </tr>
                                            <tr>
                                                <td>zzzzzzzz</td>
                                                <td>zzzzzzzz</td>
                                                <td>zzzzzzzz</td>
                                                <td>zzzzzzzz</td>
                                                <td>zzzzzzzz</td>
                                                <td class="actionEdit"><button
                                                    class="btn btn-sm btn-sm-square btn-primary m-2"type="button"
                                                    data-bs-toggle="modal" data-bs-target="#modal_DeleteFormation">
                                                    <i class="fas fa-trash"></i>
                                                </button></td>
                                                <td class="actionDelete"><button
                                                    class="btn btn-sm btn-sm-square btn-primary m-2"type="button"
                                                    data-bs-toggle="modal" data-bs-target="#modal_DeleteFormation">
                                                    <i class="fas fa-trash"></i>
                                                </button></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button
                      class="btn btn-sm btn-sm-square btn-primary m-2"type="button"
                      data-bs-toggle="modal" data-bs-target="#mod">
                      <i class="fas fa-edit"></i>
                  </button>
                <!--End Modal-->
                <!--End Edit Formation-->
                <!--Delete Formation-->
                <!-- Modal -->
                <button
                      class="btn btn-sm btn-sm-square btn-primary m-2"type="button"
                      data-bs-toggle="modal" data-bs-target="#modal_DeleteFormation">
                      <i class="fas fa-trash"></i>
                  </button>
                <div class="modal fade" id="modal_DeleteFormation" data-bs-backdrop="static" data-bs-keyboard="false"
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
                <!--End Delete Formation-->
            </div>
        </div>
    </div>
    <!-- Show All Users End -->
@endsection
@section('custom_scripts')
@endsection
