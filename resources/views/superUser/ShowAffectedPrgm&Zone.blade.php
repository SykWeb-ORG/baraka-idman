@extends('layouts.app')

@section('title')
    Programmes Et Zones Affectés à un interveant
@endsection
@section('content_page')
    <!-- Show All Users Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h4 class="mb-0">Tous Les Programmes Et Zones Affectés à un interveant</h6>
                    {{-- <a href="">Show All</a> --}}
            </div>
            <div class="prgm-zone">
                <div class="programme-liste">
                    <h6>Programmes</h6>
                    <ul class="liste_affec">
                        <li><button type="submit" class="btn btn-prgm m-2" data-programme-id="1" data-bs-toggle="modal" data-bs-target="#modal_ListePlacePrgm" data-bs-placement="top" title="Afficher les lieux">Prgm1</button></li>
                        <li><button type="submit" class="btn btn-prgm m-2" data-programme-id="1" data-bs-toggle="modal" data-bs-target="#modal_ListePlacePrgm" data-bs-placement="top" title="Afficher les lieux">Prgm2 Prgm2 Prgm2 Prgm2 Prgm2 Prgm2 Prgm2 Prgm2 Prgm2 Prgm2 Prgm2 Prgm2 Prgm2 Prgm2 Prgm2 Prgm2
                            Prgm2</button></li>
                        <li><button type="submit" class="btn btn-prgm m-2" data-programme-id="1" data-bs-toggle="modal" data-bs-target="#modal_ListePlacePrgm" data-bs-placement="top" title="Afficher les lieux">Prgm2</button></li>
                        <li><button type="submit" class="btn btn-prgm m-2" data-programme-id="1" data-bs-toggle="modal" data-bs-target="#modal_ListePlacePrgm" data-bs-placement="top" title="Afficher les lieux">Prgm3</button></li>
                    </ul>
                </div>
                <!-- Modal -->
                <div class="modal" id="modal_ListePlacePrgm" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Places du Prgm1</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                </button>
                            </div>
                            <div class="modal-bodyListe">
                                <div class="table-responsive table-heightPlace">
                                    <table class="table text-start align-middle table-bordered table-hover mb-5" id="tablePlaces">
                                        <thead>
                                            <tr class="text-dark">
                                                <th scope="col">N°</th>
                                                <th>Nom Place</th> 
                                                <th>Date programme</th> 
                                                <th>Résultat</th>
                                                <th colspan="2" class="actions">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbl_place">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="zone-liste">
                    <h6>Zones</h6>
                    <ul class="liste_affec">
                        <li>Zone1 Zone1 Zone1Zone1</li>
                        <li>Zone2</li>
                        <li>Zone3</li>
                        <li>Zone4</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Show All Users End -->
@endsection
@section('custom_scripts')
    <script src="{{ asset('jsApi/atelier/all-ateliers.js') }}"></script>
@endsection
