@extends('layouts.app')

@section('content_page')
    <!-- Recent Sales Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Béneficiaires</h6>
                {{-- <a href="">Show All</a> --}}
            </div>
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0" id="tablebenificiere">
                    <thead>
                        <tr class="text-dark">
                            <th scope="col">Id</th>
                            <th scope="col">prénom</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Adresse</th>
                            <th scope="col">Sexe</th>
                            <th scope="col">CIN</th>
                            <th scope="col">N° de telephone</th>
                            <th scope="col">Type de travail</th>
                            <th scope="col">Intervenant Id </th>
                            <th scope="col">Niveau Scolaire </th>
                            <th scope="col">Situation Familiale </th>
                            <th scope="col">Orphelin </th>
                            <th scope="col">Profession </th>
                            <th scope="col">Zone Habitation </th>
                            <th scope="col">Localisation </th>
                            <th scope="col">Famille Informee </th>
                            <th scope="col">Age Debut Addiction </th>
                            <th scope="col">Duree Addiction </th>
                            <th scope="col">TS</th>
                            <th scope="col" colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Recent Sales End -->
@endsection
@section('custom_scripts')

<script src="{{asset("jsApi/assistant/main.js")}}"></script>

@endsection
