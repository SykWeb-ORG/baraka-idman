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
                <option value="Select">Role</option>
                <option value="India">India</option>
                <option value="Nepal">Nepal</option>
                <option value="Bangladesh">Bangladesh</option>
                <option value="Sri Lanka">Sri Lanka</option>
            </select>
            <fieldset class="">
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
