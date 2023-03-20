@extends('layouts.app')

@section('title')
Ajout d'un type de service
@endsection
@section('content_page')
    <!-- Form Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 id="title-form" class="mb-4">Ajouter Type Du Service</h6>
                    <form class="form-user" action="" method="POST">
                        <div class="mb-3">
                            <label for="service-type" class="form-label">Type Du Service</label>
                            <input type="text" name="service-type" class="form-control" id="service-type">
                        </div>
                        <div class="mb-3">
                            <button id="btn-add-service-type" class="btn btn-primary">Ajouter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Form End -->
@endsection
@section('custom_scripts')
    <script src="{{ asset('jsApi/') }}"></script>
@endsection
