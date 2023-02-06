@extends('layouts.app')

@section('title')
Ajout d'une zone d'intervenance
@endsection
@section('content_page')
<!-- Form Start -->
<div class="container-fluid pt-4 px-4" style="min-height: 65%;">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 id="title-form" class="mb-4">Ajouter Zone d'intervenance</h6>
                <form class="form-user" method="POST">
                    <div class="mb-3">
                        <label for="nom-zone" class="form-label">Nom</label>
                        <input type="text" name="nom-zone" class="form-control" id="nom-zone">
                    </div>
                    <div class="mb-3">
                        <button id="btn-add-zone" class="btn btn-primary">Ajouter</button>
                    </div>
                </form>
                <div id="message-alert" class="mb-3"></div>
            </div>
        </div>
    </div>
</div>
<div class="push"></div>
<!-- Form End -->
@endsection
@section('custom_scripts')
    <script src="{{ asset('jsApi/zone/add-zone.js') }}"></script>
@endsection
