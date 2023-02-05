@extends('layouts.app')

@section('title')
Ajout d'une visite juridique
@endsection
@section('content_page')
    <!-- Form Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 id="title-form" class="mb-4">Ajouter Visite juridique</h6>
                    <form class="form-user" action="" method="POST">
                        <div class="mb-3">
                            <label for="remarque-visitejuridique" class="form-label">Remarque de la visite juridique</label>
                            <input type="text" name="remarque" class="form-control" id="remarque-visitejuridique" placeholder="Entrez vos remarques">
                        </div>
                        <div class="mb-3">
                            <label for="beneficiaire" class="form-label">Bénéficiaire</label>
                            <select name="beneficiaire" class="form-select" aria-label="Default select example" id="beneficiaire">
                                <option value=""></option>
                            </select>
                        </div>
                        <label for="recipient-name" class="form-label">Pièce jointe:</label>
                        <div class="input-group-outline mb-3 d-flex align-items-center">
                            <input type="file" name="image_url" id="service_img" hidden onchange="changeTextContent(this, '')">
                            <label for="service_img" class="lbl_img_upload">Choisir fichier</label>
                            <span id="file-chosen"></span>
                        </div>
                        <div class="mb-3">
                            <button id="btn-visite-sociale" class="btn btn-primary">Ajouter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Form End -->
@endsection

