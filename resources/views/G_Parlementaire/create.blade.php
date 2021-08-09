@extends('layouts.app', ['page' => __('User Management'), 'pageSlug' => 'users'])

@section('content')
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Nouveau Groupe Parlementaire') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ url('G_Parlementaire') }}" class="btn btn-sm btn-primary">{{ __('Retour') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{url('G_Parlementaire')}}" enctype="multipart/form-data" >
                            {{csrf_field()}}
                            {{ method_field('POST') }}
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('matricule') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-title">{{ __('Code Groupe Parlementaire') }}</label>
                                    <input type="text" name="matricule" id="input-name" class="form-control form-control-alternative{{ $errors->has('matricule') ? ' is-invalid' : '' }}" placeholder="{{ __('matricule') }}" value="{{ old('matricule') }}" required autofocus>
                                    @include('alerts.feedback', ['field' => 'matricule'])
                                </div>

                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-title">{{ __('Nom Groupe Parlementaire') }}</label>
                                    <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('name') }}" value="{{ old('name') }}" required autofocus>
                                    @include('alerts.feedback', ['field' => 'name'])
                                </div>
                                <div class="form-group form-file-upload form-file-multiple d-block">
                                    <input type="file" name="file"  class="inputFileHidden">
                                    <div class="input-group">
                                        <input type="text"  class="form-control inputFileVisible" placeholder="Single File">
                                        <span class="input-group-btn d-flex">
                                            <button type="button" class="btn btn-fab btn-round btn-success">
                                                <i class="tim-icons icon-cloud-upload-94"></i>
                                            </button>
                                        </span>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Ajouter') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
