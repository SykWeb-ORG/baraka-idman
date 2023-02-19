@extends('layouts.app')

@section('title')
Inscription du Bénéficiaire
@endsection
@section('content_page')
    <!-- Form Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Inscription Form</h6>
                    <form class="form-benefaicaire" action="{{ route('beneficiaires.store') }}" method="POST">
                        @csrf
                        <x-beneficiaire.intervenant-part/>
                        @if (!Auth::user()->intervenant)
                        <x-beneficiaire.social-assistant-part :couvertures="$couvertures" :drogue-types="$drogue_types" :services="$services" :violence-types="$violence_types" />
                        @endif
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary" id="btn-add-beneficiaire">Ajouter</button>
                        </div>
                        <div id="message-alert" class="mb-3"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Form End -->
@endsection

@section('custom_scripts')
    <script src="{{ asset('jsApi/beneficiaire/add-beneficiaire.js') }}"></script>
@endsection
