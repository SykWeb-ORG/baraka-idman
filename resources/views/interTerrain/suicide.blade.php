@extends('layouts.app')

@section('content_page')
    <!-- Recent Sales Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">La pensée au suicide</h6>
            </div>
            <div class="table-responsive table2">
                <table class="table text-start align-middle table-bordered table-hover mb-0" id="tablebenificiere">
                    <thead>
                        <tr class="text-dark">
                            {{-- <th scope="col"><input class="form-check-input" type="checkbox"></th> --}}
                            <th scope="col" colspan="2">Pensée au suicide</th>
                            <th scope="col">Les Causes</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <form id="form_beneficiaire_suicide" action="{{ route('match-beneficiaire-suicide_causes', ['beneficiaire' => $beneficiaire->id]) }}" method="post">
                                @csrf
                                <td><input type="checkbox" name="" id="oui" {{(count($beneficiaire->suicide_causes))? 'checked': ''}}><label for="oui">Oui</label></td>
                                <td><input type="checkbox" name="" id="non" {{(count($beneficiaire->suicide_causes) == 0)? 'checked': ''}}><label for="non">Non</label></td>
                                <td><textarea name="suicide_causes" id="" cols="30" rows="10">{{(count($beneficiaire->suicide_causes))? $beneficiaire->suicide_causes[0]->cause : ''}}</textarea></td>
                            </form>
                        </tr>
                    </tbody>
                </table>
            </div>
            <span>NB:Mettre une croix dans la case approprié</span>
            <div class="mt-4 mb-3">
                <button form="form_beneficiaire_suicide" type="submit" class="btn btn-primary">Valider</button>
            </div>
        </div>
    </div>
    <!-- Recent Sales End -->
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
@section('custom_scripts')
@endsection
