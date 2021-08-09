@extends('layouts.app', ['page' => __('Manage Users'), 'pageSlug' => 'Users'])

@section('content')
        <div class="row">
            <div class="col-md-9 mt-1">
                <h1 class="h1 font-weight-bold text-white">Les Directions</h1>
            </div>
            @can('edit')
            <div class="col-md-3 text-sm-right">
                <a href="{{ url('department/create') }}" class="btn btn-sm btn-primary ">
                    <i class="tim-icons icon-simple-add"></i> Ajouter
                </a>
            </div>
                @endcan
        </div>
    <div class="content">
        <div class="row mt-3" >
            <div class="col-md-12 ml-auto mr-auto">
                <div class="card">
                    <table class="table">
                        <thead>
                        <tr>
                            <th class="text-center">Matricule</th>
                            <th>Nom</th>
                            <th>Date</th>
                            <th class="text-right">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($departments as $depatment)
                        <tr>
                            <td class="text-center">{{$depatment->matricule}}</td>
                            <td>{{$depatment->name}}</td>
                            <td>{{$depatment->created_at}}</td>
                            <td class="td-actions text-right">
                                <form class="text-center " action="{{ url('department/'.$depatment->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <a href="{{ url('department/'.$depatment->id) }}" class="btn btn-info btn-fab btn-icon btn-round" >
                                        <i class="tim-icons icon-book-bookmark"></i>
                                    </a>
                                    @can('edit')
                                    <a rel="tooltip" class="btn btn-warning btn-fab btn-icon btn-round " href="{{ url ('department/'.$depatment->id.'/edit')}}" data-original-title="" title="">
                                        <i class="tim-icons icon-pencil" title="edit"></i>
                                    </a>
                                    <button type="button" class="btn btn-danger btn-fab btn-icon btn-round " onclick="confirm('{{ __("Êtes vous sûr de vouloir supprimer ?") }}') ? this.parentElement.submit() : ''">
                                        <i class="tim-icons icon-trash-simple" title="supprimer"></i>
                                    </button>
                                    @endcan
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection
