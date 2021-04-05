@extends('layouts.app', ['page' => __('Manage Users'), 'pageSlug' => 'Users'])

@section('content')


    <div class="card mb-3 text-center">
        <div class="col-md-10 mr-auto ml-auto mt-3">
        <img class="card-img-bottom" src="{{ asset('black') }}/img/header1.png" rel="nofollow" alt="Card image cap">
            <hr class="bg-light">
        </div>
        <div class="card-body">
            <h1 class="card-title display-4 mt-3" ><b>{{$annonce->title}}</b></h1>
            <p class="card-text text-justify " style="line-height: 2.3em">{{$annonce->contenu}}</p>
            <p class="card-text"><small class="text-muted pull-right mt-2">{{$annonce->created_at}}</small></p>
        </div>
        <div class="card-footer ">
            <a class="btn btn-sm btn-success pull-right" href="{{ URL::to('/annonce/'.$annonce->id.'/pdf') }}">télécharger</a>
            <a href="{{ url('annonce') }}" class="btn btn-sm btn-primary pull-left">{{ __('Retour') }}</a>
        </div>
    </div>



    <!--
    <div class="content">
        <div class="row">
            <div class="row">
                <div class="col-md-10">
                    <img src=="{{ asset('black') }}/img/logo-apn2.png">
                </div>
            </div>
            <div class="row">
                <div class="col-md-10 mr-auto ml-auto">
                    <div class="header-title">
                        <h4 >{{$annonce->title}}</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="container">
                    <p>{{substr($annonce->contenu,0,150)}}</p>
                </div>
            </div>
        </div>
    </div> -->
@endsection
