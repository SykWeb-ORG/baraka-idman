@extends('layouts.app')

@section('title')
Gestion des roles avec les services
@endsection
@section('content_page')
    <div class="container-fluid pt-4 px-4" style="min-height: 65%;">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Add Group to Beneficaire</h6>
        </div>
        <div class="div_perm">
            <select name="atelier" id="atelier" class="cusSelectbox">
                <option value="">Choisir une atelier</option>
            </select>
            <fieldset class="mb-4">
                <legend>Group</legend>
                <div class="permissions_check" id="group_check">
                </div>
            </fieldset>
            <div>
                <button id="btnMatchGroupBenef" class="btn btn-primary">Attacher</button>
            </div>
        </div>
    </div>
    <div class="push"></div>
@endsection
@section('custom_scripts')
    <script>
        var beneficiaire = {{ Illuminate\Support\Js::from($beneficiaire) }}
    </script>
    <script src="{{ asset('jsApi/beneficiairesAteliers/affectBeneficiaireToAteliers.js') }}"></script>
@endsection
