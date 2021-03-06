@extends('layouts.app', ['page' => __('Icons'), 'pageSlug' => 'icons'])
@section('content')
<div class="container">
    <div class="row">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    </div>



            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{url('fullcalender/'.$events->id)}}" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_method" value="put">
                            {{csrf_field()}}
                            <div class="card ">
                                <div class="card-header card-header-warning">
                                    <h4 class="card-title display-4">{{ __('Modifier évènement') }}</h4>
                                    <p class="card-category"></p>
                                </div>
                                <div class="card-body ">

                                    <label  class="col-form-label " for="input-name">Titre</label>
                                    <div class="  @if($errors->get('title')) has-danger @endif" >
                                        <input  type="text" name="title" class="form-control" id="input-name" value="{{$events->title}}">
                                    </div>


                                            <div class="form-group">
                                    <label  class="col-form-label " for="input-name">Categories</label>
                                            </div>
                                    @foreach($catergorys as $category)
                                        <div class="form-check form-check-radio form-check-inline">
                                            <label class="form-check-label" >
                                                <input class="form-check-input" type="radio" name="category" id="{{$category->id}}" value="{{$category->id}}"  @if ( $events->category_id == $category->id )  checked @endif> {{$category->name}}
                                                <span  class="form-check-sign" ></span>
                                            </label>
                                            <input type="color" value="{{$category->color}}" disabled>
                                        </div>
                                    @endforeach


                                        <div class="form-group mt-2">
                                    <label  class="col-form-label mt-1" for="input-contenu">Descriptif</label>
                                    <div class=" @if($errors->get('description')) has-danger @endif" >
                                        <textarea class="form-control" name="description" id="input-contenu" rows="3" required autofocus >{{$events->description}}</textarea>
                                    </div>
                                        </div>

                                    <label for="input-start"> Entrer la date de début </label>
                                    <div class="  @if($errors->get('start_date')) has-danger @endif" >
                                        <input class="form-control" type="datetime-local" name="start_date" id="input-start"  required autofocus value="{{$events->start_date}}" >
                                    </div>
                                    <label for="input-end"> Entrer la date de fin </label>
                                    <div class=" @if($errors->get('end_date')) has-danger @endif" >
                                        <input class="form-control" type="datetime-local" name="end_date" id="input-end"  required autofocus value="{{$events->end_date}}" >
                                    </div>

                                    <div class="card-footer text-center ml-auto mr-auto">
                                        <a href="{{url('icons')}}" class="btn btn-sm btn-secondary"> Retour </a>
                                        <button type="submit" class="btn btn-sm btn-warning">{{ __('Modifier') }}</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

@endsection
