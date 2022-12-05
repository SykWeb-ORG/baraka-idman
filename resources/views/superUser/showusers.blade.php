@extends('layouts.app')

@section('content_page')
    <!-- Show All Users Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Tous Les Utilisateurs</h6>
                {{-- <a href="">Show All</a> --}}
            </div>
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0" id="tableUser">
                    <thead>
                        <tr class="text-dark">
                            <th>Prénom</th>
                            <th>Nom</th>
                            <th>CIN</th>
                            <th>N° de telephone</th>
                            <th>Date de naissance</th>
                            <th>Email</th>
                            {{-- <th>Rôle</th> --}}
                            <th colspan="3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Show All Users End -->
@endsection

@section('custom_scripts')
<script src="{{asset("jsApi/superadmin/getDataUsers.js")}}"></script>
@endsection
