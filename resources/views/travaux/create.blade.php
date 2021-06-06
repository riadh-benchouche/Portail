@extends('layouts.app', ['page' => __('User Management'), 'pageSlug' => 'users'])

@section('content')
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Ajouter un nouveau travail') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="#" class="btn btn-sm btn-primary">{{ __('Retour') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{url('travaux')}}" enctype="multipart/form-data" >
                            {{csrf_field()}}
                            {{ method_field('POST') }}
                            <h6 class="heading-small text-muted mb-4">{{ __('Nouveau travail') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-title">{{ __('Titre') }}</label>
                                    <input type="text" name="name" id="input-title" class="form-control form-control-alternative{{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="{{ __('title') }}" value="{{ old('title') }}" required autofocus>
                                    @include('alerts.feedback', ['field' => 'title'])
                                </div>

                                <div class="form-group{{ $errors->has('commission_id') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-title">{{ __('Commission') }}</label>

                                    <select name="commission" class="form-control" id="input-title" >
                                        @foreach($commissions as $commission)
                                        <option value="{{$commission->id}}" >{{$commission->name}}</option>
                                        @endforeach

                                    </select>
                                </div>


                                <div class="form-group{{ $errors->has('contenu') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-contenu">{{ __('Contenu') }}</label>
                                    <textarea class="form-control" name="contenu" id="input-contenu" rows="3" required autofocus></textarea>
                                </div>
                                <div class="form-group form-file-upload form-file-multiple d-block">
                                    <label class="form-control-label" for="input-file">{{ __('Fichier') }}</label>
                                    <input type="file" name="file"  class="inputFileHidden" id="input-file" >
                                    <div class="input-group">
                                        <input type="text"  class="form-control inputFileVisible" placeholder="Single File" id="input-file">
                                        <span class="input-group-btn d-flex">
                                            <button type="button" class="btn btn-fab btn-round btn-success">
                                                <i class="tim-icons icon-cloud-upload-94"></i>
                                            </button>
                                        </span>
                                    </div>
                                </div>
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
