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
                            <th>Heure De la Formation</th>
                            <th>Durée De la Formation / jours</th>
                            <th>Organisme chargé de la Formation</th>
                            <th>Formateur</th>
                            <th>Objet</th>
                            <th colspan="3" class="Qactions">Action</th>
                        </tr>
                    </thead>
                    <tbody id="tbl_formation">
                    </tbody>
                </table>
                <!--List Participant-->
                <!-- Modal -->
                <div class="modal" id="modal_ListePart" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Liste Participants</h5>
                                <button id="btn-show-modal-add-participant" class="btn btn-sm btn-sm-square btn-primary m-2"type="button"
                                        data-bs-toggle="modal" data-bs-target="#modal_Editparticipant">
                                    <i class="fas fa-plus"></i>
                                </button>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                </button>
                            </div>
                            <div class="modal-bodyListe">
                                <div class="table-responsive table-heightPart">
                                    <table class="table text-start align-middle table-bordered table-hover mb-5"
                                        id="tableUser">
                                        <thead>
                                            <tr class="text-dark">
                                                <th scope="col">N°</th>
                                                <th>Nom Participant</th>
                                                <th>Prénom Participant</th>
                                                <th>CIN Du Participant / jours</th>
                                                <th>Numéro De téléphone</th>
                                                <th colspan="2" class="actions">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbl_participant">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Modal-->
                <!--End List Part-->
                <!--Delete Formation-->
                <!-- Modal -->
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
                                    <button id="btn-delete-formation" class="btn btn-secondary" data-bs-dismiss="modal">Oui</button>
                                    <button class="btn btn-primary" data-bs-dismiss="modal">Non</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Modal-->
                <!--End Delete Formation-->
                <!--Edit Formation-->
                <!-- Modal -->
                <div class="modal fade" id="modal_EditFormation" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Modifier Formation</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                </button>
                            </div>
                            <div class="modal-bodyEdit">
                                <form class="form-user" action="" method="POST">
                                    <div class="mb-3">
                                        <label for="titre-formation" class="form-label">Titre De la Formation :</label>
                                        <input type="text" name="titre-formation" class="form-control" id="titre-formation">
                                    </div>
                                    <div class="mb-3">
                                        <label for="date_formation" class="form-label">Date De la Formation :</label>
                                        <input type="date" name="date_formation" class="form-control" id="date_formation">
                                    </div>
                                    <div class="mb-3">
                                        <label for="heure_formation" class="form-label">Heure De la Formation :</label>
                                        <input type="time" name="heure_formation" class="form-control" id="heure_formation">
                                    </div>
                                    <div class="mb-3">
                                        <label for="duree_formation" class="form-label">Durée De la Formation par jours :</label>
                                        <input type="number" name="duree_formation" class="form-control" id="duree_formation">
                                    </div>
                                    <div class="mb-3">
                                        <label for="organisme-formation" class="form-label">Organisme chargé de la Formation :</label>
                                        <input type="text" name="organisme-formation" class="form-control" id="organisme-formation">
                                    </div>
                                    <div class="mb-3">
                                        <label for="formateur" class="form-label">Formateur :</label>
                                        <input type="text" name="formateur" class="form-control" id="formateur">
                                    </div>
                                    <div class="mb-3">
                                        <label for="objet" class="form-label">Objet :</label>
                                        <input type="text" name="objet" class="form-control" id="objet">
                                    </div>
                                    <div class="mb-3">
                                        <button id="btn-edit-formation" class="btn btn-primary">Modifier</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Modal-->
                <!--End Edit Formationm-->
                <!--Edit participant-->
                <!-- Modal -->
                <div class="modal fade" id="modal_Editparticipant" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="participant-modal-title">Modifier participant</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                </button>
                            </div>
                            <div class="modal-bodyEdit">
                                <form id="form-participant" class="form-user" action="" method="POST">
                                    <div class="mb-3">
                                        <label for="nom-participant" class="form-label">Nom :</label>
                                        <input type="text" name="nom-participant" class="form-control"
                                            id="nom-participant">
                                    </div>
                                    <div class="mb-3">
                                        <label for="prenom-participant" class="form-label">Prénom :</label>
                                        <input type="text" name="prenom-participant" class="form-control"
                                            id="prenom-participant">
                                    </div>
                                    <div class="mb-3">
                                        <label for="cin_participant" class="form-label">CIN :</label>
                                        <input type="text" name="cin_participant" class="form-control"
                                            id="cin_participant">
                                    </div>
                                    <div class="mb-3">
                                        <label for="numero-participant" class="form-label">Numéro de téléphone :</label>
                                        <input type="number" name="numero-participant" class="form-control"
                                            id="numero-participant">
                                    </div>
                                    <div class="mb-3">
                                        <button id="btn-add-participant" class="btn btn-primary" data-action="add">Ajouter</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Modal-->
                <!--End Edit Participant-->
            </div>
        </div>
    </div>
    <!-- Show All Users End -->
@endsection
@section('custom_scripts')
    <script src="{{ asset('jsApi/formations/all-formations.js') }}"></script>
@endsection
