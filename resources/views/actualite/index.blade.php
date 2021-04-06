@extends('layouts.app', ['page' => __('Manage Users'), 'pageSlug' => 'Users'])

@section('content')
    <div class=" text-sm-right mb-2">
        <a href="{{ url('actualite/create') }}" class="btn btn-sm btn-primary ">
            <i class="tim-icons icon-simple-add"></i> Ajouter
        </a>
    </div>
    <div class="content">
        <div class="row " >
            @foreach($actualites as $actualite)

                <div class="card mb-3 ml-2 mr-2" >
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img  src="{{ asset('storage').'/'.$actualite ->getFirstMedia()['id'].'/'.$actualite ->getFirstMedia()['file_name']}}" >
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h2 class="card-title"><b>{{substr($actualite ->title,0,60)}}...</b></h2>
                                <p class="card-text">{{substr($actualite ->contenu,0,250)}}...</p>
                                <div class="card-footer">
                                <form class="text-center align-text-bottombottom mt-2" action="{{ url('actualite/'.$actualite->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <a href="{{ url('actualite/'.$actualite->id) }}" class="btn btn-info btn-fab btn-icon btn-round" >
                                        <i class="tim-icons icon-book-bookmark"></i>
                                    </a>
                                    <a rel="tooltip" class="btn btn-warning btn-fab btn-icon btn-round " href="{{ url ('actualite/'.$actualite->id.'/edit')}}" data-original-title="" title="">
                                        <i class="tim-icons icon-pencil" title="edit"></i>
                                    </a>
                                    <button type="button" class="btn btn-danger btn-fab btn-icon btn-round " onclick="confirm('{{ __("Êtes vous sûr de vouloir supprimer ?") }}') ? this.parentElement.submit() : ''">
                                        <i class="tim-icons icon-trash-simple" title="supprimer"></i>
                                    </button>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="exampleModal{{$actualite->id}}"  data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title" id="exampleModalLabel">{{$actualite ->title}}</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body ">
                                <img src="{{ asset('storage').'/'.$actualite ->getFirstMedia()['id'].'/'.$actualite ->getFirstMedia()['file_name']}}" width="450px">
                                <p class="text-center">{{$actualite -> contenu}}</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Fermer</button>
                            </div>
                        </div>
                    </div>
                </div>

            @endforeach
                <script>
                    $('#exampleModal{{$actualite->id}}').modal('show');
                </script>
        </div>
    </div>





@endsection
