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
                            <th colspan="3">Action</th>
                        </tr>
                    </thead>
                    <tbody id="tbl_formation">
                    </tbody>
                </table>
                <!--Edit List Participants-->
                <!-- Modal -->
                <x-modal-box-for-operation id="modal_ListePart" class="modal-lg">
                    <x-slot name='modaltitle'>
                        Liste des participants
                    </x-slot>
                    <x-slot name='modalbody'>
                        <div class="modal-bodyEdit">
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
                                            <td>zzzzzzzz</td>
                                            <td>zzzzzzzz</td>
                                            <td class="actionEdit"><button
                                                    class="btn btn-sm btn-sm-square btn-primary m-2"type="button"
                                                    data-bs-toggle="modal" data-bs-target="#modal_DeleteFormation">
                                                    <i class="fas fa-edit"></i>
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
                    </x-slot>
                </x-modal-box-for-operation>
                <!--End Modal-->
                <!--End List Participants-->

                <!-- Edit Formation -->
                <!-- Modal -->
                <x-modal-box-for-operation id="modal_EditFormation">
                    <x-slot name='modaltitle'>
                        Modifier Formation
                    </x-slot>
                    <x-slot name='modalbody'>
                        <div class="modal-bodyEdit">
                            <div class="mb-3 mt-3">
                                <button id="btn-edit-formation" class="btn btn-secondary">Modifier</button>
                            </div>
                        </div>
                    </x-slot>
                </x-modal-box-for-operation>
                <!-- End Edit Formation -->


                <!--Delete Formation-->
                <!-- Modal -->
                <x-modal-box-for-operation id="modal_DeleteFormation">
                    <x-slot name='modaltitle'>
                        Confirmer Suppression
                    </x-slot>
                    <x-slot name='modalbody'>
                        <div class="modal-bodyEdit">
                            <div class="mb-3 mt-3">
                                <button id="btn-delete-group" class="btn btn-secondary">Oui</button>
                                <button class="btn btn-primary">Non</button>
                            </div>
                        </div>
                    </x-slot>
                </x-modal-box-for-operation>
                <!--End Modal-->
                <!--End Delete Formation-->
            </div>
        </div>
    </div>
    <!-- Show All Users End -->
@endsection
@section('custom_scripts')
    <script src="{{ asset('jsApi/formations/allFormations.js') }}"></script>
@endsection
