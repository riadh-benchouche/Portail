@extends('layouts.app', ['page' => __('Manage Users'), 'pageSlug' => 'Users'])
@section('content')
    <div class="card" xmlns="http://www.w3.org/1999/html">
        <div class="card-header  ">
            <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
            <div class="nav-tabs-navigation">
                <div class="nav-tabs-wrapper">
                    <ul class="nav nav-pills bg-rose">
                        <li class="nav-item "><a class="nav-link  active" href="#pill1" data-toggle="tab">Membres</a></li>
                        <li class="nav-item"><a class="nav-link" href="#pill2" data-toggle="tab">Services</a></li>
                        <li class="nav-item"><a class="nav-link" href="#pill3" data-toggle="tab">Bibliotheques</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="card-body ">
            <div class="tab-content text-center">
                <div class="tab-pane active" id="pill1">
                    @if( $membre1 == null )
                        <h6 class="mr-2 text-primary" style="font-size: 20px">Liste des membres non a jour</h6>
                    @else
                        <div class="row flex-lg-nowrap">
                            <div class="col mb-3">
                                <div class="card" style="background-color: #4f5167">
                                    <div class="card-body">
                                        <div class="card-header ">
                                            <h6 class="mr-2 text-primary" style="font-size: 20px">Liste des membres de la Direction</h6>
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
                                                    @foreach($membres as $membre)
                                                        <tr>
                                                            <td class="align-middle text-center">
                                                                <div class="bg-light d-inline-flex justify-content-center align-items-center align-top" style="width: 35px; height: 35px; border-radius: 3px;"><img @if($membre->getFirstMedia() == null) src="http://style.anu.edu.au/_anu/4/images/placeholders/person_8x10.png" @else  src=" {{ asset('storage').'/'.$membre ->getFirstMedia()['id'].'/'.$membre ->getFirstMedia()['file_name']}}" @endif></div>
                                                            </td>
                                                            <td class="text-nowrap align-middle">{{$membre->name}} {{ $membre->nom_a }}</td>
                                                            <td class="text-nowrap align-middle"><span>{{$membre->email}}</span></td>
                                                            <td class="text-center align-middle">{{$membre->name}}</td>
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
                    <div class="row">
                        <div class="pull-left col-md-9 mt-1">
                            <h1 class="h3 pull-left text-white">Service :</h1>
                        </div>
                        <div class="col-md-3 text-sm-right">
                            <a href="{{ url('department/create') }}" class="btn btn-sm btn-primary ">
                                <i class="tim-icons icon-simple-add"></i> Ajouter
                            </a>
                        </div>
                    </div>
                    <div class="content">
                        <div class="row mt-1" >
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
                                        @foreach($services as $service)
                                            <tr>
                                                <td class="text-center">{{$service->matricule}}</td>
                                                <td>{{$service->name}}</td>
                                                <td>{{$service->created_at}}</td>
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
                <div class="tab-pane" id="pill3">
                    <div class="row ml-auto mr-auto">
                        <div class="col-12">
                            <div class="row ml-auto mr-auto">
                                <h1 class="ml-auto mr-auto mt-1 text-primary h3">Document Partagés </h1>
                            </div>
                            <div class="row  mb-3 ml-auto mr-auto">
                                @if($partages != null)
                                @foreach($partages as $partage)
                                    <div class="col-md-3 text-center ">
                                        <div class="file-img-box"><img src="https://coderthemes.com/highdmin/layouts/assets/images/file_icons/pdf.svg" alt="icon"></div>
                                        <a href="#" class="file-download text-center"><i class="fa fa-download text-center"></i></a>
                                        <div class="file-man-title">
                                            <h5 class="mb-0 text-overflow text-center">{{substr($partage->getFirstMedia()['file_name'],0,10)}}</h5>
                                            <p class="mb-0 text-center"><small>{{$partage->getFirstMedia()['human_readable_size']}}</small></p>
                                        </div>
                                    </div>
                                @endforeach
                                @endif
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
