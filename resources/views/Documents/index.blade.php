@extends('layouts.app', ['page' => __('Manage Users'), 'pageSlug' => 'Users'])
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card bg-gray-900">
                <div class="card-header">
                    <div class="row">
                        <div class="col-10">
                            <h4 class="card-title h1 text-white font-weight-bold">Documents législatifs</h4>
                        </div>
                        @can('edit')
                            <div class=" col-2 text-right pull-right mb-2">
                                <a href="{{ url('documents/create') }}" class="btn btn-sm btn-primary ">
                                    <i class="tim-icons icon-simple-add"></i> Ajouter
                                </a>
                            </div>
                        @endcan
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="container-fluid">
                            <div class="card  p-1  ">
                                <table class="table ">
                                    <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Type de document</th>
                                        <th class="text-center">Date</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($bibls as $bibu)
                                        <tr>
                                            <td class="text-center">{{$bibu->id}}</td>
                                            <td class="text-center">{{$bibu->name}}</td>
                                            <td class="text-center">{{$bibu->categories->name}}</td>
                                            <td class="text-center">{{$bibu->created_at}}</td>
                                            <td class="td-actions text-center">
                                                <form class="text-center " action="{{ url('bibu/'.$bibu->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="button" class="btn btn-info btn-fab btn-icon btn-round" data-toggle="modal" data-target="#exampleModal{{$bibu->id}}">
                                                        <i class="tim-icons icon-book-bookmark"></i>
                                                    </button>
                                                    @can('edit')
                                                        <button type="button" class="btn btn-danger btn-fab btn-icon btn-round " onclick="confirm('{{ __("Êtes vous sûr de vouloir supprimer ?") }}') ? this.parentElement.submit() : ''">
                                                            <i class="tim-icons icon-trash-simple" title="supprimer"></i>
                                                        </button>
                                                    @endcan
                                                </form>
                                                <div class="modal fade" id="exampleModal{{$bibu->id}}"  data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">{{$bibu ->getFirstMedia()['name']}}</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body ">
                                                                <iframe  src="{{ asset('storage').'/'.$bibu ->getFirstMedia()['id'].'/'.$bibu ->getFirstMedia()['file_name']}}" width="450px" height="500px"></iframe>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Fermer</button>
                                                                <a  href="{{ url('/document/download/'.$bibu->id) }}" type="button" class="btn btn-sm btn-primary">Télécharger</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
