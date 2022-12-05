@extends('layouts.app')

@section('content_page')
    <!-- Form Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Ajouter Utilisateur</h6>
                    <form class="form-user">
                        <div class="mb-3">
                            <label for="first-name-user" class="form-label">Prénom</label>
                            <input type="text" class="form-control" id="first-name-user">
                        </div>
                        <div class="mb-3">
                            <label for="last-name-user" class="form-label">Nom</label>
                            <input type="text" class="form-control" id="last-name-user">
                        </div>
                        <div class="mb-3">
                            <label for="cin-user" class="form-label">CIN</label>
                            <input type="text" class="form-control" id="cin-user">
                        </div>
                        <div class="mb-3">
                            <label for="birtday-user" class="form-label">Date de naissance</label>
                            <input type="date" class="form-control" id="birtday-user">
                        </div>
                        <div class="mb-3">
                            <label for="phone-number-user" class="form-label">N° de telephone</label>
                            <input type="number" class="form-control" id="phone-number-user">
                        </div>
                        <div class="mb-3">
                            <label for="email-user" class="form-label">Adresse Email</label>
                            <input type="text" class="form-control" id="email-user">
                        </div>
                        <div class="mb-3">
                            <label for="roles-user" class="form-label">Rôles</label>
                            <select class="form-select mb-3" aria-label="Default select example" id="roles-user">
                                <option selected="">Choisir rôle</option>
                                <option value="admin">Admin</option>
                                <option value="intervenant">Intervenant</option>
                                <option value="social assistant">Social Assistant</option>
                                <option value="medical assistant">Medical Assistant</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <button id="btn-add-user" class="btn btn-primary">Ajouter</button>
                        </div>
                    </form>
                    <div id="message-alert" class="mb-3"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Form End -->
@endsection

@section('custom_scripts')
<script src="{{asset("jsApi/superadmin/manipulationUsers.js")}}"></script>
@endsection
