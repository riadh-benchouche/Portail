@extends('layouts.app', ['page' => __('Manage Users'), 'pageSlug' => 'Users'])

@section('content')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('users.searchf')}}" autocomplete="off">
                            <h6 class="heading-small text-muted mb-4">{{ __('Filtrer') }}</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label class="form-control-label" for="input-password">{{ __('Recherche par Matricule') }}</label>
                                                    <input type="text" name="m" id="input-password" class="form-control form-control-alternative{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Matricule') }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label class="form-control-label" for="input-password">{{ __('Recherche par nom') }}</label>
                                                    <input type="text" name="n" id="input-password" class="form-control form-control-alternative{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Nom') }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-control-label" for="input-president">{{ __('Recherche par Directions') }}</label>
                                            <select name="dir" class="form-control bg-dark" id="input-president" >
                                                <option value="" selected ></option>
                                                @foreach($directions as $direction)
                                                    <option value="{{$direction->id}}" >{{ $direction ->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-control-label" for="input-commission">{{ __('Recherche par Sous-direction') }}</label>
                                            <select name="ser" class="form-control bg-dark" id="input-commission" >
                                                <option value="" selected ></option>
                                                @foreach($services as $service)
                                                    <option value="{{$service->id}}" >{{ $service ->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn  w-100 btn-success mt-4">
                                        <i class="tim-icons icon-zoom-split display-4"></i> Rechercher
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="card" >
            <div class="card-body">
                <div class="row">
                    @foreach($users as $user)
                        <div class="col-lg-4 ">
                            <div class="card m-b-30 bg-gray-800" >
                                <div class="card-body">
                                    <div class="media">
                                        @if($user->getFirstMedia() == null)
                                            <img class="d-flex mr-3 rounded-circle img-thumbnail thumb-lg" src="http://style.anu.edu.au/_anu/4/images/placeholders/person_8x10.png" width="106px">
                                        @else
                                            <img  class="d-flex mr-3 rounded-circle img-thumbnail thumb-lg"  width="90px " src="{{ asset('storage').'/'.$user ->getFirstMedia()['id'].'/'.$user ->getFirstMedia()['file_name']}}"  >
                                        @endif
                                        <div class="media-body">
                                            <h5 class="mt-0 font-weight-bold mb-1" style="font-size: 16px">{{$user->name}}</h5>
                                            <p class="text-muted font-weight-900" style="font-size: 16px">{{$user->nom_a }}</p>
                                            @if($user->nom_a ==null) <br>@endif
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
                <div class="card-footer">
                    <div class="pagination justify-content-center" >
                        {{ $users -> links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
