@extends('layouts.app', ['page' => __('Manage Users'), 'pageSlug' => 'Users'])
@section('content')
    <div class="card" xmlns="http://www.w3.org/1999/html">
        <div class="card-header  ">
            <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
            <div class="nav-tabs-navigation">
                <div class="nav-tabs-wrapper">
                    <ul class="nav nav-pills bg-rose">
                        <li class="nav-item "><a class="nav-link  active" href="#pill1" data-toggle="tab">Membres</a></li>
                        <li class="nav-item"><a class="nav-link" href="#pill2" data-toggle="tab">Lois de la comission</a></li>
                        <li class="nav-item"><a class="nav-link" href="#pill3" data-toggle="tab">Travaux de la comission</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="card-body ">
            <div class="tab-content text-center">
                <div class="tab-pane active" id="pill1">
                    @if($president || $membres == null )
                        <h6 class="mr-2 text-primary" style="font-size: 20px">Liste des membres non a jour</h6>
                    @else
                    <div class="row flex-lg-nowrap">
                        <div class="col mb-3">
                            <div class="card" style="background-color: #4f5167">
                                <div class="card-body">
                                    <div class="card-header ">
                                        <h6 class="mr-2 text-primary" style="font-size: 20px">Liste des membres de la comission</h6>
                                    </div>
                                    <div class="e-table">
                                        <div class="table-responsive table-lg mt-3">
                                            <table class="table ">
                                                <thead>
                                                <tr>
                                                    <th>Photo</th>
                                                    <th class="max-width">Name</th>
                                                    <th class="sortable">email</th>
                                                    <th>Role</th>
                                                    <th>Actions</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr style="background-color: #1F1F26">
                                                    <td class="align-middle text-center">
                                                        <div class="bg-light d-inline-flex justify-content-center align-items-center align-top" style="width: 35px; height: 35px; border-radius: 3px;"><img @if($president->getFirstMedia() == null) src="http://style.anu.edu.au/_anu/4/images/placeholders/person_8x10.png " @else  src="{{ asset('storage').'/'.$president ->getFirstMedia()['id'].'/'.$president ->getFirstMedia()['file_name']}}" @endif></div>
                                                    </td>
                                                    <td class="text-nowrap align-middle">{{ $president->name }} {{$president->nom_a}}</td>
                                                    <td class="text-nowrap align-middle"><span>{{ $president->email }}</span></td>
                                                    <td class="text-center align-middle">Président</td>
                                                    <td class="text-center align-middle">
                                                        <div class="btn-group align-top">
                                                            <a href="{{ url('user/'.$president->id) }}" class="btn btn-info btn-sm  btn-round" >
                                                                <i class="tim-icons icon-badge font-weight-bold"></i>  Consulter
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>

                                                @foreach($membres as $membre)
                                                <tr>

                                                    <td class="align-middle text-center">
                                                        <div class="bg-light d-inline-flex justify-content-center align-items-center align-top" style="width: 35px; height: 35px; border-radius: 3px;"><img @if($membre->getFirstMedia() == null) src="http://style.anu.edu.au/_anu/4/images/placeholders/person_8x10.png" @else  src=" {{ asset('storage').'/'.$membre ->getFirstMedia()['id'].'/'.$membre ->getFirstMedia()['file_name']}}" @endif></div>
                                                    </td>
                                                    <td class="text-nowrap align-middle">{{$membre->name}} {{ $membre->nom_a }}</td>
                                                    <td class="text-nowrap align-middle"><span>{{$membre->email}}</span></td>
                                                    <td class="text-center align-middle">membre</td>
                                                    <td class="text-center align-middle">
                                                        <div class="btn-group align-top">
                                                            <a href="{{ url('user/'.$membre->id) }}" class="btn btn-info btn-sm  btn-round" >
                                                                <i class="tim-icons icon-badge font-weight-bold"></i>  Consulter
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach

                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <ul class="pagination mt-3 mb-0">
                                                {{ $membres -> links() }}
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>

                        @endif

                </div>


                <div class="tab-pane" id="pill2">
                        <div class="content">
                            <div class="row " >
                                <div class="col-md-12" >
                                    <div class="card" style="background-color: #4f5167">
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
                                                        <td class="text-center">@if($loi->etat == 4 ) Terminer @else en Cours @endif</td>
                                                        <td class="td-actions text-right">
                                                            <a href="{{url('loisdetails/'.$loi->id)}}" type="button" rel="tooltip" class="btn btn-info btn-sm btn-icon">
                                                                <i class="tim-icons icon-single-02"></i>
                                                            </a>
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
                                        <div class="card-footer">
                                            <div class="pagination page-item justify-content-center" >
                                                {{ $loisp -> links() }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="tab-pane" id="pill3">
                    <div class=" text-sm-right mb-2">
                        <a href="{{ url('travaux/create') }}" class="btn btn-sm btn-primary ">
                            <i class="tim-icons icon-simple-add"></i> Ajouter
                        </a>
                    </div>
                    <div class="row mx-3">
                        @foreach( $travaux as $travau )
                            <div class="col-4">
                        <div class="card" style="background-color: #4f5167" >
                            <img class="card-img-top" src="{{ asset('storage').'/'.$travau ->getFirstMedia()['id'].'/'.$travau ->getFirstMedia()['file_name']}}" alt="Card image cap">
                            <div class="card-body">
                                <h4 class="card-title">{{substr($travau->name,0,150)}}</h4>
                                <p class="card-text">{{substr($travau->contenu,0,200)}}</p>
                                <a href="{{ url('travaux/'.$travau->id) }}" class="btn btn-sm btn-info">
                                    <i class="tim-icons icon-book-bookmark"></i> Détail
                                </a>
                            </div>
                        </div>
                            </div>
                            @endforeach
                            <div class="card-footer">
                                <div class="pagination page-item justify-content-center" >
                                    {{ $travaux -> links() }}
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
