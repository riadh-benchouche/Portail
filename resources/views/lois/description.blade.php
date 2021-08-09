@extends('layouts.app', ['page' => __('Manage Users'), 'pageSlug' => 'Users'])
@section('content')
    <div class="card">
        <div class="card-header  ">
            <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
            <div class="nav-tabs-navigation">
                <div class="nav-tabs-wrapper">
                    <ul class="nav nav-pills bg-rose">
                        @if ( $lois->type == 1 || $lois->type == 3 )
                            <li class="nav-item "><a class="nav-link active" href="#pill1" data-toggle="tab" aria-selected="true" >Énoncé</a></li>
                            <li class="nav-item"><a class="nav-link" href="#pill2" data-toggle="tab">Étude
                                    préliminaire</a></li>
                            <li class="nav-item"><a class="nav-link" href="#pill7" data-toggle="tab">planning</a></li>

                            <li class="nav-item"><a class="nav-link" href="#pill3" data-toggle="tab">Amendements</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="#pill8" data-toggle="tab">Interventions</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="#pill4" data-toggle="tab">Étude
                                    complémentaire</a></li>
                            <li class="nav-item"><a class="nav-link" href="#pill5" data-toggle="tab">Phase de Vote</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="#pill6" data-toggle="tab">Nouvelle loi</a>
                            </li>
                        @endif
                        @if ( $lois->type == 2 )
                            <li class="nav-item "><a class="nav-link active" href="#pill1" data-toggle="tab" aria-selected="true">Énoncé</a></li>
                            <li class="nav-item"><a class="nav-link" href="#pill8" data-toggle="tab">Interventions</a></li>
                            <li class="nav-item"><a class="nav-link" href="#pill5" data-toggle="tab">Phase de Vote</a></li>
                            <li class="nav-item"><a class="nav-link" href="#pill6" data-toggle="tab">Nouvelle loi</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        <div class="card-body ">
            <div class="tab-content text-center">
                <div class="tab-pane  fade show active" id="pill1">
                    <div class="row">
                        <div class="col-sm-4">
                            <h6 class="mt-2">Nom</h6>
                        </div>
                        <div class="col-sm-8 text-secondary mt-2">
                            <b>{{ $lois->name }}</b>
                        </div>
                    </div>
                    <hr class="my-2">
                    <div class="row">
                        <div class="col-sm-4">
                            <h6>Nombre d'article</h6>
                        </div>
                        <div class="col-sm-8 text-secondary ">
                            <b>{{ $lois->NbAraticle}}</b>
                        </div>
                    </div>
                    <hr class="my-2">
                    <div class="row">
                        <div class="col-sm-4">
                            <h6>Date de reçu</h6>
                        </div>
                        <div class="col-sm-8 text-secondary ">
                            <b>{{ $lois->DtDepot }}</b>
                        </div>
                    </div>
                    <hr class="my-2">
                    @if($lois->enonce != null )
                        <div class="row">
                            <div class="col-sm-6">
                                @can('edit')
                                <form class="text-center" action="{{ route('deleteE',$lois->enonce->id) }}"
                                      method="post">
                                    @csrf
                                    @method('delete')
                                    <div class="file-man-box">
                                        <button class="file-close"><i class="fa fa-times-circle"></i></button>
                                    </div>
                                </form>
                                @endcan
                                <div class="file-img-box"><img class="mr-auto ml-auto" width="150px"
                                                               @if($lois->enonce->getFirstMedia()['mime_type'] == 'application/pdf')src="https://coderthemes.com/highdmin/layouts/assets/images/file_icons/pdf.svg"
                                                               alt="icon">
                                    @elseif($lois->enonce->getFirstMedia()['mime_type'] == 'image/png' || 'image/jpg')
                                        <img
                                            src="https://coderthemes.com/highdmin/layouts/assets/images/file_icons/png.svg"
                                            alt="icon">@endif
                                    <a href="{{ route('downloadfileE',$lois->enonce->id) }}" class="file-download"><i
                                            class="fa fa-download"></i></a>
                                </div>
                            </div>
                            <div class="col-sm-6 ">
                                <div class="file-man-title">
                                    <h5 class="mb-0 text-overflow">{{$lois->enonce ->getFirstMedia()['file_name']}}</h5>
                                    <p class="mb-0">
                                        <small>{{$lois->enonce ->getFirstMedia()['human_readable_size']}}</small></p>
                                </div>
                            </div>
                        </div>
                    @elseif($lois->enonce == null)
                        @can('edit')
                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                data-target="#exampleModalCenterEF">
                            Ajouter l'énoncé version français
                        </button>
                        @endcan
                        <div class="modal fade " id="exampleModalCenterEF" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content bg-dark">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">Ajouter l'énoncé version
                                            français</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form method="post"
                                          action="{{action('App\Http\Controllers\LoisController@updateEnonce')}}"
                                          enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        {{ method_field('POST') }}
                                        <div class="modal-body">
                                            <input type="hidden" value="{{$lois->id}}" name="id">
                                            <div class="form-group form-file-upload form-file-multiple d-block">
                                                <label class="form-control-label"
                                                       for="input-file">{{ __('Énonce version française') }}</label>
                                                <input type="file" name="file" class="inputFileHidden" id="input-file">
                                                <div class="input-group">
                                                    <input type="text" class="form-control inputFileVisible"
                                                           placeholder="Single File" id="input-file">
                                                    <span class="input-group-btn d-flex">
                                                                                <button type="button"
                                                                                        class="btn btn-fab btn-round btn-success">
                                                                                    <i class="tim-icons icon-cloud-upload-94"></i>
                                                                                </button>
                                                                            </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                                            </button>
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if($lois->enoncear != null )
                        <div class="row">
                            <div class="col-sm-6">
                                @can('edit')
                                <form class="text-center" action="{{ route('deleteEA',$lois->enoncear->id) }}"
                                      method="post">
                                    @csrf
                                    @method('delete')
                                    <div class="file-man-box">
                                        <button class="file-close"><i class="fa fa-times-circle"></i></button>
                                    </div>
                                </form>
                                @endcan
                                <div class="file-img-box"><img class="mr-auto ml-auto" width="150px"
                                                               @if($lois->enoncear->getFirstMedia()['mime_type'] == 'application/pdf')src="https://coderthemes.com/highdmin/layouts/assets/images/file_icons/pdf.svg"
                                                               alt="icon">
                                    @elseif($lois->enonce->getFirstMedia()['mime_type'] == 'image/png' || 'image/jpg')
                                        <img
                                            src="https://coderthemes.com/highdmin/layouts/assets/images/file_icons/png.svg"
                                            alt="icon">@endif
                                    <a href="{{ route('downloadfileEA',$lois->enoncear->id) }}" class="file-download"><i
                                            class="fa fa-download"></i></a>
                                </div>
                            </div>
                            <div class="col-sm-6 ">
                                <div class="file-man-title">
                                    <h5 class="mb-0 text-overflow">{{$lois->enoncear ->getFirstMedia()['file_name']}}</h5>
                                    <p class="mb-0">
                                        <small>{{$lois->enoncear ->getFirstMedia()['human_readable_size']}}</small></p>
                                </div>
                            </div>
                        </div>
                    @elseif($lois->enoncear == null)
                        @can('edit')
                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                data-target="#exampleModalCenterEA">
                            Ajouter l'énoncé version arabe
                        </button>
                        @endcan
                        <div class="modal fade " id="exampleModalCenterEA" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content bg-dark">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">Ajouter l'énoncé version
                                            Arabe</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form method="post"
                                          action="{{action('App\Http\Controllers\LoisController@updateEnonceAR')}}"
                                          enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        {{ method_field('POST') }}
                                        <div class="modal-body">
                                            <input type="hidden" value="{{$lois->id}}" name="id">
                                            <div class="form-group form-file-upload form-file-multiple d-block">
                                                <label class="form-control-label"
                                                       for="input-file">{{ __('Énonce version Arabe') }}</label>
                                                <input type="file" name="file" class="inputFileHidden" id="input-file">
                                                <div class="input-group">
                                                    <input type="text" class="form-control inputFileVisible"
                                                           placeholder="Single File" id="input-file">
                                                    <span class="input-group-btn d-flex">
                                                                        <button type="button"
                                                                                class="btn btn-fab btn-round btn-success">
                                                                            <i class="tim-icons icon-cloud-upload-94"></i>
                                                                        </button>
                                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                                            </button>
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="tab-pane" id="pill2">
                    @if($lois->etat < 1)
                        <h1>Phase d'étude prélimianire non terminer</h1>
                    @elseif($lois->etat >= 1)
                        <div class="row">
                            <div class="col-sm-4">
                                <h6 class="mt-2">Nom</h6>
                            </div>
                            <div class="col-sm-8 text-secondary mt-2">
                                <b>{{ $lois->name }}</b>
                            </div>
                        </div>
                        <hr class="my-2">
                        <div class="row">
                            <div class="col-sm-4">
                                <h6>Nom de la comission</h6>
                            </div>
                            <div class="col-sm-8 text-secondary ">
                                <b>{{ $lois->comissions->name}}</b>
                            </div>
                        </div>
                        <hr class="my-2">
                        <div class="row">
                            <div class="col-sm-4">
                                <h6>Date de début de phase préliminaire</h6>
                            </div>
                            <div class="col-sm-8 text-secondary ">
                                <b>{{ $lois->DtPresCom }}</b>
                            </div>
                        </div>
                        <hr class="my-2">
                        @if($lois->preliminaire == null)
                            @can('edit')
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                    data-target="#exampleModalCenterPRF">
                                Ajouter Rapport de l'étude préliminaire version français
                            </button>
                            @endcan



                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalCenterPRF" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content bg-dark">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCenterTitle">Rapport
                                                préliminaire</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form method="post"
                                              action="{{action('App\Http\Controllers\LoisController@updatePre')}}"
                                              enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            {{ method_field('POST') }}
                                            <div class="modal-body">
                                                <input type="hidden" value="{{$lois->id}}" name="id">
                                                <div
                                                    class="form-group{{ $errors->has('DtDepot') ? ' has-danger' : '' }}">
                                                    <label class="form-control-label"
                                                           for="input-title">{{ __('Date Présentation devant la comission') }}</label>
                                                    <input type="date" name="date" id="input-name"
                                                           class="form-control form-control-alternative{{ $errors->has('DtPresCom') ? ' is-invalid' : '' }}"
                                                           placeholder="{{today()}}"
                                                           value="{{ Carbon\Carbon::now()->format('Y-m-d') }}" required
                                                           autofocus>
                                                    @include('alerts.feedback', ['field' => 'DtPresCom'])
                                                </div>
                                                <div class="form-group form-file-upload form-file-multiple d-block">
                                                    <label class="form-control-label"
                                                           for="input-file">{{ __('Fichier') }}</label>
                                                    <input type="file" name="file" class="inputFileHidden"
                                                           id="input-file">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control inputFileVisible"
                                                               placeholder="Single File" id="input-file">
                                                        <span class="input-group-btn d-flex">
                                                                                        <button type="button"
                                                                                                class="btn btn-fab btn-round btn-success">
                                                                                            <i class="tim-icons icon-cloud-upload-94"></i>
                                                                                        </button>
                                                                                    </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                    Close
                                                </button>
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="row">
                                <div class="col-sm-4">
                                    @can('edit')
                                    <form class="text-center" action="{{ route('deleteP',$lois->preliminaire->id) }}"
                                          method="post">
                                        @csrf
                                        @method('delete')
                                        <div class="file-man-box">
                                            <button class="file-close"><i class="fa fa-times-circle"></i></button>
                                        </div>
                                    </form>
                                    @endcan
                                    <div class="file-img-box">
                                        <img class="mr-auto ml-auto" width="150px"
                                             @if($lois->preliminaire->getFirstMedia()['mime_type'] == 'application/pdf')src="https://coderthemes.com/highdmin/layouts/assets/images/file_icons/pdf.svg"
                                             alt="icon">
                                        @elseif($lois->preliminaire->getFirstMedia()['mime_type'] == 'image/png' || 'image/jpg')
                                            <img
                                                src="https://coderthemes.com/highdmin/layouts/assets/images/file_icons/png.svg"
                                                alt="icon" @endif>
                                            <a href="{{ route('downloadfileP',$lois->preliminaire->id) }}"
                                               class="file-download"><i class="fa fa-download"></i></a>
                                    </div>
                                    <div class="file-man-title">
                                        <h5 class="mb-0 text-overflow">{{$lois->preliminaire ->getFirstMedia()['file_name']}}</h5>
                                        <p class="mb-0">
                                            <small>{{$lois->preliminaire ->getFirstMedia()['human_readable_size']}}</small>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-sm-8 text-secondary mt-3 ">
                                    <b>{{ $lois->contenu }}</b>
                                </div>
                            </div>
                        @endif
                        @if($lois->preliminairear == null)
                            @can('edit')
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                    data-target="#exampleModalCenterPRA">
                                Ajouter Rapport de l'étude préliminaire version arabe
                            </button>
                            @endcan
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalCenterPRA" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content bg-dark">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCenterTitle">Rapport préliminaire
                                                version arabe</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form method="post"
                                              action="{{action('App\Http\Controllers\LoisController@updatePreAR')}}"
                                              enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            {{ method_field('POST') }}
                                            <div class="modal-body">
                                                <input type="hidden" value="{{$lois->id}}" name="id">

                                                <div class="form-group form-file-upload form-file-multiple d-block">
                                                    <label class="form-control-label"
                                                           for="input-file">{{ __('Fichier') }}</label>
                                                    <input type="file" name="file" class="inputFileHidden"
                                                           id="input-file">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control inputFileVisible"
                                                               placeholder="Single File" id="input-file">
                                                        <span class="input-group-btn d-flex">
                                                                        <button type="button"
                                                                                class="btn btn-fab btn-round btn-success">
                                                                            <i class="tim-icons icon-cloud-upload-94"></i>
                                                                        </button>
                                                                    </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                    Close
                                                </button>
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="row">
                                <div class="col-sm-4">
                                    @can('edit')
                                    <form class="text-center" action="{{ route('deletePA',$lois->preliminairear->id) }}"
                                          method="post">
                                        @csrf
                                        @method('delete')
                                        <div class="file-man-box">
                                            <button class="file-close"><i class="fa fa-times-circle"></i></button>
                                        </div>
                                    </form>
                                    @endcan
                                    <div class="file-img-box">
                                        <img class="mr-auto ml-auto" width="150px"
                                             @if($lois->preliminairear->getFirstMedia()['mime_type'] == 'application/pdf')src="https://coderthemes.com/highdmin/layouts/assets/images/file_icons/pdf.svg"
                                             alt="icon">
                                        @elseif($lois->preliminairear->getFirstMedia()['mime_type'] == 'image/png' || 'image/jpg')
                                            <img
                                                src="https://coderthemes.com/highdmin/layouts/assets/images/file_icons/png.svg"
                                                alt="icon" @endif>
                                            <a href="{{ route('downloadfilePA',$lois->preliminairear->id) }}"
                                               class="file-download"><i class="fa fa-download"></i></a>
                                    </div>
                                    <div class="file-man-title">
                                        <h5 class="mb-0 text-overflow">{{$lois->preliminairear ->getFirstMedia()['file_name']}}</h5>
                                        <p class="mb-0">
                                            <small>{{$lois->preliminairear ->getFirstMedia()['human_readable_size']}}</small>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-sm-8 text-secondary mt-3 ">
                                    <b>{{ $lois->contenu }}</b>
                                </div>
                            </div>
                        @endif
                    @endif
                </div>
                <div class="tab-pane" id="pill7">
                    <div class="col-md-12 ml-auto mr-auto">
                        <div class="card" style="background-color: #4f5167;">
                            <div class="card-header">
                                <div class="  text-right pull-right mb-2">
                                    @can('edit')
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                            data-target="#exampleModalplanning">
                                        Ajouter un évènement
                                    </button>
                                    @endcan

                                    <div class="modal fade" id="exampleModalplanning" tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content bg-dark">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalCenterTitle">Nouvelle
                                                        évènement</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form method="post"
                                                      action="{{action('App\Http\Controllers\FullCalenderController@lois')}}">
                                                    {{csrf_field()}}
                                                    {{ method_field('POST') }}
                                                    <div class="modal-body">
                                                        <input type="hidden" value="{{$lois->id}}" name="id">
                                                        <div class="form-group">
                                                            <label class="form-control-label"
                                                                   for="input-title">{{ __('Titre évènement') }}</label>
                                                            <input type="text" name="title" id="input-title"
                                                                   class="form-control form-control-alternative"
                                                                   required autofocus>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="form-control-label"
                                                                   for="input-title">{{ __('Catégorie évènement')}}</label>
                                                            @foreach($catergorys as $category)
                                                                <div
                                                                    class="form-check form-check-radio form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input" type="radio"
                                                                               name="category" id="{{$category->id}}"
                                                                               value="{{$category->id}}"> {{$category->name}}
                                                                        <span class="form-check-sign"></span>
                                                                    </label>
                                                                    <input type="color" value="{{$category->color}}"
                                                                           disabled>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="form-control-label"
                                                                   for="input-contenu">{{ __('Description') }}</label>
                                                            <textarea type="text" rows="3" name="description"
                                                                      id="input-contenu"
                                                                      class="form-control form-control-alternative"
                                                                      placeholder="" required autofocus>
                                                                </textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="form-control-label"
                                                                   for="input-title">{{ __('Date début') }}</label>
                                                            <input type="datetime-local" name="start_date"
                                                                   id="input-name"
                                                                   class="form-control form-control-alternative"
                                                                   placeholder="{{today()}}"
                                                                   value="{{ Carbon\Carbon::now()->format('Y-m-d') }}"
                                                                   required autofocus>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="form-control-label"
                                                                   for="input-title">{{ __('Date fin') }}</label>
                                                            <input type="datetime-local" name="end_date" id="input-name"
                                                                   class="form-control form-control-alternative"
                                                                   placeholder="{{today()}}"
                                                                   value="{{ Carbon\Carbon::now()->format('Y-m-d') }}"
                                                                   required autofocus>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close
                                                        </button>
                                                        <button type="submit" class="btn btn-primary">Save</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                {!! $calendar->calendar() !!}
                            </div>
                            @push('js')
                                {!! $calendar->script() !!}
                            @endpush
                        </div>

                    </div>
                </div>
                <div class="tab-pane" id="pill3">
                    @if($lois->etat < 2)
                        <h1>Seance plénière non terminer</h1>
                    @elseif($lois->etat >= 2)
                        <div class="row">
                            <div class="col-sm-4">
                                <h6 class="mt-2">Nom</h6>
                            </div>
                            <div class="col-sm-8 text-secondary mt-2">
                                <b>{{ $lois->name }}</b>
                            </div>
                        </div>
                        <hr class="my-2">
                        <div class="row">
                            <div class="col-sm-4">
                                <h6>Nom d'article</h6>
                            </div>
                            <div class="col-sm-8 text-secondary ">
                                <b>{{ $lois->NbAraticle}}</b>
                            </div>
                        </div>
                        <hr class="my-2">
                        <div class="row">
                            <div class="col-sm-4">
                                <h6>Date de Séance plénière</h6>
                            </div>
                            <div class="col-sm-8 text-secondary ">
                                <b>{{ $lois->DtDiscusGen }}</b>
                            </div>
                        </div>
                        <hr class="my-2">
                        @if($lois->seance == null)
                            @can('edit')
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                    data-target="#exampleModalCenterSF">
                                Ajouter Rapport de la séance pléniere
                            </button>
                            @endcan
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalCenterSF" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCenterTitle">Ajouter rapport de la
                                                séance plénière</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form method="post"
                                              action="{{action('App\Http\Controllers\LoisController@updateSean')}}"
                                              enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            {{ method_field('POST') }}
                                            <div class="modal-body">
                                                <input type="hidden" value="{{$lois->id}}" name="id">

                                                <div
                                                    class="form-group{{ $errors->has('DtDepot') ? ' has-danger' : '' }}">
                                                    <label class="form-control-label"
                                                           for="input-title">{{ __('Date de la séance plénière') }}</label>
                                                    <input type="date" name="date" id="input-name"
                                                           class="form-control form-control-alternative{{ $errors->has('DtDiscusGen') ? ' is-invalid' : '' }}"
                                                           placeholder="{{today()}}"
                                                           value="{{ Carbon\Carbon::now()->format('Y-m-d') }}" required
                                                           autofocus>
                                                    @include('alerts.feedback', ['field' => 'DtDiscusGen'])
                                                </div>

                                                <div class="form-group form-file-upload form-file-multiple d-block">
                                                    <label class="form-control-label"
                                                           for="input-file">{{ __('Fichier') }}</label>
                                                    <input type="file" name="file" class="inputFileHidden"
                                                           id="input-file">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control inputFileVisible"
                                                               placeholder="Single File" id="input-file">
                                                        <span class="input-group-btn d-flex">
                                                                                        <button type="button"
                                                                                                class="btn btn-fab btn-round btn-success">
                                                                                            <i class="tim-icons icon-cloud-upload-94"></i>
                                                                                        </button>
                                                                                    </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                    Close
                                                </button>
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="row">
                                <div class="col-sm-4">
                                    @can('edit')
                                    <form class="text-center" action="{{ route('deleteS',$lois->seance->id) }}"
                                          method="post">
                                        @csrf
                                        @method('delete')
                                        <div class="file-man-box">
                                            <button class="file-close"><i class="fa fa-times-circle"></i></button>
                                        </div>
                                    </form>
                                    @endcan
                                    <div class="file-img-box">
                                        <img class="mr-auto ml-auto" width="150px"
                                             @if($lois->seance->getFirstMedia()['mime_type'] == 'application/pdf')src="https://coderthemes.com/highdmin/layouts/assets/images/file_icons/pdf.svg"
                                             alt="icon">
                                        @elseif($lois->seance->getFirstMedia()['mime_type'] == 'image/png' || 'image/jpg')
                                            <img
                                                src="https://coderthemes.com/highdmin/layouts/assets/images/file_icons/png.svg"
                                                alt="icon" @endif>

                                            <a href="{{ route('downloadfileS',$lois->seance->id) }}"
                                               class="file-download"><i class="fa fa-download"></i></a>
                                    </div>
                                    <div class="file-man-title">
                                        <h5 class="mb-0 text-overflow">{{$lois->seance ->getFirstMedia()['file_name']}}</h5>
                                        <p class="mb-0">
                                            <small>{{$lois->seance ->getFirstMedia()['human_readable_size']}}</small>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-sm-8 text-secondary mt-3 ">
                                    <b>{{ $lois->contenu }}</b>
                                </div>
                            </div>
                        @endif
                        @if($lois->seancear == null)
                            @can('edit')
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                    data-target="#exampleModalCenterSA">
                                Ajouter Rapport de la séance pléniere version arabe
                            </button>
                            @endcan
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalCenterSA" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCenterTitle">Ajouter rapport de la
                                                séance plénière version française</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form method="post"
                                              action="{{action('App\Http\Controllers\LoisController@updateSeanAR')}}"
                                              enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            {{ method_field('POST') }}
                                            <div class="modal-body">
                                                <input type="hidden" value="{{$lois->id}}" name="id">


                                                <div class="form-group form-file-upload form-file-multiple d-block">
                                                    <label class="form-control-label"
                                                           for="input-file">{{ __('Fichier') }}</label>
                                                    <input type="file" name="file" class="inputFileHidden"
                                                           id="input-file">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control inputFileVisible"
                                                               placeholder="Single File" id="input-file">
                                                        <span class="input-group-btn d-flex">
                                                                        <button type="button"
                                                                                class="btn btn-fab btn-round btn-success">
                                                                            <i class="tim-icons icon-cloud-upload-94"></i>
                                                                        </button>
                                                                    </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                    Close
                                                </button>
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="row">
                                <div class="col-sm-4">
                                    @can('edit')
                                    <form class="text-center" action="{{ route('deleteSA',$lois->seance->id) }}"
                                          method="post">
                                        @csrf
                                        @method('delete')
                                        <div class="file-man-box">
                                            <button class="file-close"><i class="fa fa-times-circle"></i></button>
                                        </div>
                                    </form>
                                    @endcan
                                    <div class="file-img-box">
                                        <img class="mr-auto ml-auto" width="150px"
                                             @if($lois->seancear->getFirstMedia()['mime_type'] == 'application/pdf')src="https://coderthemes.com/highdmin/layouts/assets/images/file_icons/pdf.svg"
                                             alt="icon">
                                        @elseif($lois->seancear->getFirstMedia()['mime_type'] == 'image/png' || 'image/jpg')
                                            <img
                                                src="https://coderthemes.com/highdmin/layouts/assets/images/file_icons/png.svg"
                                                alt="icon" @endif>

                                            <a href="{{ route('downloadfileSA',$lois->seancear->id) }}"
                                               class="file-download"><i class="fa fa-download"></i></a></div>
                                    <div class="file-man-title">
                                        <h5 class="mb-0 text-overflow">{{$lois->seancear ->getFirstMedia()['file_name']}}</h5>
                                        <p class="mb-0">
                                            <small>{{$lois->seancear ->getFirstMedia()['human_readable_size']}}</small>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-sm-8 text-secondary mt-3 ">
                                    <b>{{ $lois->contenu }}</b>
                                </div>
                            </div>
                        @endif
                    @endif
                </div>
                <div class="tab-pane" id="pill8">
                    @if($lois->etat < 2)
                        <h1>Seance plénière non terminer</h1>
                    @elseif($lois->etat >= 2)
                    @if ( $lois->intervention == null )
                            @can('edit')
                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                data-target="#exampleModalCenterI">
                            Ajouter Rapport des interventions
                        </button>
                            @endcan
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenterI" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">Ajouter rapport des
                                            interventions En Français</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form method="post"
                                          action="{{action('App\Http\Controllers\LoisController@updateInter')}}"
                                          enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        {{ method_field('POST') }}
                                        <div class="modal-body">
                                            <input type="hidden" value="{{$lois->id}}" name="id">

                                            <div class="form-group form-file-upload form-file-multiple d-block">
                                                <label class="form-control-label"
                                                       for="input-file">{{ __('Fichier') }}</label>
                                                <input type="file" name="file" class="inputFileHidden" id="input-file">
                                                <div class="input-group">
                                                    <input type="text" class="form-control inputFileVisible"
                                                           placeholder="Single File" id="input-file">
                                                    <span class="input-group-btn d-flex">
                                                                                <button type="button"
                                                                                        class="btn btn-fab btn-round btn-success">
                                                                                    <i class="tim-icons icon-cloud-upload-94"></i>
                                                                                </button>
                                                                            </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                                            </button>
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @elseif($lois->intervention != null)
                        <div class="row">
                            <div class="col-sm-4">
                                @can('edit')
                                <form class="text-center" action="{{ route('deleteI',$lois->intervention->id) }}"
                                      method="post">
                                    @csrf
                                    @method('delete')
                                    <div class="file-man-box">
                                        <button class="file-close"><i class="fa fa-times-circle"></i></button>
                                    </div>
                                </form>
                                @endcan
                                <div class="file-img-box">
                                    <img class="mr-auto ml-auto" width="150px"
                                         @if($lois->intervention->getFirstMedia()['mime_type'] == 'application/pdf')src="https://coderthemes.com/highdmin/layouts/assets/images/file_icons/pdf.svg"
                                         alt="icon">
                                    @elseif($lois->intervention->getFirstMedia()['mime_type'] == 'image/png' || 'image/jpg')
                                        <img
                                            src="https://coderthemes.com/highdmin/layouts/assets/images/file_icons/png.svg"
                                            alt="icon" @endif>

                                        <a href="{{ route('downloadfileI',$lois->intervention->id) }}"
                                           class="file-download"><i class="fa fa-download"></i></a>
                                </div>
                                <div class="file-man-title">
                                    <h5 class="mb-0 text-overflow">{{$lois->intervention ->getFirstMedia()['file_name']}}</h5>
                                    <p class="mb-0">
                                        <small>{{$lois->intervention ->getFirstMedia()['human_readable_size']}}</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if ( $lois->interventionar == null )
                            @can('edit')
                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                data-target="#exampleModalCenterIA">
                            Ajouter Rapport des interventions
                        </button>
                            @endcan
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenterIA" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">Ajouter rapport des
                                            interventions En Arabe</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form method="post"
                                          action="{{action('App\Http\Controllers\LoisController@updateInterAR')}}"
                                          enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        {{ method_field('POST') }}
                                        <div class="modal-body">
                                            <input type="hidden" value="{{$lois->id}}" name="id">

                                            <div class="form-group form-file-upload form-file-multiple d-block">
                                                <label class="form-control-label"
                                                       for="input-file">{{ __('Fichier') }}</label>
                                                <input type="file" name="file" class="inputFileHidden" id="input-file">
                                                <div class="input-group">
                                                    <input type="text" class="form-control inputFileVisible"
                                                           placeholder="Single File" id="input-file">
                                                    <span class="input-group-btn d-flex">
                                                                        <button type="button"
                                                                                class="btn btn-fab btn-round btn-success">
                                                                            <i class="tim-icons icon-cloud-upload-94"></i>
                                                                        </button>
                                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                                            </button>
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @elseif($lois->interventionar != null)
                        <div class="row">
                            <div class="col-sm-4">
                                @can('edit')
                                <form class="text-center" action="{{ route('deleteIA',$lois->interventionar->id) }}"
                                      method="post">
                                    @csrf
                                    @method('delete')
                                    <div class="file-man-box">
                                        <button class="file-close"><i class="fa fa-times-circle"></i></button>
                                    </div>
                                </form>
                                @endcan
                                <div class="file-img-box">
                                    <img class="mr-auto ml-auto" width="150px"
                                         @if($lois->interventionar->getFirstMedia()['mime_type'] == 'application/pdf')src="https://coderthemes.com/highdmin/layouts/assets/images/file_icons/pdf.svg"
                                         alt="icon">
                                    @elseif($lois->interventionar->getFirstMedia()['mime_type'] == 'image/png' || 'image/jpg')
                                        <img
                                            src="https://coderthemes.com/highdmin/layouts/assets/images/file_icons/png.svg"
                                            alt="icon" @endif>

                                        <a href="{{ route('downloadfileIA',$lois->interventionar->id) }}"
                                           class="file-download"><i class="fa fa-download"></i></a>
                                </div>
                                <div class="file-man-title">
                                    <h5 class="mb-0 text-overflow">{{$lois->interventionar ->getFirstMedia()['file_name']}}</h5>
                                    <p class="mb-0">
                                        <small>{{$lois->interventionar ->getFirstMedia()['human_readable_size']}}</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endif
                     @endif
                </div>
                <div class="tab-pane" id="pill4">
                    @if($lois->etat < 3)
                        <h1>Phase d'étude complémentaire non terminer</h1>
                    @elseif($lois->etat >= 3)
                        <div class="row">
                            <div class="col-sm-4">
                                <h6 class="mt-2">Nom</h6>
                            </div>
                            <div class="col-sm-8 text-secondary mt-2">
                                <b>{{ $lois->name }}</b>
                            </div>
                        </div>
                        <hr class="my-2">
                        <div class="row">
                            <div class="col-sm-4">
                                <h6>Nom d'article</h6>
                            </div>
                            <div class="col-sm-8 text-secondary ">
                                <b>{{ $lois->NbAraticle}}</b>
                            </div>
                        </div>
                        <hr class="my-2">
                        <div class="row">
                            <div class="col-sm-4">
                                <h6>Date de Séance plénière</h6>
                            </div>
                            <div class="col-sm-8 text-secondary ">
                                <b>{{ $lois->DtDiscusGen }}</b>
                            </div>
                        </div>
                        <hr class="my-2">
                        @if($lois->complementaire == null)
                            @can('edit')
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                    data-target="#exampleModalCenterC">
                                Ajouter Rapport complementaire
                            </button>
                            @endcan
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalCenterC" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCenterTitle">Ajouter rapport
                                                complémentaire En Français</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form method="post"
                                              action="{{action('App\Http\Controllers\LoisController@updateComp')}}"
                                              enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            {{ method_field('POST') }}
                                            <div class="modal-body">
                                                <input type="hidden" value="{{$lois->id}}" name="id">


                                                <div class="form-group form-file-upload form-file-multiple d-block">
                                                    <label class="form-control-label"
                                                           for="input-file">{{ __('Fichier') }}</label>
                                                    <input type="file" name="file" class="inputFileHidden"
                                                           id="input-file">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control inputFileVisible"
                                                               placeholder="Single File" id="input-file">
                                                        <span class="input-group-btn d-flex">
                                                                        <button type="button"
                                                                                class="btn btn-fab btn-round btn-success">
                                                                            <i class="tim-icons icon-cloud-upload-94"></i>
                                                                        </button>
                                                                    </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                    Close
                                                </button>
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="row">
                                <div class="col-sm-4">
                                    @can('edit')
                                    <form class="text-center" action="{{ route('deleteC',$lois->complementaire->id) }}"
                                          method="post">
                                        @csrf
                                        @method('delete')
                                        <div class="file-man-box">
                                            <button class="file-close"><i class="fa fa-times-circle"></i></button>
                                        </div>
                                    </form>
                                    @endcan
                                    <div class="file-img-box">
                                        <img class="mr-auto ml-auto" width="150px"
                                             @if($lois->complementaire->getFirstMedia()['mime_type'] == 'application/pdf')src="https://coderthemes.com/highdmin/layouts/assets/images/file_icons/pdf.svg"
                                             alt="icon">
                                        @elseif($lois->complementaire->getFirstMedia()['mime_type'] == 'image/png' || 'image/jpg')
                                            <img
                                                src="https://coderthemes.com/highdmin/layouts/assets/images/file_icons/png.svg"
                                                alt="icon" @endif>

                                            <a href="{{ route('downloadfileC',$lois->complementaire->id) }}"
                                               class="file-download"><i class="fa fa-download"></i></a></div>
                                    <div class="file-man-title">
                                        <h5 class="mb-0 text-overflow">{{$lois->complementaire ->getFirstMedia()['file_name']}}</h5>
                                        <p class="mb-0">
                                            <small>{{$lois->complementaire ->getFirstMedia()['human_readable_size']}}</small>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-sm-7 text-secondary mt-3 ">
                                    <b>{{ $lois->contenu }}</b>
                                </div>
                            </div>
                        @endif
                        @if($lois->complementairear == null)
                            @can('edit')
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                    data-target="#exampleModalCenterCA">
                                Ajouter Rapport complementaire En Arabe
                            </button>
                            @endcan
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalCenterCA" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalCenterTitleA" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCenterTitleA">Ajouter rapport
                                                complémentaire En Arabe</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form method="post"
                                              action="{{action('App\Http\Controllers\LoisController@updateCompAR')}}"
                                              enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            {{ method_field('POST') }}
                                            <div class="modal-body">
                                                <input type="hidden" value="{{$lois->id}}" name="id">


                                                <div
                                                    class="form-group{{ $errors->has('DtAdoption') ? ' has-danger' : '' }}">
                                                    <label class="form-control-label"
                                                           for="input-title">{{ __('Date Adoption APN') }}</label>
                                                    <input type="date" name="date" id="input-name"
                                                           class="form-control form-control-alternative{{ $errors->has('DtAdoption') ? ' is-invalid' : '' }}"
                                                           placeholder="{{today()}}"
                                                           value="{{ Carbon\Carbon::now()->format('Y-m-d') }}" required
                                                           autofocus>
                                                    @include('alerts.feedback', ['field' => 'DtAdoption'])
                                                </div>

                                                <div class="form-group form-file-upload form-file-multiple d-block">
                                                    <label class="form-control-label"
                                                           for="input-file">{{ __('Fichier') }}</label>
                                                    <input type="file" name="file" class="inputFileHidden"
                                                           id="input-file">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control inputFileVisible"
                                                               placeholder="Single File" id="input-file">
                                                        <span class="input-group-btn d-flex">
                                                                        <button type="button"
                                                                                class="btn btn-fab btn-round btn-success">
                                                                            <i class="tim-icons icon-cloud-upload-94"></i>
                                                                        </button>
                                                                    </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                    Close
                                                </button>
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="row">
                                <div class="col-sm-4">
                                    @can('edit')
                                    <form class="text-center"
                                          action="{{ route('deleteCA',$lois->complementairear->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <div class="file-man-box">
                                            <button class="file-close"><i class="fa fa-times-circle"></i></button>
                                        </div>
                                    </form>
                                    @endcan
                                    <div class="file-img-box">
                                        <img class="mr-auto ml-auto" width="150px"
                                             @if($lois->complementairear->getFirstMedia()['mime_type'] == 'application/pdf')src="https://coderthemes.com/highdmin/layouts/assets/images/file_icons/pdf.svg"
                                             alt="icon">
                                        @elseif($lois->complementairear->getFirstMedia()['mime_type'] == 'image/png' || 'image/jpg')
                                            <img
                                                src="https://coderthemes.com/highdmin/layouts/assets/images/file_icons/png.svg"
                                                alt="icon" @endif>

                                            <a href="{{ route('downloadfileCA',$lois->complementairear->id) }}"
                                               class="file-download"><i class="fa fa-download"></i></a></div>
                                    <div class="file-man-title">
                                        <h5 class="mb-0 text-overflow">{{$lois->complementairear ->getFirstMedia()['file_name']}}</h5>
                                        <p class="mb-0">
                                            <small>{{$lois->complementairear ->getFirstMedia()['human_readable_size']}}</small>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-sm-7 text-secondary mt-3 ">
                                    <b>{{ $lois->contenu }}</b>
                                </div>
                            </div>
                        @endif
                    @endif
                </div>
                <div class="tab-pane" id="pill5">
                    @if($lois->etat < 4)
                        <h1>Phase de vote non achevé</h1>
                    @elseif($lois->etat >= 4 )
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h6 class="mt-2">Nom</h6>
                                    </div>
                                    <div class="col-sm-6 text-secondary mt-2">
                                        <b>{{ $lois->name }}</b>
                                    </div>
                                </div>
                                <hr class=" col-sm-12 my-2">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h6>Date de vote</h6>
                                    </div>
                                    <div class="col-sm-6 text-secondary ">
                                        <b>{{ $lois->DtVote }}</b>
                                    </div>
                                </div>
                                <hr class=" col-sm-12 my-2">
                                @if($lois->oui == null )
                                    @can('edit')
                                    <button type="button" class="btn btn-sm btn-primary ml-auto mr-auto " data-toggle="modal"
                                            data-target="#exampleModalCenterV">
                                        Ajouter Résultat du vote
                                    </button>
                                    @endcan
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModalCenterV" tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content bg-dark">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalCenterTitle">Ajouter
                                                        Résultate</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form method="post"
                                                      action="{{action('App\Http\Controllers\LoisController@updateLois')}}"
                                                      enctype="multipart/form-data">
                                                    {{csrf_field()}}
                                                    {{ method_field('POST') }}
                                                    <div class="modal-body">

                                                        <input type="hidden" value="{{$lois->id}}" name="id">


                                                        <div
                                                            class="form-group{{ $errors->has('DtVote') ? ' has-danger' : '' }}">
                                                            <label class="form-control-label"
                                                                   for="input-title">{{ __('Date de Vote') }}</label>
                                                            <input type="date" name="date" id="input-name"
                                                                   class="form-control form-control-alternative{{ $errors->has('DtVote') ? ' is-invalid' : '' }}"
                                                                   placeholder="{{today()}}"
                                                                   value="{{ Carbon\Carbon::now()->format('Y-m-d') }}"
                                                                   required autofocus>
                                                            @include('alerts.feedback', ['field' => 'DtVote'])
                                                        </div>

                                                        <div
                                                            class="form-group{{ $errors->has('oui') ? ' has-danger' : '' }}">
                                                            <label class="form-control-label"
                                                                   for="input-title">{{ __('Votant OUI') }}</label>
                                                            <input type="number" name="oui" id="input-name"
                                                                   class="form-control form-control-alternative{{ $errors->has('oui') ? ' is-invalid' : '' }}"
                                                                   placeholder="" value="" required autofocus>
                                                            @include('alerts.feedback', ['field' => 'oui'])
                                                        </div>

                                                        <div
                                                            class="form-group{{ $errors->has('non') ? ' has-danger' : '' }}">
                                                            <label class="form-control-label"
                                                                   for="input-title">{{ __('Votant NON ') }}</label>
                                                            <input type="number" name="non" id="input-name"
                                                                   class="form-control form-control-alternative{{ $errors->has('non') ? ' is-invalid' : '' }}"
                                                                   placeholder="" value="" required autofocus>
                                                            @include('alerts.feedback', ['field' => 'non'])
                                                        </div>

                                                        <div
                                                            class="form-group{{ $errors->has('abs') ? ' has-danger' : '' }}">
                                                            <label class="form-control-label"
                                                                   for="input-title">{{ __('Nombre abstention') }}</label>
                                                            <input type="number" name="abs" id="input-name"
                                                                   class="form-control form-control-alternative{{ $errors->has('abs') ? ' is-invalid' : '' }}"
                                                                   placeholder="" value="" required autofocus>
                                                            @include('alerts.feedback', ['field' => 'abs'])
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close
                                                        </button>
                                                        <button type="submit" class="btn btn-primary">Save</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                @else
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h6 class="mt-2">Nombre de votant "OUI"</h6>
                                        </div>
                                        <div class="col-sm-6 text-secondary mt-2">
                                            <b>{{ $lois->oui }}</b>
                                        </div>
                                    </div>
                                    <hr class="col-sm-12 my-2">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h6 class="mt-2">Nombre de votant "NON"</h6>
                                        </div>
                                        <div class="col-sm-6 text-secondary mt-2">
                                            <b>{{ $lois->non }}</b>
                                        </div>
                                    </div>
                                    <hr class="col-sm-12 my-2">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h6 class="mt-2">Nombre aprobation</h6>
                                        </div>
                                        <div class="col-sm-6 text-secondary mt-2">
                                            <b>{{ $lois->abs }}</b>
                                        </div>
                                    </div>
                            </div>

                            <div class="col-md-6">
                                <div class="col-md-10 text-primary ml-auto mr-auto">
                                    <div class="card card-chart" style="background-color: #4f5167; height: 430px">
                                        <div class="card-header">
                                            <h5 class="card-category">Résultat du vote</h5>
                                            <h3 class="card-title"><i
                                                    class="tim-icons icon-send text-success"></i>{{$lois->sessions->name}}
                                            </h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="chart-area">
                                                {!! $chart->container() !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

                        {{ $chart->script() }}
                    @endif
                    @endif


                </div>
                <div class="tab-pane" id="pill6">
                    @if($lois->etat < 5)
                        <h1>Phase de vote non achevé</h1>
                    @elseif($lois->etat >= 5 )
                        <div class="row">
                            <div class="col-sm-4">
                                <h6 class="mt-2">Nom</h6>
                            </div>
                            <div class="col-sm-8 text-secondary mt-2">
                                <b>{{ $lois->name }}</b>
                            </div>
                        </div>
                        <hr class="my-2">
                        <div class="row">
                            <div class="col-sm-4">
                                <h6>Nom d'article</h6>
                            </div>
                            <div class="col-sm-8 text-secondary ">
                                <b>{{ $lois->NbAraticle}}</b>
                            </div>
                        </div>
                        <hr class="my-2">
                        <div class="row">
                            <div class="col-sm-4">
                                <h6>Date de vote</h6>
                            </div>
                            <div class="col-sm-8 text-secondary ">
                                <b>{{ $lois->DtVote }}</b>
                            </div>
                        </div>
                        <hr class="my-2">
                        @if($lois->getFirstMedia() == null)
                            @can('edit')
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                    data-target="#exampleModalCenterL">
                                Ajouter Nouvelle lois En Français
                            </button>
                            @endcan
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalCenterL" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content bg-dark">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCenterTitle">Ajouter Nouvelle lois
                                                En Français</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form method="post"
                                              action="{{action('App\Http\Controllers\LoisController@updateN')}}"
                                              enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            {{ method_field('POST') }}
                                            <div class="modal-body">
                                                <input type="hidden" value="{{$lois->id}}" name="id">

                                                <div
                                                    class="form-group{{ $errors->has('Date Adoption Lois') ? ' has-danger' : '' }}">
                                                    <label class="form-control-label"
                                                           for="input-title">{{ __('DtAdoption') }}</label>
                                                    <input type="date" name="date" id="input-name"
                                                           class="form-control form-control-alternative{{ $errors->has('DtAdoption') ? ' is-invalid' : '' }}"
                                                           placeholder="{{today()}}"
                                                           value="{{ Carbon\Carbon::now()->format('Y-m-d') }}" required
                                                           autofocus>
                                                    @include('alerts.feedback', ['field' => 'DtAdoption'])
                                                </div>

                                                <div
                                                    class="form-group{{ $errors->has('Adoption') ? ' has-danger' : '' }}">
                                                    <label class="form-control-label"
                                                           for="input-title">{{ __('Adoption') }}</label>
                                                    <input type="number" name="Adoption" id="input-name"
                                                           class="form-control form-control-alternative{{ $errors->has('Adoption') ? ' is-invalid' : '' }}"
                                                           placeholder="" value="" required autofocus>
                                                    @include('alerts.feedback', ['field' => 'Adoption'])
                                                </div>
                                                <div class="form-group form-file-upload form-file-multiple d-block">
                                                    <label class="form-control-label"
                                                           for="input-file">{{ __('Fichier') }}</label>
                                                    <input type="file" name="file" class="inputFileHidden"
                                                           id="input-file">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control inputFileVisible"
                                                               placeholder="Single File" id="input-file">
                                                        <span class="input-group-btn d-flex">
                                                                        <button type="button"
                                                                                class="btn btn-fab btn-round btn-success">
                                                                            <i class="tim-icons icon-cloud-upload-94"></i>
                                                                        </button>
                                                                    </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                    Close
                                                </button>
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="row">
                                <div class="col-sm-4">
                                    @can('edit')
                                    <form class="text-center" action="{{ route('deleteN',$lois->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <div class="file-man-box">
                                            <button class="file-close"><i class="fa fa-times-circle"></i></button>
                                        </div>
                                    </form>
                                    @endcan
                                    <div class="file-img-box">
                                        <img class="mr-auto ml-auto" width="150px"
                                             @if($lois->getFirstMedia()['mime_type'] == 'application/pdf')src="https://coderthemes.com/highdmin/layouts/assets/images/file_icons/pdf.svg"
                                             alt="icon">
                                        @elseif($lois->getFirstMedia()['mime_type'] == 'image/png' || 'image/jpg') <img
                                            src="https://coderthemes.com/highdmin/layouts/assets/images/file_icons/png.svg"
                                            alt="icon" @endif>

                                        <a href="{{ route('downloadfileN',$lois->id) }}" class="file-download"><i
                                                class="fa fa-download"></i></a></div>
                                    <div class="file-man-title">
                                        <h5 class="mb-0 text-overflow">{{$lois ->getFirstMedia()['file_name']}}</h5>
                                        <p class="mb-0">
                                            <small>{{$lois ->getFirstMedia()['human_readable_size']}}</small></p>
                                    </div>
                                </div>
                                <div class="col-sm-7 text-secondary mt-3 ">
                                    <b>{{ $lois->contenu }}</b>
                                </div>
                            </div>
                        @endif
                        @if($lois->loisar == null)
                            @can('edit')
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                    data-target="#exampleModalCenterLA">
                                Ajouter Rapport complementaire En Arabe
                            </button>
                            @endcan
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalCenterLA" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalCenterTitleA" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content bg-dark">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCenterTitleA">Ajouter Nouvelle Lois
                                                En Arabe</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form method="post"
                                              action="{{action('App\Http\Controllers\LoisController@updateNAR')}}"
                                              enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            {{ method_field('POST') }}
                                            <div class="modal-body">
                                                <input type="hidden" value="{{$lois->id}}" name="id">


                                                <div class="form-group form-file-upload form-file-multiple d-block">
                                                    <label class="form-control-label"
                                                           for="input-file">{{ __('Fichier') }}</label>
                                                    <input type="file" name="file" class="inputFileHidden"
                                                           id="input-file">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control inputFileVisible"
                                                               placeholder="Single File" id="input-file">
                                                        <span class="input-group-btn d-flex">
                                                                        <button type="button"
                                                                                class="btn btn-fab btn-round btn-success">
                                                                            <i class="tim-icons icon-cloud-upload-94"></i>
                                                                        </button>
                                                                    </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                    Close
                                                </button>
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="row">
                                <div class="col-sm-4">
                                    @can('edit')
                                    <form class="text-center" action="{{ route('deleteNA',$lois->loisar->id) }}"
                                          method="post">
                                        @csrf
                                        @method('delete')
                                        <div class="file-man-box">
                                            <button class="file-close"><i class="fa fa-times-circle"></i></button>
                                        </div>
                                    </form>
                                    @endcan
                                    <div class="file-img-box">
                                        <img class="mr-auto ml-auto" width="150px"
                                             @if($lois->loisar->getFirstMedia()['mime_type'] == 'application/pdf')src="https://coderthemes.com/highdmin/layouts/assets/images/file_icons/pdf.svg"
                                             alt="icon">
                                        @elseif($lois->loisar->getFirstMedia()['mime_type'] == 'image/png' || 'image/jpg')
                                            <img
                                                src="https://coderthemes.com/highdmin/layouts/assets/images/file_icons/png.svg"
                                                alt="icon" @endif>

                                            <a href="{{ route('downloadfileNA',$lois->loisar->id) }}"
                                               class="file-download"><i class="fa fa-download"></i></a></div>
                                    <div class="file-man-title">
                                        <h5 class="mb-0 text-overflow">{{$lois->loisar->getFirstMedia()['file_name']}}</h5>
                                        <p class="mb-0">
                                            <small>{{$lois->loisar->getFirstMedia()['human_readable_size']}}</small></p>
                                    </div>
                                </div>
                                <div class="col-sm-7 text-secondary mt-3 ">
                                    <b>{{ $lois->contenu }}</b>
                                </div>
                            </div>
                        @endif
                    @endif
                </div>
            </div>
            </div>
            </div>
            </div>
    </div>

@endsection
