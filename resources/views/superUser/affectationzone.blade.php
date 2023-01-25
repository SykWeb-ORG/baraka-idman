@extends('layouts.app')

@section('title')
Attacher des zones à l'intervenant
@endsection
@section('content_page')
<div class="container-fluid pt-4 px-4">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h6 class="mb-0">Attacher les zones à l'intervenant</h6>
    </div>
    <div class="div_zone">
        {{-- <select name="role" id="role" class="cusSelectbox">
            <option value="Select">Select</option>
            <option value="India">India</option>
            <option value="Nepal">Nepal</option>
            <option value="Bangladesh">Bangladesh</option>
            <option value="Sri Lanka">Sri Lanka</option>
        </select> --}}
        <fieldset class="mb-4">
            <legend>Les zones</legend>
            <div class="zone_check" id="zone_check">
                {{-- <div class="zone">
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
                </div> --}}
            </div>
        </fieldset>
        <div>
            <button id="btnMatchIntervenantZones" class="btn btn-primary">Attacher</button>
        </div>
    </div>
</div>
@endsection
@section('custom_scripts')
<script>
    var intervenant = {{ Illuminate\Support\Js::from($intervenant) }};
</script>
<script src="{{asset("jsApi\superadmin\intervenant-zone.js")}}"></script>
@endsection