@extends('layouts.app')

@section('title')
Ajout d'un type de programme
@endsection
@section('content_page')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 id="title-form" class="mb-4">Ajouter Type Programme</h6>
                    <form class="form-user" action="" method="POST">
                        <div class="mb-3">
                            <label for="programme_type_nom" class="form-label">Nom Du Type De Programme</label>
                            <input type="text" name="programme_type_nom" class="form-control" id="programme_type_nom">
                        </div>
                        <div class="mb-3">
                            <button id="btn-add-programme_type" class="btn btn-primary">Ajouter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('custom_scripts')
    <script src="{{ asset('jsApi/') }}"></script>
@endsection
