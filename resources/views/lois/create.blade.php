@extends('layouts.app', ['page' => __('User Management'), 'pageSlug' => 'users'])

@section('content')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>

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



                                <fieldset class="form-group">
                                    <label for="exampleSelect1">Type de loi</label>
                                    <select name="type" class="form-control bg-dark " id="TypeOfConstruction" >
                                        <option value="1" >Proposition de loi</option>
                                        <option value="2" >Ordonnance</option>
                                        <option value="3" >Projet de loi</option>
                                    </select>
                                </fieldset>

                                <fieldset class="form-group" style="display:none;" id="1">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="exampleSelect1">Comission</label>
                                            <select name="comission" class="form-control" id="TypeOfConstruction" >
                                                @foreach($comissions as $comission)
                                                    <option value="{{$comission->id}}" >{{$comission->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset class="form-group" style="display:none;" id="3">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="exampleSelect1">Comission</label>
                                            <select name="comission" class="form-control" id="TypeOfConstruction" >
                                                @foreach($comissions as $comission)
                                                    <option value="{{$comission->id}}" >{{$comission->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="exampleSelect1">Ministere</label>
                                            <select name="ministere" class="form-control" id="TypeOfConstruction" >
                                                @foreach($ministeres as $ministere)
                                                    <option value="{{$ministere->id}}" >{{$ministere->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
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

    <script>
        $(document).ready(function(){
            $("#TypeOfConstruction").on("change", function(e){
                var v = $(this).val();
                if(v == '2') {
                    $("#2").slideDown();
                } else {
                    $("#2").slideUp();
                }
            });
        });
    </script>
    <script>
        $(document).ready(function(){
            $("#TypeOfConstruction").on("change", function(e){
                var v = $(this).val();
                if(v == '1' ) {
                    $("#1").slideDown();
                } else {
                    $("#1").slideUp();
                }
            });
        });
    </script>
    <script>
        $(document).ready(function(){
            $("#TypeOfConstruction").on("change", function(e){
                var v = $(this).val();
                if(v == '3' ) {
                    $("#3").slideDown();
                } else {
                    $("#3").slideUp();
                }
            });
        });
    </script>
@endsection
