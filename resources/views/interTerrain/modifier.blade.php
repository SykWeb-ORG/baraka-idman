@extends('layouts.app')

@section('title')
Modification du Bénéficiaire
@endsection
@section('content_page')
    <!-- Form Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">{{(!request()->has('page'))? 'Modifier beneficiaire' : request()->query('page')}}</h6>
                    <form class="form-benefaicaire" action="{{ route('beneficiaires.update', ['beneficiaire' => $beneficiaire->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <x-beneficiaire.edit.intervenant-part :beneficiaire="$beneficiaire" />
                        @if (!Auth::user()->intervenant)
                        <x-beneficiaire.edit.social-assistant-part :couvertures="$couvertures" :drogue-types="$drogue_types" :services="$services" :violence-types="$violence_types" :beneficiaire="$beneficiaire" />
                        @endif
                        @if(!request()->has('page'))
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Modifier</button>
                        </div>
                        @endif
                        <div id="message-alert" class="mb-3"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Form End -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if ($msg = session()->get('msg'))
        <div class="alert alert-{{session()->get('status')}} alert-dismissible fade show" role="alert">
            <i class="fas {{session()->get('icon')}}"></i> {{$msg}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>;
    @endif
@endsection

{{-- @section('custom_scripts')
<script src="{{asset("jsApi/intervenant/manipDataInter.js")}}"></script>
@endsection --}}
