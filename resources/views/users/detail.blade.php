@extends('layouts.app', ['page' => __('Manage Users'), 'pageSlug' => 'Users'])

@section('content')
    <div class="card mb-3 text-center">
        <div class="col-md-2 mt-3 ">
            <img  src="{{ asset('storage').'/'.$user ->getFirstMedia()['id'].'/'.$user ->getFirstMedia()['file_name']}}" >
        </div>
        <div class="card-body">
            <h1 class="card-title display-4 mt-3" ><b>{{$user->name}}</b></h1>
            <p class="card-text text-justify " style="line-height: 2.3em">{{$user->nom_a}}</p>
        </div>

        <div class="card-footer ">
            <a href="{{ url('user') }}" class="btn btn-sm btn-primary pull-left">{{ __('Retour') }}</a>
            <form class="pull-right" action="{{ url('user/'.$user->id) }}" method="post">
                @csrf
                @method('delete')

                <a rel="tooltip" class="btn btn-sm btn-warning  btn-round " href="{{ url ('user/'.$user->id.'/edit')}}" data-original-title="" title="">
                    <i class="tim-icons icon-pencil" title="edit"></i> Consulter
                </a>
                <button type="button" class="btn btn-sm btn-danger btn-round " onclick="confirm('{{ __("Êtes vous sûr de vouloir supprimer ?") }}') ? this.parentElement.submit() : ''">
                    <i class="tim-icons icon-trash-simple" title="supprimer"></i> Supprimer
                </button>
            </form>
        </div>
    </div>
@endsection
