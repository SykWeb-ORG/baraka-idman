@extends('layouts.app')

@section('title')
Gestion des roles avec les services
@endsection
@section('content_page')
    <div class="container-fluid pt-4 px-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Add Service to role</h6>
        </div>
        <div class="div_perm">
            <select name="role" id="role" class="cusSelectbox">
            </select>
            <fieldset class="mb-4">
                <legend>Service</legend>
                <div class="permissions_check" id="service_check">
                </div>
            </fieldset>
            <div>
                <button id="btnMatchServiceRole" class="btn btn-primary">Attacher</button>
            </div>
        </div>
    </div>
@endsection
@section('custom_scripts')
    <script src="{{ asset('jsApi/servicesRoles/affectServicesToRole.js') }}"></script>
@endsection
