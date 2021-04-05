@extends('layouts.app', ['page' => __('Manage Users'), 'pageSlug' => 'Users'])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card bg-gray-900">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-8">
                                <h4 class="card-title">Ressources humaines</h4>
                            </div>
                            @can('adminp')
                                <div class=" col-4 text-right pull-right mb-2">
                                    <a href="{{ url('rh/create') }}" class="btn btn-sm btn-primary ">
                                        <i class="tim-icons icon-simple-add"></i> Ajouter
                                    </a>
                                </div>
                            @endcan
                        </div>
                    </div>

                    <div class="row">
            @foreach($rhs as $rh)
                <div class="col-md-5 ml-auto mr-auto" >
                <div class="card mb-3 bg-gray-800"   >
                    <div class="row g-0">
                        <div class="col-md-4">
                            <iframe  src="{{ asset('storage').'/'.$rh ->getFirstMedia()['id'].'/'.$rh ->getFirstMedia()['file_name']}}" height="200px" width="170px"></iframe>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body ml-2">
                                <h2 class="card-title"><b>{{$rh ->getFirstMedia()['name']}}</b></h2>
                                <p class="card-text">{{ $rh -> getFirstMedia()['created_at'] }}</p>
                                <div class="card-footer">
                                    <form class="text-center  mt-3" action="{{ url('rh/'.$rh->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="button" class="btn btn-info btn-fab btn-icon btn-round" data-toggle="modal" data-target="#exampleModal{{$rh->id}}">
                                            <i class="tim-icons icon-book-bookmark"></i>
                                        </button>
                                        <button type="button" class="btn btn-danger btn-fab btn-icon btn-round " onclick="confirm('{{ __("Êtes vous sûr de vouloir supprimer ?") }}') ? this.parentElement.submit() : ''">
                                            <i class="tim-icons icon-trash-simple" title="supprimer"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>


                <div class="modal fade" id="exampleModal{{$rh->id}}"  data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">{{$rh ->getFirstMedia()['name']}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body ">
                                <iframe  src="{{ asset('storage').'/'.$rh ->getFirstMedia()['id'].'/'.$rh ->getFirstMedia()['file_name']}}" width="450px" height="500px"></iframe>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Fermer</button>
                                <a  href="{{ route('downloadfile',$rh->id) }}" type="button" class="btn btn-sm btn-primary">Télécharger</a>
                            </div>
                        </div>
                    </div>
                </div>

            @endforeach
        </div>
                </div>
    </div>
        </div>
    </div>






@endsection
