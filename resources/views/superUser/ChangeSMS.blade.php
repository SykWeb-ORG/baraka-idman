@extends('layouts.app')

@section('title')
    SMS Template
@endsection
@section('content_page')
    <div class="container-fluid pt-4 px-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 id="title-form" class="mb-4">Change SMS</h6>
                <form class="form-user">
                    <div class="mb-3">
                        <label class="form-label">Changer le message à envoyer</label>
                        <textarea class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <button id="btn-change-sms" class="btn btn-primary">Changer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
