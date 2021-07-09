@extends('layouts.app', ['page' => __('loist'), 'pageSlug' => 'loist'])
@section('content')
    <div class="content">
        <div class="row " >
            <div class="col-md-12" >
                <div class="card" >
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6 text-left mt-2 " style="font-size: 20px">
                                <h1 class="text-left text-primary"><b>Les Lois Terminer</b></h1>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Nom</th>
                                <th>Comission</th>
                                <th>Date</th>
                                <th class="text-center">Nombre d'article</th>
                                <th class="text-center">etat</th>
                                <th class="text-right">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($loisp as $loi)
                                <tr>
                                    <td class="text-center">{{$loi->id}}</td>
                                    <td>{{$loi->name}}</td>
                                    <td>{{$loi->comissions->name}}</td>
                                    <td>{{$loi->DtDepot}}</td>
                                    <td class="text-center">{{$loi->NbAraticle}}</td>
                                    <td class="text-center">@if($loi->etat == 4 ) Terminer @endif</td>
                                    <td class="td-actions text-right">
                                        <form class="text-center " action="{{ url('loisdelete/'.$loi->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <a href="{{url('loisdetails/'.$loi->id)}}" type="button" rel="tooltip" class="btn btn-info btn-sm btn-icon">
                                                <i class="tim-icons icon-book-bookmark"></i>
                                            </a>
                                            <button type="button" class="btn btn-danger btn-fab btn-icon btn-round " onclick="confirm('{{ __("Êtes vous sûr de vouloir supprimer ?") }}') ? this.parentElement.submit() : ''">
                                                <i class="tim-icons icon-trash-simple" title="supprimer"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        <div class="pagination page-item justify-content-center" >
                            {{ $loisp -> links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
