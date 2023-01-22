@extends('layouts.app')

@section('title')
Liste des Programmes et des Zones affectées 
@endsection
@section('content_page')
    <!-- Show All Users Start -->
    <div class="d-flex flex-row justify-content-center">
        <div class="container-fluid pt-4 px-4">
            <div class="bg-light text-center rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0">Tous Les Programmes affectées  </h6>
                    {{-- <a href="">Show All</a> --}}
                </div>
                <div class="table-responsive table-height">
                    <table class="table text-start align-middle table-bordered table-hover mb-0" id="tableUser">
                        <thead>
                            <tr class="text-dark">
                                <th scope="col">N°</th>
                                <th>Nom Du Programme</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="container-fluid pt-4 px-4">
            <div class="bg-light text-center rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0">Tous Les Zones affectées  </h6>
                    {{-- <a href="">Show All</a> --}}
                </div>
                <div class="table-responsive table-height">
                    <table class="table text-start align-middle table-bordered table-hover mb-0" id="tableUser">
                        <thead>
                            <tr class="text-dark">
                                <th scope="col">N°</th>
                                <th>Nom Du Zone</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Show All Users End -->
@endsection