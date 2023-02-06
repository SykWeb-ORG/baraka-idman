@extends('layouts.app')

@section('title')
Ajout d'un Programme
@endsection
@section('content_page')
    <!-- Form Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 id="title-form" class="mb-4">Ajouter Programme</h6>
                    <form class="form-user" action="" method="POST">
                        <div class="mb-3">
                            <label for="nom-programme" class="form-label">Nom Du Programme :</label>
                            <input type="text" name="nom-programme" class="form-control" id="nom-programme">
                        </div>
                        <div class="mb-3">
                            <label for="type-programme" class="form-label">Type De Programme :</label>
                            <input type="text" name="type-programme" class="form-control" id="type-programme">
                        </div>
                        <div class="place">
                            <legend>Ajouter Place</legend>
                            <div class="form-part">
                                <div class="mb-3">
                                    <label for="nom-place" class="form-label">Nom:</label>
                                    <input type="text" name="nom-place" class="form-control" id="nom-place">
                                </div>
                            </div>
                            <div class="mb-3">
                                <button id="btn-add-place" class="btn btn-primary">Ajouter Place</button>
                            </div>
                        </div>
                        <table class="table text-start align-middle table-bordered table-hover mb-5" id="tableUser">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col">N°</th>
                                    <th>Nom Place</th>
                                    <th colspan="2" class="actions">Action</th>
                                </tr>
                            </thead>
                            <tbody id="tbl_place">
                            </tbody>
                        </table>
                        <div class="mb-3">
                            <button id="btn-add-programme" class="btn btn-primary">Ajouter Programme</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Form End -->
@endsection