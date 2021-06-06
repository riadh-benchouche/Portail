@extends('layouts.app', ['page' => __('Manage Users'), 'pageSlug' => 'Users'])

@section('content')
    <div class="row " >
        <div class="col-9">
    <div class="card mb-3 text-center">
        <div class="col-md-12 mr-auto ml-auto mt-3">
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
        </div>
        <div class="col-3">
            @foreach($actualites as $actualite)
            <div class="card" >
                <img class="card-img-top" src="{{ asset('storage').'/'.$actualite ->getFirstMedia()['id'].'/'.$actualite ->getFirstMedia()['file_name']}}" alt="Card image cap">
                <div class="card-body">
                    <p class="card-text"><b>{{$actualite->title}}</b></p>
                </div>
            </div>
                @endforeach
        </div>

    </div>
@endsection
