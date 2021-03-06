@extends('layouts.app', ['page' => __('Manage Users'), 'pageSlug' => 'Users'])

@section('content')
    <div class="row">
        <div class="col-md-9 mt-1">
            <h1 class="h3 text-white">Liste Des Groupes Parlementaires </h1>
        </div>
        <div class="col-md-3 text-sm-right">
            <a href="{{ url('G_Parlementaire/create') }}" class="btn btn-sm btn-primary ">
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
                        @foreach($g_parlementaires as $g_parlementaire)
                            <tr>
                                <td class="text-center">{{$g_parlementaire->matricule}}</td>
                                <td>{{$g_parlementaire->name}}</td>
                                <td>{{$g_parlementaire->created_at}}</td>
                                <td class="td-actions text-right">
                                    <form class="text-center " action="{{ url('G_Parlementaire/'.$g_parlementaire->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ url('G_Parlementaire/'.$g_parlementaire->id) }}" class="btn btn-info btn-fab btn-icon btn-round" >
                                            <i class="tim-icons icon-book-bookmark"></i>
                                        </a>
                                        <a rel="tooltip" class="btn btn-warning btn-fab btn-icon btn-round " href="{{ url ('G_Parlementaire/'.$g_parlementaire->id.'/edit')}}" data-original-title="" title="">
                                            <i class="tim-icons icon-pencil" title="edit"></i>
                                        </a>
                                        <button type="button" class="btn btn-danger btn-fab btn-icon btn-round " onclick="confirm('{{ __("??tes vous s??r de vouloir supprimer ?") }}') ? this.parentElement.submit() : ''">
                                            <i class="tim-icons icon-trash-simple" title="supprimer"></i>
                                        </button>
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
