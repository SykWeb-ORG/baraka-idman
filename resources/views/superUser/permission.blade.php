@extends('layouts.app')

@section('content_page')
    <div class="container-fluid pt-4 px-4">
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
            <fieldset class="">
                <legend>Permissions</legend>
                <div class="permissions_check" id="permissions_check">
                    <div class="perm">
                        <input type="checkbox" name="" id=""><label for="">Permission1</label>
                    </div>
                    <div class="perm">
                        <input type="checkbox" name="" id=""><label for="">Permission1 ajouter ahdjsds</label>
                    </div>
                    <div class="perm">
                        <input type="checkbox" name="" id=""><label for="">Permission1</label>
                    </div>
                    <div class="perm">
                        <input type="checkbox" name="" id=""><label for="">Permission1</label>
                    </div>
                    <div class="perm">
                        <input type="checkbox" name="" id=""><label for="">Permission1</label>
                    </div>
                    <div class="perm">
                        <input type="checkbox" name="" id=""><label for="">Permission1</label>
                    </div>
                    <div class="perm">
                        <input type="checkbox" name="" id=""><label for="">Permission1</label>
                    </div>
                    <div class="perm">
                        <input type="checkbox" name="" id=""><label for="">Permission1 ajouter ahdjsds</label>
                    </div>
                    <div class="perm">
                        <input type="checkbox" name="" id=""><label for="">Permission1 ajouter ahdjsds</label>
                    </div>
                    <div class="perm">
                        <input type="checkbox" name="" id=""><label for="">Permission1</label>
                    </div>
                    <div class="perm">
                        <input type="checkbox" name="" id=""><label for="">Permission1</label>
                    </div>
                    <div class="perm">
                        <input type="checkbox" name="" id=""><label for="">Permission1 ajouter ahdjssxsxsxsxsxsxds</label>
                    </div>
                    <div class="perm">
                        <input type="checkbox" name="" id=""><label for="">Permission1</label>
                    </div>
                    <div class="perm">
                        <input type="checkbox" name="" id=""><label for="">Permission1</label>
                    </div>
                    <div class="perm">
                        <input type="checkbox" name="" id=""><label for="">Permission1</label>
                    </div>
                    <div class="perm">
                        <input type="checkbox" name="" id=""><label for="">Permission1</label>
                    </div>
                    <div class="perm">
                        <input type="checkbox" name="" id=""><label for="">Permission1</label>
                    </div>
                    <div class="perm">
                        <input type="checkbox" name="" id=""><label for="">Permission1</label>
                    </div>
                    <div class="perm">
                        <input type="checkbox" name="" id=""><label for="">Permission1 ajouter ahdjsdsxqxsxsxsxsxsx</label>
                    </div>
                </div>
            </fieldset>
            <div>
                <button id="btnMatchPermissionsRole" class="btn btn-primary">Attacher</button>
            </div>
        </div>
    </div>
@endsection
@section('custom_scripts')
    <script src="{{ asset('jsApi/permissionsRoles/main.js') }}"></script>
@endsection
