@extends('layouts.app')

@section('content_page')
    <!-- Recent Sales Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Service</h6>
            </div>
            <div class="table-responsive table2">
                <table class="table text-center align-middle table-bordered table-hover mb-0" id="tablebenificiere">
                    <thead>
                        <tr class="text-dark">
                            {{-- <th scope="col"><input class="form-check-input" type="checkbox"></th> --}}
                            <th scope="col"></th>
                            <th scope="col">Service</th>
                        </tr>
                    </thead>
                    <tbody id="tbodyServices">
                        {{-- <tr>
                            <td><input type="checkbox" name="" id=""></td>
                            <td>Accompagnement sanitaire</td>

                        </tr>
                        <tr>
                            <td><input type="checkbox" name="" id=""></td>
                            <td>Accompagnement sociale</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="" id=""></td>
                            <td>Accompagnement juridique/administratif</td>
                        </tr> --}}
                    </tbody>
                </table>
            </div>
            <div class="mt-4 mb-3">
                <button type="submit" class="btn btn-primary" id="btnMatchServices">Valider</button>
            </div>
        </div>
    </div>
    <!-- Recent Sales End -->
@endsection
@section('custom_scripts')
<script>
    var beneficiaire = {{ Illuminate\Support\Js::from($beneficiaire) }};
</script>
<script src="{{asset("jsApi\intervenant\service-beneficiaire.js")}}"></script>
@endsection
