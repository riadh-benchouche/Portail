@extends('layouts.app', ['page' => __('Manage Users'), 'pageSlug' => 'Users'])

@section('content')
        <div class="row">
            <div class="col-md-9 mt-1">
                <h1 class="h3 text-white">Department :</h1>
            </div>
            <div class="col-md-3 text-sm-right">
                <a href="{{ url('department/create') }}" class="btn btn-sm btn-primary ">
                    <i class="tim-icons icon-simple-add"></i> Ajouter
                </a>
            </div>
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
                                <button type="button" rel="tooltip" class="btn btn-info btn-sm btn-round btn-icon">
                                    <i class="tim-icons icon-single-02"></i>
                                </button>
                                <button type="button" rel="tooltip" class="btn btn-success btn-sm btn-round btn-icon">
                                    <i class="tim-icons icon-settings"></i>
                                </button>
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
@endsection
