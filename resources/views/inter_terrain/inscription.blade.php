@extends('layouts.app')

@section('content_page')
    <!-- Form Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Inscription Form</h6>
                    <form>
                        <div class="mb-3">
                            <label for="exampleInputnom" class="form-label">Nom et prénom</label>
                            <input type="text" class="form-control" id="exampleInputnom">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputadresse" class="form-label">Adresse</label>
                            <input type="text" class="form-control" id="exampleInputadresse">
                        </div>
                        <fieldset class="row mb-3">
                            <legend class="col-form-label col-sm-2 pt-0">Sexe</legend>
                            <div class="col-sm-10">
                                <div class="form-check d-inline-block mr-5">
                                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1"
                                        value="option1" checked>
                                    <label class="form-check-label" for="gridRadios1">
                                        Homme
                                    </label>
                                </div>
                                <div class="form-check d-inline-block">
                                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2"
                                        value="option2">
                                    <label class="form-check-label" for="gridRadios2">
                                        Femme
                                    </label>
                                </div>
                            </div>
                        </fieldset>
                        <div class="mb-3">
                            <label for="exampleInputcin" class="form-label">CIN</label>
                            <input type="text" class="form-control" id="exampleInputcin">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputntel" class="form-label">N° de telephone</label>
                            <input type="number" class="form-control" id="exampleInputntel">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputtravail" class="form-label">Type de travail</label>
                            <input type="text" class="form-control" id="exampleInputtravail">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputintervenant" class="form-label">Intervenant</label>
                            <input type="text" class="form-control" id="exampleInputintervenant">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Sign in</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Form End -->
@endsection
