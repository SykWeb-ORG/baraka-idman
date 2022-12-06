@extends('layouts.app')

@section('content_page')
    <!-- Recent Sales Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Couverture médical</h6>
            </div>
            <fieldset>
                <div class="couv-medic">
                    <div class="couv">
                        <input type="checkbox" name="" id=""><label for="">Sans</label>
                    </div>
                    <div class="couv">
                        <input type="checkbox" name="" id=""><label for="">CNSS</label>
                    </div>
                    <div class="couv">
                        <input type="checkbox" name="" id=""><label for="">RAMED</label>
                    </div>
                    <div class="couv">
                        <input type="checkbox" name="" id=""><label for="">AMO</label>
                    </div>
                    <div class="couv">
                        <input type="checkbox" name="" id=""><label for="">CNOPS</label>
                    </div>
                </div>
            </fieldset>
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0" id="tablebenificiere">
                    <thead>
                        <tr class="text-dark">
                            {{-- <th scope="col"><input class="form-check-input" type="checkbox"></th> --}}
                            <th scope="col">Type de drogue</th>
                            <th scope="col">Quantité utilisée / fréquence</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="checkbox" name="" id=""><label for="">Cigarette</label></td>
                            <td><input type="number" name="" id=""></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="" id=""><label for="">Cannabis</label></td>
                            <td><input type="number" name="" id=""></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="" id=""><label for="">Alcool</label></td>
                            <td><input type="number" name="" id=""></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="mt-4 mb-3">
                <button type="submit" class="btn btn-primary">Valider</button>
            </div>
        </div>
    </div>
    <!-- Recent Sales End -->
@endsection
@section('custom_scripts')
@endsection
