@extends('layouts.app', ['page' => __('Manage Users'), 'pageSlug' => 'Users'])
@section('content')
    <div class="row gutters-sm">
        <div class="col-md-4 mb-3">
            <div class="card" style="height: 420px">
                <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img    width="150px " src="{{ asset('storage').'/'.$comission ->getFirstMedia()['id'].'/'.$comission ->getFirstMedia()['file_name']}}"  >
                        <div class="mt-3">
                            <p class="text-secondary text-center font-weight-bold mb-2" style="font-size: 15px">{{ $comission->name }}</p>
                            <form class="text-center" action="{{ url('comission/'.$comission->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="button"  class="btn btn-sm  btn-danger " onclick="confirm('{{ __("Êtes vous sûr de vouloir supprimer ?") }}') ? this.parentElement.submit() : ''">
                                    <i class="tim-icons icon-trash-simple" title="supprimer"></i> Supprimer
                                </button>
                            </form>
                            <div class="justify-content-center ">
                                <a href="{{ url('commission/'.$comission->id) }}" class="btn btn-info btn-sm  btn-round" >
                                    <i class="tim-icons icon-badge font-weight-bold"></i>  Consultat
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8" >
            <div class="card  p-sm" style="height: 420px">
                <table class="table">
                    <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th>Nom</th>
                        <th>Nombre d'article</th>
                        <th>Date</th>
                        <th class="text-right">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($lois as $loi)
                    <tr>
                        <td class="text-center">1</td>
                        <td>{{$loi->name}}</td>
                        <td>{{$loi->NbAraticle}}</td>
                        <td>{{$loi->DtAdoptAPN}}</td>
                        <td class="td-actions text-right">
                            <button type="button" rel="tooltip" class="btn btn-info btn-sm btn-icon">
                                <i class="tim-icons icon-single-02"></i>
                            </button>
                            <button type="button" rel="tooltip" class="btn btn-success btn-sm btn-icon">
                                <i class="tim-icons icon-settings"></i>
                            </button>
                            <button type="button" rel="tooltip" class="btn btn-danger btn-sm btn-icon">
                                <i class="tim-icons icon-simple-remove"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
@endsection
