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
                            <label for="service-type" class="form-label">Type Du Service</label>
                            <select name="service-type" class="form-select" aria-label="Default select example" id="service-type">
                                <option value="">Selectionner Un Type De Service</option>
                                <option value="">Serv1</option>
                                <option value="">Serv2</option>
                                <option value="">Serv3</option>
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
    <script src="{{ asset('jsApi/servicesRoles/addService.js') }}"></script>
@endsection
