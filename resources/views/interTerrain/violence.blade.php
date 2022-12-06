@extends('layouts.app')

@section('content_page')
    <!-- Recent Sales Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Exposition à la violence</h6>
            </div>
            <div class="table-responsive table2">
                <table class="table text-start align-middle table-bordered table-hover mb-0" id="tablebenificiere">
                    <thead>
                        <tr class="text-dark">
                            {{-- <th scope="col"><input class="form-check-input" type="checkbox"></th> --}}
                            <th scope="col" colspan="2">Exposition à la violence</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="checkbox" name="" id=""><label for="">Oui</label></td>
                            <td><input type="checkbox" name="" id=""><label for="">Non</label></td>
                        </tr>
                    </tbody>
                </table>
                <table class="table text-start align-middle table-bordered table-hover mb-0" id="tablebenificiere">
                    <thead>
                        <tr class="text-dark">
                            {{-- <th scope="col"><input class="form-check-input" type="checkbox"></th> --}}
                            <th scope="col" colspan="2">Type de violence</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="checkbox" name="" id=""></td>
                            <td>Psychologique</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="" id=""></td>
                            <td>Sexuelle</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="" id=""></td>
                            <td>Physique</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <span>NB:Mettre une croix dans la case approprié</span>
            <div class="mt-4 mb-3">
                <button type="submit" class="btn btn-primary">Valider</button>
            </div>
        </div>
    </div>
    <!-- Recent Sales End -->
@endsection
@section('custom_scripts')
@endsection
