@extends('layouts.app')

@section('title')
Gestion des roles avec les permissions
@endsection
@section('content_page')
    <div class="container-fluid pt-4 px-4" style="min-height: 65%;">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Add Permission to role</h6>
        </div>
        <div class="div_perm">
            <select name="role" id="role" class="cusSelectbox">
                {{-- <option value="Select">Select</option>
                <option value="India">India</option>
                <option value="Nepal">Nepal</option>
                <option value="Bangladesh">Bangladesh</option>
                <option value="Sri Lanka">Sri Lanka</option> --}}
            </select>
            <fieldset class="mb-4">
                <legend>Permissions</legend>
                <div class="permissions_check" id="permissions_check">
                </div>
            </fieldset>
            <div>
                <button id="btnMatchPermissionsRole" class="btn btn-primary">Attacher</button>
            </div>
        </div>
    </div>
    <div class="push"></div>
@endsection
@section('custom_scripts')
    <script src="{{ asset('jsApi/permissionsRoles/role-permissions.js') }}"></script>
@endsection
