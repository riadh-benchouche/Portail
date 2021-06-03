@extends('layouts.app', ['page' => __('Manage Users'), 'pageSlug' => 'Users'])

@section('content')
    <div class="card mb-3 text-center">
        <div class="col-md-12 mt-3">
            <img  src="{{ asset('storage').'/'.$actualite ->getFirstMedia()['id'].'/'.$actualite ->getFirstMedia()['file_name']}}" >
        </div>
        <div class="card-body">
            <h1 class="card-title display-4 mt-3" ><b>{{$actualite->title}}</b></h1>
            <p class="card-text text-justify " style="line-height: 2.3em">{{$actualite->contenu}}</p>
        </div>
        <div class="card-footer ">
            <p class="card-text"><small class="text-muted pull-right mt-2">{{$actualite->created_at}}</small></p>
            <a href="{{ url('actualite') }}" class="btn btn-sm btn-primary pull-left">{{ __('Retour') }}</a>
        </div>
    </div>
@endsection
