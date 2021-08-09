@extends('layouts.app', ['page' => __('Manage Users'), 'pageSlug' => 'Users'])
@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card p-2">

                    <div class="d-flex flex-column align-items-center text-center">
                        <img src=" {{ asset('storage').'/'.$g_parlementaire ->getFirstMedia()['id'].'/'.$g_parlementaire ->getFirstMedia()['file_name']}}" alt="logo" width="100px" >
                        <div class="mt-3">
                            <h3 class="h3 text-center text-white">{{$g_parlementaire->name}}</h3>
                        </div>
                    </div>

            </div>
        </div>
        <div class="col-md-8">
                <div class="tab-content text-center">
                    @if( $membre1 == null )
                        <h6 class="mr-2 text-primary" style="font-size: 20px">Liste des membres non a jour</h6>
                    @else
                        <div class="row flex-lg-nowrap">
                            <div class="col mb-3">
                                <div class="card" style="background-color: #4f5167">
                                    <div class="card-body">
                                        <div class="card-header ">
                                            <h6 class="mr-2 text-primary" style="font-size: 20px">Liste des membres du Groupe Parlementaire</h6>
                                        </div>
                                        <div class="e-table">
                                            <div class="table-responsive table-lg mt-3">
                                                <table class="table ">
                                                    <thead>
                                                    <tr>
                                                        <th>Photo</th>
                                                        <th class="max-width">Name</th>
                                                        <th class="sortable">email</th>
                                                        <th>Téléphone</th>
                                                        <th>Commission</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($membres as $membre)
                                                        <tr>
                                                            <td class="align-middle text-center">
                                                                <div class="bg-light d-inline-flex justify-content-center align-items-center align-top" style="width: 35px; height: 35px; border-radius: 3px;"><img @if($membre->getFirstMedia() == null) src="http://style.anu.edu.au/_anu/4/images/placeholders/person_8x10.png" @else  src=" {{ asset('storage').'/'.$membre ->getFirstMedia()['id'].'/'.$membre ->getFirstMedia()['file_name']}}" @endif alt="{{$membre->getFirstMedia()['name']}}"></div>
                                                            </td>
                                                            <td class="text-nowrap align-middle">{{$membre->name}} </td>
                                                            <td class="text-nowrap align-middle"><span>{{$membre->email}}</span></td>
                                                            <td class="text-center align-middle">{{$membre->phone}}</td>
                                                            <td class="text-center align-middle">{{$membre->comissions->name}}</td>

                                                            <td class="text-center align-middle">
                                                                <div class="btn-group align-top">
                                                                    <a href="{{ url('user/'.$membre->id) }}" class="btn btn-info btn-sm  btn-round" >
                                                                        <i class="tim-icons icon-badge font-weight-bold"></i>
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

        </div>
    </div>

@endsection


















