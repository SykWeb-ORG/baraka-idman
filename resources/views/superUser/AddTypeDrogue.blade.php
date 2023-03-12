@extends('layouts.app')

@section('title')
Ajout d'un type de drogue
@endsection
@section('content_page')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 id="title-form" class="mb-4">Ajouter Type Drogue</h6>
                    <form class="form-user" action="" method="POST">
                        <div class="mb-3">
                            <label for="nom-service" class="form-label">Nom Du Type De Drogue :</label>
                            <input type="text" name="nom-service" class="form-control" id="nom-service">
                        </div>
                        <div class="mb-3">
                            <button id="btn-add-service" class="btn btn-primary">Ajouter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
