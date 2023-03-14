@extends('layouts.app')

@section('title')
Ajout d'une Couverture Médicale
@endsection
@section('content_page')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 id="title-form" class="mb-4">Ajouter Couverture Medicale</h6>
                    <form class="form-user" action="" method="POST">
                        <div class="mb-3">
                            <label for="nom-couv-medicale" class="form-label">Nom De La Couverture Médicale</label>
                            <input type="text" name="nom-couv-medicale" class="form-control" id="nom-couv-medicale">
                        </div>
                        <div class="mb-3">
                            <button id="btn-add-couv-medicale" class="btn btn-primary">Ajouter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
