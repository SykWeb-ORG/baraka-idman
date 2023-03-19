@extends('layouts.app')

@section('title')
Attacher des zones à l'intervenant
@endsection
@section('content_page')
<div class="container-fluid pt-4 px-4" style="min-height: 65%;">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h6 class="mb-0">Attacher les zones à l'intervenant</h6>
    </div>
    <div class="div_perm">
        <fieldset class="mb-4">
            <legend>Les zones</legend>
            <div class="permissions_check" id="zone_check">
                
            </div>
        </fieldset>
        <div>
            <button id="btnMatchIntervenantZones" class="btn btn-primary">Attacher</button>
        </div>
    </div>
</div>
<div class="push"></div>
@endsection
@section('custom_scripts')
<script>
    var intervenant = {{ Illuminate\Support\Js::from($intervenant) }};
</script>
<script src="{{asset("jsApi/intervenantsZones/affectBeneficiaireToAteliers.js")}}"></script>
@endsection
