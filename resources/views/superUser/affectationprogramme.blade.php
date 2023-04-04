@extends('layouts.app')

@section('title')
Attacher des programmes à l'intervenant
@endsection
@section('content_page')
<div class="container-fluid pt-4 px-4" style="min-height: 65%;">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h6 class="mb-0">Attacher les programmes à l'intervenant</h6>
    </div>
    <div class="div_perm">
        <fieldset class="mb-4">
            <legend>Les programmes</legend>
            <div class="permissions_check" id="programme_check">
                
            </div>
        </fieldset>
        <div>
            <button id="btnMatchIntervenantProgrammes" class="btn btn-primary">Attacher</button>
        </div>
    </div>
</div>
<div class="push"></div>
@endsection
@section('custom_scripts')
<script>
    var intervenant = {{ Illuminate\Support\Js::from($intervenant) }};
</script>
<script src="{{asset("jsApi/intervenantsProgrammes/affectIntervenantToProgrammes.js")}}"></script>
@endsection
