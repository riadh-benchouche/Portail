@extends('layouts.app', ['activePage' => 'Editer', 'titlePage' => __('Edit')])
@section('content')
    @if(count($errors))
        <div class="alert alert-danger mt-3 col-md-8 col-md-offset-2" role="alert">
            <ul>
                @foreach($errors->all() as $message)
                    <li>{{$message}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <form action="{{url('Video/'.$video->id)}}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="put">
                    {{csrf_field()}}
                    <div class="card ">
                        <div class="card-header card-header-warning">
                            <h4 class="card-title">{{ __('Modier Video') }}</h4>
                            <p class="card-category"></p>
                        </div>
                        <div class="card-body ">

                            <label  class="col-form-label " for="input-name">Titre</label>
                            <div class=" mt-2 @if($errors->get('title')) has-danger @endif" >
                                <input  type="text" name="title" class="form-control" id="input-name" value="{{$video->title}}">
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

                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-warning">{{ __('Modifier') }}</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
