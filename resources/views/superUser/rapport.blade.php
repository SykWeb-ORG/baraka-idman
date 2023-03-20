@extends('layouts.app')

@section('title')
Rapport
@endsection
@section('content_page')
    <!-- Form Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <h4 id="title-form" class="mb-4 title-rapport">Rapport :</h4>
                <div class="bg-light rounded h-100 p-4">
                    {{-- POLE DE LA SENSIBILISATION --}}
                    <div class="mb-4">
                        <h6 class="pole mb-3">POLE DE LA SENSIBILISATION</h6>
                        <div class="table-responsive table-height mb-4 pole-center">
                            <table class="table text-start align-middle table-bordered table-hover mb-0 w-50" id="tableUser">
                                <thead>
                                    <tr class="text-dark text-center">
                                        <th scope="col text-center">Total des personnes sensibilisées </th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        <h6 class="sous-pole">Sensibilisation à proximité </h6>
                        <div class="table-responsive table-height sous-pole-table">
                            <table class="table text-start align-middle table-bordered table-hover mb-0" id="tableUser">
                                <thead>
                                    <tr class="text-dark">
                                        <th scope="col">Mois</th>
                                        <th>Dates</th>
                                        <th>Lieu</th>
                                        <th>Nombre</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{-- POLE DE L'ACCOMPAGNEMENT --}}
                    <div class="mb-4">
                        <h6 class="pole mb-3">POLE DE L'ACCOMPAGNEMENT</h6>
                        <div class="table-responsive table-height mb-4 pole-center">
                            <table class="table text-start align-middle table-bordered table-hover mb-0 w-50" id="tableUser">
                                <thead>
                                    <tr class="text-dark text-center">
                                        <th scope="col text-center">Total des personnes sensibilisées </th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        <div class="table-responsive table-height mb-4">
                            <table class="table text-start align-middle table-bordered table-hover mb-0" id="tableUser">
                                <thead>
                                    <tr class="text-dark">
                                        <th scope="col">Total des bénéficiaires  des services accompagnements </th>
                                        <th>Total des bénéficiaires orientés</th>
                                        <th>Total des bénéficiaires de la médiation familiale</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        <h6 class="sous-pole">Totaux de l’accompagnement : </h6>
                        <div class="table-responsive table-height sous-pole-table mb-4">
                            <table class="table text-start align-middle table-bordered table-hover mb-0" id="tableUser">
                                <thead>
                                    <tr class="text-dark">
                                        <th scope="col">Total de l’accompagnement sanitaire </th>
                                        <th>Total de l’accompagnement juridique et administratif </th>
                                        <th>Total de l’accompagnement social </th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        <h6 class="sous-pole">Totaux de l’orientation  : </h6>
                        <div class="table-responsive table-height sous-pole-table">
                            <table class="table text-start align-middle table-bordered table-hover mb-0" id="tableUser">
                                <thead>
                                    <tr class="text-dark">
                                        <th scope="col">Total de l’orientation  sanitaire </th>
                                        <th>Total de l’orientation  juridique et administratif </th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{-- POLE DE L'INTEGRATION --}}
                    <div class="mb-4">
                        <h6 class="pole mb-3">POLE DE L'INTEGRATION</h6>
                        <div class="table-responsive table-height mb-4 pole-center">
                            <table class="table text-start align-middle table-bordered table-hover mb-0 w-50" id="tableUser">
                                <thead>
                                    <tr class="text-dark text-center">
                                        <th scope="col text-center">Total des bénéficiaires intégrés  </th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{-- POLE Formation  --}}
                    <div class="mb-4">
                        <h6 class="pole mb-3">POLE Formation </h6>
                        <div class="table-responsive table-height mb-4">
                            <table class="table text-start align-middle table-bordered table-hover mb-0" id="tableUser">
                                <thead>
                                    <tr class="text-dark">
                                        <th scope="col">Titre de la formation </th>
                                        <th>Date et heure</th>
                                        <th>Durée / En jours</th>
                                        <th>Objet de la formation</th>
                                        <th>Organisme</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Form End -->
@endsection
@section('custom_scripts')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('jsApi/medicaleVisite/add-medicale-visite.js') }}"></script>
@endsection
