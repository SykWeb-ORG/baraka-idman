@extends('layouts.app')

@section('title')
Gestion des Cas Juridiques
@endsection
@section('content_page')
    <div class="container-fluid pt-4 px-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Add Cas Juridiques to Beneficaire</h6>
        </div>
        <div class="div_perm">
            <fieldset class="">
                <legend>Cas Juridique</legend>
                <div class="permissions_check" id="cas_juridique_check">
                </div>
            </fieldset>
            <div>
                <button id="btnMatchCasJuridiqueBenef" class="btn btn-primary">Attacher</button>
            </div>
        </div>
    </div>
@endsection
