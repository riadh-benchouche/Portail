@extends('layouts.app', ['page' => __('Manage Users'), 'pageSlug' => 'Users'])

@section('content')
    <div class="card mb-3 text-center">
        <div class="col-md-2 mt-3 ">
            <img  src="{{ asset('storage').'/'.$user ->getFirstMedia()['id'].'/'.$user ->getFirstMedia()['file_name']}}" >
        </div>
        <div class="col-md-8" >
            <div class="card  p-sm" style="height: 420px">
                <div class="card-body  ">
                    <div class="row">
                        <div class="col-sm-4">
                            <h6>Matricule</h6>
                        </div>
                        <div class="col-sm-8 text-secondary">
                            <b>{{ $user->matricule }}</b>
                        </div>
                    </div>
                    <hr class="m-2">
                    <div class="row">
                        <div class="col-sm-4">
                            <h6 >Nom </h6>
                        </div>
                        <div class="col-sm-8 text-secondary">
                            <b>{{ $user->name }}</b>
                        </div>
                    </div>
                    <hr class="m-2">
                    <div class="row">
                        <div class="col-sm-4">
                            <h6 >Email</h6>
                        </div>
                        <div class="col-sm-8 text-secondary">
                            <b>{{ $user->email }}</b>
                        </div>
                    </div>
                    <hr class="m-2">
                    <div class="row">
                        <div class="col-sm-4">
                            <h6>Téléphone de poste</h6>
                        </div>
                        <div class="col-sm-8 text-secondary">
                            <b>{{ $user->phone }}</b>
                        </div>
                    </div>
                    <hr class="m-2">
                    @if($user->category == 'Député')
                    <div class="row">
                        <div class="col-sm-4">
                            <h6 >Commission</h6>
                        </div>
                        <div class="col-sm-8 text-secondary">
                            <b>{{ $user->comissions->name}}</b>
                        </div>
                    </div>
                        @elseif($user->category == 'Salarié')
                        <div class="row">
                            <div class="col-sm-4">
                                <h6 >Structure</h6>
                            </div>
                            <div class="col-sm-8 text-secondary">
                                <b>{{ $user->services->name}}</b>
                            </div>
                        </div>
                    @endif
                    <hr class="m-2">
                    <div class="row">
                        <div class="col-sm-4">
                            <h6 >Wilaya</h6>
                        </div>
                        <div class="col-sm-8 text-secondary">
                            <b>{{ $user->Wilaya}}</b>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center ">
                    <a  href="{{ url('user') }}" class="btn btn-sm btn-primary ">{{ __('Retour') }}</a>
            </div>
        </div>
    </div>
@endsection
