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
                            <th scope="col">N°</th>
                            <th>Prénom</th>
                            <th>Nom</th>
                            <th>CIN</th>
                            <th>N° de telephone</th>
                            <th>Date de naissance</th>
                            <th>Email</th>
                            <th>Rôle</th>
                            <th colspan="3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                {{-- <td><input class="form-check-input" type="checkbox"></td> --}}
                                <td>{{$loop->iteration}}</td>
                                <td>{{$user->first_name}}</td>
                                <td>{{$user->last_name}}</td>
                                <td>{{$user->cin}}</td>
                                <td>{{$user->phone_number}}</td>
                                <td>{{$user->birthday_date}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    @php
                                        if ($user->admin) {
                                            echo 'admin';
                                        }elseif ($user->intervenant) {
                                            echo 'intervenant';
                                        }elseif ($user->social_assistant) {
                                            echo 'social assistant';
                                        }elseif ($user->medical_assistant) {
                                            echo 'medical assistant';
                                        }
                                    @endphp
                                </td>
                                <td><a href='{{ route('users.edit', ['user'=>$user->id]) }}' class="btn btn-sm btn-sm-square btn-primary m-2"><i class="fas fa-user-edit"></i></a></td>
                                <td>
                                    <form action="{{ route('users.destroy', ['user'=>$user->id]) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-sm-square btn-primary m-2"><i class="fas fa-user-minus"></i></button>
                                    </form>
                                </td>
                                <td>
                                    <form action="{{ route('reinit', ['user'=>$user->id]) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-sm btn-sm-square btn-primary m-2"><i class="fas fa-user-minus"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Show All Users End -->
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
<script src="{{asset("jsApi/superadmin/getDataUsers.js")}}"></script>
@endsection --}}
