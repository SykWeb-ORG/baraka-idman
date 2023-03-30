@extends('layouts.app')

@section('title')
Ajout d'un service
@endsection
@section('content_page')
    <!-- Form Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 id="title-form" class="mb-4">Ajouter Service</h6>
                    <form class="form-user" action="" method="POST">
                        <div class="mb-3">
                            <label for="nom-service" class="form-label">Nom Du Service</label>
                            <input type="text" name="nom-service" class="form-control" id="nom-service">
                        </div>
                        <div class="mb-3">
                            <label for="type-service" class="form-label">Type Du Service</label>
                            <select name="type-service" class="form-select" aria-label="Default select example" id="type-service">
                            </select>
                        </div>
                        <div class="mb-3">
                            <button id="btn-add-service" class="btn btn-primary">Ajouter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Form End -->
@endsection
@section('custom_scripts')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('jsApi/servicesRoles/addService.js') }}"></script>
@endsection
