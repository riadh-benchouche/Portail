@extends('layouts.app', ['page' => __('Notifications'), 'pageSlug' => 'notifications'])

@section('content')
    <div class="row">
        <h1 class='text-info font-weight-bold h1 text-center ml-auto mr-auto'>Trucs et Astuces</h1>
    </div>
    @can('edit')
    <div class=" text-sm-right mb-2">
        <a href="{{ url('TestEtAstuce/create') }}" class="btn btn-sm btn-primary ">
            <i class="tim-icons icon-simple-add"></i> Ajouter
        </a>
    </div>
    @endcan
    <div class="row">
        @foreach($TeAs as $tea)
        <div class="col-md-4">
            <div class="card card-blog pt-2">
                <div class="card-image">
                    <a href="javascript:;">
                        <img class="img ml-auto mr-auto" width="80%" src="{{asset('black/img/truc.svg')}}">
                    </a>
                </div>
                <div class="card-body text-center">
                    <h4 class="card-title font-weight-bold">
                       {{$tea->title}}
                    </h4>
                    <div class="card-description">
                        {{substr($tea->contenu,0,40)}}
                    </div>
                    <div class="card-footer">
                        <a href="javascript:;" class="btn btn-danger btn-round">Consulter</a>
                    </div>
                </div>
            </div>
        </div>
            @endforeach
    </div>
@endsection
