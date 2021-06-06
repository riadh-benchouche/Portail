@extends('layouts.app', ['page' => __('Manage Users'), 'pageSlug' => 'Users'])

@section('content')


    <div class="card" >
        <div class="row ">
            <div class="col-md-4 ">
                <iframe src="{{ asset('storage').'/'.$annonce->getFirstMedia()['id'].'/'.$annonce->getFirstMedia()['file_name']}}" height="550px" width="380px"></iframe>
            </div>
            <div class="col-md-8 ">
                <div class="card-body ml-3">
                    <h5 class="card-title display-4"><b>{{$annonce->title}}</b></h5>
                    <p class="card-text text-justify" style="line-height: 2.3em">{{$annonce->contenu}}</p>
                    <p class="card-text"><small class="text-muted" style=" position:fixed;bottom:45px;">{{$annonce->created_at}}</small></p>
                </div>
                <div class="card-footer ml-3 " style=" position:fixed;bottom:20px;right: 30px;">
                    <a class="btn btn-sm btn-success pull-right " href="{{ URL::to('/annonce/'.$annonce->id.'/pdf') }}">télécharger</a>
                    <a href="{{ url('annonce') }}" class="btn btn-sm btn-primary pull-left">{{ __('Retour') }}</a>
                </div>

            </div>
        </div>
    </div>

@endsection
