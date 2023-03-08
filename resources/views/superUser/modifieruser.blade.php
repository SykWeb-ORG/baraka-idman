@extends('layouts.app')

@section('title')
Modification d'un utilisateur
@endsection
@section('content_page')
    <!-- Form Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">{{(!request()->has('page'))? 'Modifier Utilisateur' : 'Mon profile'}}</h6>
                    <form class="form-user" action="{{ route('users.update', ['user' => $user->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="first-name-user" class="form-label">Prénom</label>
                            <input type="text" name="first_name" class="form-control" id="first-name-user" value="{{$user->first_name}}">
                        </div>
                        <div class="mb-3">
                            <label for="last-name-user" class="form-label">Nom</label>
                            <input type="text" name="last_name" class="form-control" id="last-name-user" value="{{$user->last_name}}">
                        </div>
                        <div class="mb-3">
                            <label for="cin-user" class="form-label">CIN</label>
                            <input type="text" name="cin" class="form-control" id="cin-user" value="{{$user->cin}}">
                        </div>
                        <div class="mb-3">
                            <label for="birtday-user" class="form-label">Date de naissance</label>
                            <input type="date" name="birthday_date" class="form-control" id="birtday-user" value="{{$user->birthday_date}}">
                        </div>
                        <div class="mb-3">
                            <label for="phone-number-user" class="form-label">N° de telephone</label>
                            <input type="text" name="phone_number" class="form-control" id="phone-number-user" value="{{$user->phone_number}}">
                        </div>
                        <div class="mb-3">
                            <label for="email-user" class="form-label">Adresse Email</label>
                            <input type="text" name="email" class="form-control" id="email-user" value="{{$user->email}}">
                        </div>
                        <div class="mb-3">
                            <label for="password-user" class="form-label">Nouveau mot de passe</label>
                            <input type="text" name="password" class="form-control" id="password-user">
                        </div>
                        @if (Auth::user()->admin)
                        <div class="mb-3">
                            <label for="roles-user" class="form-label">Rôles</label>
                            <select name="role" class="form-select mb-3" aria-label="Default select example" id="roles-user">
                                <option selected="">Choisir rôle</option>
                                <option {{($user->admin != null)? 'selected' : ''}} value="admin">Admin</option>
                                <option {{($user->intervenant != null)? 'selected' : ''}} value="intervenant">Intervenant</option>
                                <option {{($user->social_assistant != null)? 'selected' : ''}} value="social assistant">Social Assistant</option>
                                <option {{($user->medical_assistant != null)? 'selected' : ''}} value="medical assistant">Medical Assistant</option>
                            </select>
                        </div>
                        @endif
                        <div class="mb-3">
                            <label for="photo-user" class="form-label">Photo de profile</label>
                            <input type="file" name="photo_profile" class="form-control" id="photo-user">
                        </div>
                        <div class="mb-3">
                            <button id="btn-manip-user" class="btn btn-primary">Modifier</button>
                        </div>
                    </form>
                    <div id="message-alert" class="mb-3"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Form End -->
@endsection

{{-- @section('custom_scripts')
<script src="{{asset("jsApi/superadmin/manipulationUsers.js")}}"></script>
@endsection --}}
