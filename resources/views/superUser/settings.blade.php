@extends('layouts.app')

@section('title')
    Paramètres
@endsection
@section('content_page')
    <!-- Form Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <h4 id="title-form" class="mb-4 title-rapport">Paramètres :</h4>
                <div class="bg-light rounded h-100 p-4">
                    <p class="div-select"> <span class="text-dark box-item">Switcher la base de donnée :</span>
                        <select
                            name="societe-db" onchange="SelectDB()" class="form-select societe-db" aria-label="Default select example"
                            id="societe-db">
                            <option value="">Selectionner base de donnée</option>
                            <option value="jour">DB1</option>
                            <option value="mois">DB2</option>
                            <option value="annee">DB3</option>
                        </select>
                    </p>
                    <form class="form-user societe" action="" method="POST" id="form-societe">
                        <div class="box-container p-4 d-flex justify-content-around">
                            <div class="box">
                                <p> <span class="text-dark box-item">Nom de la société :</span><input type="text"
                                        name="service-type" class="form-control" id="service-type"></p>
                                <p> <span class="text-dark box-item">Adresse Location :</span><input type="text"
                                        name="service-type" class="form-control" id="service-type"></p>
                                <p> <span class="text-dark box-item">N° de telephone :</span><input type="text"
                                        name="service-type" class="form-control" id="service-type"></p>
                            </div>
                            <div class="box">
                                <p> <span class="text-dark box-item">Logo :</span><input type="file" name="image_url"
                                        id="service_img" hidden onchange="changeTextContent(this, '')">
                                    <label for="service_img" class="lbl_img_upload">Choisir fichier</label>
                                    <span id="file-chosen"></span>
                                </p>
                                <p> <span class="text-dark box-item">Date De Creation :</span><input type="date"
                                        name="service-type" class="form-control" id="service-type"></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Form End -->
@endsection
@section('custom_scripts')
@endsection
