@extends('layouts.app', ['page' => __('Manage Users'), 'pageSlug' => 'Users'])

@section('content')

    <div class="container">
        <div class="card" >
            <div class="card-header bg-dark">
                <div class="form-inline">
                <img  class=" d-flex mr-3 mb-3"  width="90px " src="{{ asset('storage').'/'.$comission ->getFirstMedia()['id'].'/'.$comission ->getFirstMedia()['file_name']}}">
                <h1 class=" d-flex card-title display-4">Membre de la comission {{$comission->name}}</h1>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach($users as $user)
                        <div class="col-lg-4">
                            <div class="card m-b-30 bg-gray-800" >
                                <div class="card-body">
                                    <div class="media">
                                        @if($user->getFirstMedia() == null)
                                            <img class="d-flex mr-3 rounded-circle img-thumbnail thumb-lg" src="http://style.anu.edu.au/_anu/4/images/placeholders/person_8x10.png" alt="Generic placeholder image" width="106px">
                                        @else
                                            <img  class="d-flex mr-3 rounded-circle img-thumbnail thumb-lg"  width="90px " src="{{ asset('storage').'/'.$user ->getFirstMedia()['id'].'/'.$user ->getFirstMedia()['file_name']}}"  >
                                        @endif
                                        <div class="media-body">
                                            <h5 class="mt-0 font-weight-bold mb-1" style="font-size: 16px">{{$user->name}}</h5>
                                            <p class="text-muted font-weight-900" style="font-size: 16px">{{$user->nom_a }}</p>
                                            @if($user->nom_a ==null) <br>
                                            @endif
                                            <div class="card-footer mt-2">
                                                <div class="justify-content-center ">
                                                    <a href="{{ url('user/'.$user->id) }}" class="btn btn-info btn-sm  btn-round" >
                                                        <i class="tim-icons icon-badge font-weight-bold"></i>  Consultat
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                        @foreach($membre as $membres)
                            <div class="col-lg-4">
                                <div class="card m-b-30 bg-gray-800" >
                                    <div class="card-body">
                                        <div class="media">
                                            @if($membres->getFirstMedia() == null)
                                                <img class="d-flex mr-3 rounded-circle img-thumbnail thumb-lg" src="http://style.anu.edu.au/_anu/4/images/placeholders/person_8x10.png" alt="Generic placeholder image" width="106px">
                                            @else
                                                <img  class="d-flex mr-3 rounded-circle img-thumbnail thumb-lg"  width="90px " src="{{ asset('storage').'/'.$membres ->getFirstMedia()['id'].'/'.$membres ->getFirstMedia()['file_name']}}"  >
                                            @endif
                                            <div class="media-body">
                                                <h5 class="mt-0 font-weight-bold mb-1" style="font-size: 16px">{{$membres->name}}</h5>
                                                <p class="text-muted font-weight-900" style="font-size: 16px">{{$membres->nom_a }}</p>
                                                @if($membres->nom_a ==null) <br>@endif
                                                <div class="card-footer mt-2">
                                                    <div class="justify-content-center ">
                                                        <a href="{{ url('user/'.$membres->id) }}" class="btn btn-info btn-sm  btn-round" >
                                                            <i class="tim-icons icon-badge font-weight-bold"></i>  Consultat
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                </div>
                <div class="card-footer">
                    <div class="pagination page-item justify-content-center" >

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
