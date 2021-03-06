@extends('layouts.app', ['page' => __('Manage Users'), 'pageSlug' => 'Users'])

@section('content')

    <div class=" text-sm-right mb-2">
        <div class="row">
            <div class="col-md-10">
                <h1 class="title text-white h1 font-weight-bold">Commissions permanentes</h1>
            </div>
            @can('edit')
            <div class="col-md-2">
                <a href="{{ url('commission/create') }}" class="btn btn-sm btn-primary ">
                    <i class="tim-icons icon-simple-add"></i> Ajouter
                </a>
            </div>
                @endcan
        </div>
    </div>
    <div class="content">
        <div class="row " >
            @foreach($commissions as $commission)
                <div class="col-md-3">
                    @if($commission->getFirstMedia() == null )
                    @else
            <img  class="mr-auto ml-auto " src="{{ asset('storage').'/'.$commission ->getFirstMedia()['id'].'/'.$commission ->getFirstMedia()['file_name']}}" width="150px">
                        <h3  class="text-center my-3"><b><a href="{{'commission/'.$commission->id}}" >Commission {{$commission->name}}</a></b></h3>
                    @endif
                </div>
                    @endforeach
        </div>
    </div>
@endsection
