@extends('layouts.app', ['page' => __('Manage Users'), 'pageSlug' => 'Users'])

@section('content')

    <div class="col-md-5 mr-auto ml-auto">
        <div class="card" >
            <div class="row ">
                <div class="col-md-12 ">
                    <iframe src="{{ asset('storage').'/'.$rh->getFirstMedia()['id'].'/'.$rh->getFirstMedia()['file_name']}}" height="550px" width="440px"></iframe>
                </div>
                <div class="col-md-12 ">
                    <div class="card-body">
                        <h5 class="card-title display-4">{{$rh->getFirstMedia()['name']}}</h5>
                        <p class="card-text"><small class="text-muted">{{$rh->created_at}}</small></p>
                    </div>
                    <div class="card-footer mb-3">
                        <a href="{{ url('annonce') }}" class="btn btn-sm btn-primary pull-left mb-3">{{ __('Retour') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
