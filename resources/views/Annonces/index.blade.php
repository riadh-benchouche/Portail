@extends('layouts.app', ['page' => __('Manage Users'), 'pageSlug' => 'Users'])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card bg-gray-800">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-8">
                                <h4 class="card-title">Annonces</h4>
                            </div>
                            @can('adminp')
                                <div class=" col-4 text-right pull-right mb-2">
                                    <a href="{{ url('annonce/create') }}" class="btn btn-sm btn-primary ">
                                        <i class="tim-icons icon-simple-add"></i> Ajouter
                                    </a>
                                </div>
                            @endcan
                        </div>
                    </div>

                    <div class="row">
                        @foreach($annonces as $annonce)
                            @if($annonce->type == 'option1')
                                <div class="col-md-5 ml-auto mr-auto">
                                    <div class="card">
                                        <div class="card-header card-header-icon bg-info">
                                            <div class="card-icon">
                                               <i class="tim-icons icon-volume-98 display-4 " style="height: 45px"> </i>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <h4 class="card-title display-4">{{substr($annonce->title,0,20)}}...</h4>
                                            <p class="card-plain">{{substr($annonce->contenu,0,100)}}...</p>
                                        </div>
                                        <div class="card-footer">
                                            <form class="text-center " action="{{ url('annonce/'.$annonce->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <a href="{{ url('annonce/'.$annonce->id) }}" class="btn btn-info btn-fab btn-icon btn-round" >
                                                    <i class="tim-icons icon-book-bookmark"></i>
                                                </a>
                                                <a rel="tooltip" class="btn btn-warning btn-fab btn-icon btn-round " href="{{ url ('annonce/'.$annonce->id.'/edit')}}" data-original-title="" title="">
                                                    <i class="tim-icons icon-pencil" title="edit"></i>
                                                </a>
                                                <button type="button" class="btn btn-danger btn-fab btn-icon btn-round " onclick="confirm('{{ __("Êtes vous sûr de vouloir supprimer ?") }}') ? this.parentElement.submit() : ''">
                                                    <i class="tim-icons icon-trash-simple" title="supprimer"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endif
                                @if($annonce->type == 'option2')
                                    <div class="col-md-5 ml-auto mr-auto">
                                        <div class="card">
                                            <div class="card-header card-header-icon bg-success">
                                                <div class="card-icon">
                                                    <i class="tim-icons icon-pin display-4" style="height: 45px"></i>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <h4 class="card-title display-4">{{substr($annonce->title,0,20)}}...</h4>
                                                <p class="card-plain">{{substr($annonce->contenu,0,100)}}...</p>
                                            </div>
                                            <div class="card-footer">
                                                <form class="text-center" action="{{ url('annonce/'.$annonce->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <a href="{{ url('annonce/'.$annonce->id) }}" class="btn btn-info btn-fab btn-icon btn-round" >
                                                        <i class="tim-icons icon-book-bookmark"></i>
                                                    </a>
                                                    <a rel="tooltip" class="btn btn-warning btn-fab btn-icon btn-round " href="{{ url ('annonce/'.$annonce->id.'/edit')}}" data-original-title="" title="">
                                                        <i class="tim-icons icon-pencil" title="edit"></i>
                                                    </a>
                                                    <button type="button" class="btn btn-danger btn-fab btn-icon btn-round " onclick="confirm('{{ __("Êtes vous sûr de vouloir supprimer ?") }}') ? this.parentElement.submit() : ''">
                                                        <i class="tim-icons icon-trash-simple" title="supprimer"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>






@endsection
