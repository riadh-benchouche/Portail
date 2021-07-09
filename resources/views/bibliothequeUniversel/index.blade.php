@extends('layouts.app', ['page' => __('Manage Users'), 'pageSlug' => 'Users'])
@section('content')
<div class="row">
            <div class="col-md-12">
                <div class="card bg-gray-900">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-8">
                                <h4 class="card-title">Bibliotheque Universel</h4>
                            </div>
                                <div class=" col-4 text-right pull-right mb-2">
                                    <a href="{{ url('bibu/create') }}" class="btn btn-sm btn-primary ">
                                        <i class="tim-icons icon-simple-add"></i> Ajouter
                                    </a>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="container-fluid">
                                <div class="card p-3" style="background-color: white">
                                    <img src="{{asset('black/img/organisation.png')}}" alt="organigramme">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="container-fluid">
                                <div class="card  p-1  ">
                                    <table class="table ">
                                        <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">Name</th>
                                            <th class="text-center">Actions</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($bibls as $bibu)
                                            <tr>
                                            <td class="text-center">2</td>
                                            <td>John Doe</td>
                                            <td>Design</td>
                                            <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" class="btn btn-success btn-sm btn-round btn-icon">
                                                    <i class="tim-icons icon-settings"></i>
                                                </button>

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
                                                                <a  href="{{ route('downloadfileu',$bibu->id) }}" type="button" class="btn btn-sm btn-primary">Télécharger</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="button" rel="tooltip" class="btn btn-danger btn-sm btn-round btn-icon">
                                                    <i class="tim-icons icon-simple-remove"></i>
                                                </button>
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
