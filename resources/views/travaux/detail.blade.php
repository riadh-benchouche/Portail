@extends('layouts.app', ['page' => __('Manage Users'), 'pageSlug' => 'Users'])
@section('content')

<div class="row">
    <div class="card mb-3 text-center">
        <div class="col-md-8 mr-auto ml-auto mt-3" >
            <img class="card-img-top" src="{{ asset('storage').'/'.$travau ->getFirstMedia()['id'].'/'.$travau ->getFirstMedia()['file_name']}}" alt="Card image cap">
        </div>
        <div class="card-body">
            <h1 class="card-title display-4 mt-3" ><b>{{$travau->title}}</b></h1>
            <p class="card-text text-justify " style="line-height: 2.3em">{{$travau->contenu}}</p>
        </div>
        <div class="card-footer ">
            <p class="card-text"><small class="text-muted pull-right mt-2">{{$travau->created_at}}</small></p>
            <form class="text-center mt-2" action="{{ url('travaux/'.$travau->id) }}" method="post">
                @csrf
                @method('delete')
                <a rel="tooltip" class="btn btn-warning btn-fab btn-icon btn-round " href="{{ url ('travaux/'.$travau->id.'/edit')}}" data-original-title="" title="">
                    <i class="tim-icons icon-pencil" title="edit"></i>
                </a>
                <button type="button" class="btn btn-danger btn-fab btn-icon btn-round " onclick="confirm('{{ __("Êtes vous sûr de vouloir supprimer ?") }}') ? this.parentElement.submit() : ''">
                    <i class="tim-icons icon-trash-simple" title="supprimer"></i>
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
