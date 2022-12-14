@extends('layouts.app')

@section('title')
Attacher des programmes à l'intervenant
@endsection
@section('content_page')
<div class="container-fluid pt-4 px-4">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h6 class="mb-0">Attacher les programmes à l'intervenant</h6>
    </div>
    <div class="div_programme">
        <fieldset class="">
            <legend>Les programmes</legend>
            <div class="programme_check" id="programme_check">
                
            </div>
        </fieldset>
        <div>
            <button id="btnMatchIntervenantProgrammes" class="btn btn-primary">Attacher</button>
        </div>
    </div>
</div>
@endsection
@section('custom_scripts')
<script>
    var intervenant = {{ Illuminate\Support\Js::from($intervenant) }};
</script>
<script src="{{asset("jsApi\superadmin\intervenant-programme.js")}}"></script>
@endsection