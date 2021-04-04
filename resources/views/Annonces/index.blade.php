@extends('layouts.app', ['page' => __('Manage Users'), 'pageSlug' => 'Users'])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-8">
                                <h4 class="card-title"><strong>Annonces et circulaires dynamiques</strong></h4>
                            </div>
                            @can('adminp')
                            <div class="col-4 text-sm-right">
                                <a href="{{ url('annonce/create') }}" class="btn btn-sm btn-primary ">
                                    <i class="tim-icons icon-simple-add"></i> Ajouter
                                </a>
                            </div>
                                @endcan
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="">
                            <table class="table tablesorter " id="">
                                <thead class=" text-primary text-center">
                                <tr>
                                    <th scope="col">Title</th>
                                    <th scope="col">Creation Date</th>
                                    <th scope="col">Details</th>
                                    @can('adminp')
                                    <th scope="col">Action</th>
                                    @endcan
                                </tr>
                                </thead>
                                <tbody class="text-center">
                                @foreach ($annonces as $annonce)
                                    <tr>
                                        <td>{{ $annonce -> title}}</td>
                                        <td>{{ $annonce -> created_at }}</td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-info btn-round" data-toggle="modal" data-target="#exampleModal{{$annonce->id}}">
                                                <i class="tim-icons icon-book-bookmark"></i> Consulter
                                            </button>
                                        </td>
                                        @can('adminp')
                                        <td class="text-center">
                                            <form action="{{ url('annonce/'.$annonce->id) }}" method="post">
                                                @csrf
                                                @method('delete')

                                                <a rel="tooltip" class="btn btn-warning btn-fab btn-icon btn-round mr-1 " href="{{ url ('annonce/'.$annonce->id.'/edit')}}" data-original-title="" title="">
                                                    <i class="tim-icons icon-pencil" title="edit"></i>
                                                </a>
                                                <button type="button" class="btn btn-danger btn-fab btn-icon btn-round " onclick="confirm('{{ __("Êtes vous sûr de vouloir supprimer ?") }}') ? this.parentElement.submit() : ''">
                                                    <i class="tim-icons icon-trash-simple" title="supprimer"></i>
                                                </button>




                                            </form>
                                        </td>
                                        @endcan
                                    </tr>
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
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

@endsection
