@extends('layouts.app')

@section('title')
Gestion des zones avec les intervenants
@endsection
@section('content_page')
<div class="container-fluid pt-4 px-4">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h6 class="mb-0">Add Intervenant to zone</h6>
    </div>
    <div class="div_zone">
        <select name="role" id="role" class="cusSelectbox">
            <option value="Select">Select</option>
            <option value="India">India</option>
            <option value="Nepal">Nepal</option>
            <option value="Bangladesh">Bangladesh</option>
            <option value="Sri Lanka">Sri Lanka</option>
        </select>
        <fieldset class="">
            <legend>Intervenant</legend>
            <div class="zone_check" id="zone_check">
                <div class="zone">
                    <input type="checkbox" name="" class="form-check-input">
                    <label>Mhamid</label>
                </div>
                <div class="zone">
                    <input type="checkbox" name="" class="form-check-input">
                    <label>Mhamid</label>
                </div>
                <div class="zone">
                    <input type="checkbox" name="" class="form-check-input">
                    <label>Mhamid</label>
                </div>
                <div class="zone">
                    <input type="checkbox" name="" class="form-check-input">
                    <label>Mhamid</label>
                </div>
                <div class="zone">
                    <input type="checkbox" name="" class="form-check-input">
                    <label>Mhamid</label>
                </div>
                <div class="zone">
                    <input type="checkbox" name="" class="form-check-input">
                    <label>Mhamid</label>
                </div>
            </div>
        </fieldset>
        <div>
            <button id="btnMatchPermissionsRole" class="btn btn-primary">Attacher</button>
        </div>
    </div>
</div>
@endsection