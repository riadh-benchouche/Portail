@extends('layouts.app', ['page' => __('Manage Users'), 'pageSlug' => 'Users'])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-8">
                                <h4 class="card-title">Bibliotheque Universelles</h4>
                            </div>
                            @can('adminp')
                            <div class="col-4 text-sm-right">
                                <a href="{{ url('bibu/create') }}" class="btn btn-sm btn-primary ">
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
                                    <th scope="col">Name</th>
                                    <th scope="col">Creation Date</th>
                                    <th scope="col">Fichier</th>
                                    @can('adminp')
                                    <th scope="col">Action</th>
                                    @endcan
                                </tr>
                                </thead>
                                <tbody class="text-center">
                                @foreach ($bibls as $bibl)
                                    <tr>
                                        <td>{{ $bibl ->getFirstMedia()['name']}}</td>
                                        <td>{{ $bibl -> getFirstMedia()['created_at'] }}</td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-primary btn-round" data-toggle="modal" data-target="#exampleModal{{$bibl->id}}">
                                                <i class="tim-icons icon-book-bookmark"></i> Consulter
                                            </button>
                                        </td>
                                        @can('adminp')
                                        <td class="text-center">
                                            <form action="{{ url('bibu/'.$bibl->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="button" class="btn btn-sm btn-danger btn-round" onclick="confirm('{{ __("Êtes vous sûr de vouloir supprimer ?") }}') ? this.parentElement.submit() : ''">
                                                    <i class="tim-icons icon-trash-simple"></i> Supprimer
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endcan
                                    <div class="modal fade" id="exampleModal{{$bibl->id}}"  data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">{{$bibl ->getFirstMedia()['name']}}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body ">
                                                    <iframe  src="{{ asset('storage').'/'.$bibl ->getFirstMedia()['id'].'/'.$bibl ->getFirstMedia()['file_name']}}" width="450px" height="500px"></iframe>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Fermer</button>
                                                    <a  href="{{ route('downloadfileu',$bibl->id) }}" type="button" class="btn btn-sm btn-primary">Télécharger</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">

                        </nav>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
