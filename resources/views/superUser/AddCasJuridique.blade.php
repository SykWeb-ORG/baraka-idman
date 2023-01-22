@extends('layouts.app')

@section('title')
Ajout d'un cas juridique
@endsection
@section('content_page')
    <!-- Form Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 id="title-form" class="mb-4">Ajouter Cas Juridique</h6>
                    <form class="form-user" action="" method="POST">
                        <div class="mb-3">
                            <label for="nom-groupe" class="form-label">Nom Du Cas Juridique</label>
                            <input type="text" name="nom-groupe" class="form-control" id="nom-groupe">
                        </div>
                        <div class="mb-3">
                            <button id="btn-visite-medical" class="btn btn-primary">Ajouter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Form End -->
@endsection
