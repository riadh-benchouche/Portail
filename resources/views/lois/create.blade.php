@extends('layouts.app', ['page' => __('User Management'), 'pageSlug' => 'users'])

@section('content')
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Nouvelle Lois') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ url('lois') }}" class="btn btn-sm btn-primary">{{ __('Retour') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{url('lois')}}" enctype="multipart/form-data" >
                            {{csrf_field()}}
                            {{ method_field('POST') }}
                            <h6 class="heading-small text-muted mb-4">{{ __('Nouvelle Lois') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-title">{{ __('Nom lois') }}</label>
                                    <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('name') }}" value="{{ old('name') }}" required autofocus>
                                    @include('alerts.feedback', ['field' => 'name'])
                                </div>
                                <div class="form-group{{ $errors->has('contenu') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-contenu">{{ __('Contenu') }}</label>
                                    <textarea class="form-control" name="contenu" id="input-contenu" rows="3" required autofocus></textarea>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="input-title">{{ __('Nombre Article') }}</label>
                                    <input type="number" name="nbarticle" id="input-name" class="form-control form-control-alternative{{ $errors->has('nbarticle') ? ' is-invalid' : '' }}" placeholder="{{ __('Nombre Article') }}" value="{{ old('nbarticle') }}" required autofocus>
                                    @include('alerts.feedback', ['field' => 'nbarticle'])
                                </div>

                                <div class="form-group{{ $errors->has('DtDepot') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-title">{{ __('Date Dépot') }}</label>
                                    <input type="date" name="DtDepot" id="input-name" class="form-control form-control-alternative{{ $errors->has('DtDepot') ? ' is-invalid' : '' }}" placeholder="{{today()}}" value="{{ Carbon\Carbon::now()->format('Y-m-d') }}" required autofocus>
                                    @include('alerts.feedback', ['field' => 'DtDepot'])
                                </div>

                                <div class="form-group">
                                    <label for="exampleSelect1">Type de lois</label>
                                    <select name="type" class="form-control" id="typelois" >
                                            <option value="1" >Projet de lois</option>
                                            <option value="2" >Ordonnance</option>
                                            <option value="3" >Règlement du budget</option>
                                    </select>
                                </div>

                                <fieldset class="form-group">
                                    <label for="exampleSelect1">Comission</label>
                                    <select name="comission" class="form-control" id="TypeOfConstruction" >
                                        @foreach($comissions as $comission)
                                            <option value="{{$comission->id}}" >{{$comission->name}}</option>
                                        @endforeach
                                    </select>
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="exampleSelect2">Ministere</label>
                                    <select name="ministere" class="form-control" id="TypeOfConstruction" >
                                        @foreach($ministeres as $ministere)
                                            <option value="{{$ministere->id}}" >{{$ministere->name}}</option>
                                        @endforeach
                                    </select>
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="exampleSelect3">Session</label>
                                    <select name="session" class="form-control" id="TypeOfConstruction" >
                                        @foreach($sessions as $session)
                                        <option value="{{$session->id}}" >{{$session->name}}</option>
                                        @endforeach
                                    </select>
                                </fieldset>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
