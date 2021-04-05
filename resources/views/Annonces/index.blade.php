@extends('layouts.app', ['page' => __('Manage Users'), 'pageSlug' => 'Users'])

@section('content')
    <div class="content">
    <div class="row">
        @foreach($annonces as $annonce)
            @if($annonce->type == 'option1')
                <div class="col-md-6">
                    <div class="card ">
                        <div class="card-header card-header-text color-label bg-light">
                            <div class="card-text">
                                <h4 class="card-title text-dark"><b>{{$annonce->title}}</b></h4>
                            </div>
                        </div>
                        <div class="card-body">
                            {{substr($annonce->contenu,0,150)}}
                        </div>
                        <div class="card-footer">
                            <form class="text-center" action="{{ url('annonce/'.$annonce->id) }}" method="post">
                                @csrf
                                @method('delete')
                     <!--           <button type="button" class="btn btn-info btn-fab btn-icon btn-round" data-toggle="modal" data-target="#exampleModal{{$annonce->id}}">
                                    <i class="tim-icons icon-book-bookmark"></i>
                                </button> -->
                                    <a href="{{ url('annonce/'.$annonce->id) }}" class="btn btn-info btn-fab btn-icon btn-round" >
                                        <i class="tim-icons icon-book-bookmark"></i>
                                    </a>
                                <a rel="tooltip" class="btn btn-warning btn-fab btn-icon btn-round  " href="{{ url ('annonce/'.$annonce->id.'/edit')}}" data-original-title="" title="">
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

        <div class="col-md-6">
            <div class="card">
                <div class="card-header header-title bg-info" >
                    <div class="card-text text-dark" style="color: #0a0c0d">
                        <h4 class="card-title">{{$annonce->title}}</h4>
                    </div>
                </div>
                <div class="card-body  " >
                    {{substr($annonce->contenu,0,150)}}
                </div>
                <div class="card-footer" >
                    <form class="text-center" action="{{ url('annonce/'.$annonce->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <a href="{{ url('annonce/'.$annonce->id) }}" class="btn btn-info btn-fab btn-icon btn-round" >
                            <i class="tim-icons icon-book-bookmark"></i>
                        </a>
                        <a rel="tooltip" class="btn btn-warning btn-fab btn-icon btn-round  " href="{{ url ('annonce/'.$annonce->id.'/edit')}}" data-original-title="" title="">
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
                <div class="modal fade" id="exampleModal{{$annonce->id}}"  data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title" id="exampleModalLabel"><b>{{$annonce ->title}}</b></h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body ">
                                <p class="text-center">{{$annonce -> contenu}}</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Fermer</button>
                                <a class="btn btn-sm btn-primary" href="{{ URL::to('/annonce/'.$annonce->id.'/pdf') }}">télécharger</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
    </div>
    </div>
@endsection
