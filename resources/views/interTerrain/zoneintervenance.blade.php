@extends('layouts.app')

@section('title')
    Liste des Zones
@endsection
@section('content_page')
    <!-- Recent Sales Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Zone d'intervenance</h6>
            </div>
            <div class="table-responsive table-height">
                <table class="table text-start align-middle table-bordered table-hover mb-0" id="tablebenificiere">
                    <thead>
                        <tr class="text-dark">
                            <th scope="col">ID</th>
                            <th scope="col">Nom</th>
                            <th scope="col" colspan="2" class="actions">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                            <tr>
                                <td>1</td>
                                <td>Mhamid</td>
                                <td class="actionU"><a href='' class="btn btn-sm btn-sm-square btn-primary m-2"><i class="fas fa-user-edit"></i></a></td>
                                <td class="actionD">
                                        <button type="submit" class="btn btn-sm btn-sm-square btn-primary m-2"><i class="fas fa-user-minus"></i></button>
                                </td>
                                <td class="actionM">
                                    <button type="submit" class="btn btn-sm btn-sm-square btn-primary m-2"><i class="fas fa-ellipsis-h"></i></button>
                                </td>
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Recent Sales End -->
@endsection
