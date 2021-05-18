@extends('layouts.app', ['page' => __('Manage Users'), 'pageSlug' => 'Users'])
@section('content')
<div class="card">
        <div class="card-header  ">
            <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
            <div class="nav-tabs-navigation">
                <div class="nav-tabs-wrapper">
                    <ul class="nav nav-pills bg-rose">
                        <li class="nav-item "><a class="nav-link  active" href="#pill1" data-toggle="tab">Énoncé</a></li>
                        <li class="nav-item"><a class="nav-link" href="#pill2" data-toggle="tab">Étude préliminaire</a></li>
                        <li class="nav-item"><a class="nav-link" href="#pill3" data-toggle="tab">Séance plénière</a></li>
                        <li class="nav-item"><a class="nav-link" href="#pill4" data-toggle="tab">Étude complémentaire</a></li>
                        <li class="nav-item"><a class="nav-link" href="#pill5" data-toggle="tab">Phase de Vote</a></li>
                        <li class="nav-item"><a class="nav-link" href="#pill6" data-toggle="tab">Nouvelle loi</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="card-body ">
            <div class="tab-content text-center">
                <div class="tab-pane active" id="pill1">
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
                            <h6 >Nombre d'article</h6>
                        </div>
                        <div class="col-sm-8 text-secondary ">
                            <b>{{ $lois->NbAraticle}}</b>
                        </div>
                    </div>
                    <hr class="my-2">
                    <div class="row">
                        <div class="col-sm-4">
                            <h6 >Date de reçu</h6>
                        </div>
                        <div class="col-sm-8 text-secondary ">
                            <b>{{ $lois->DtDepot }}</b>
                        </div>
                    </div>
                    <hr class="my-2">
                    <div class="row">
                        <div class="col-sm-4">
                            <h6 >Contenu</h6>
                        </div>
                        <div class="col-sm-8 text-secondary ">
                            <b>{{ $lois->contenu }}</b>
                        </div>
                    </div>

                    <div class="col-lg-3 col-xl-2">
                        <div class="file-man-box"><a href="" class="file-close"><i class="fa fa-times-circle"></i></a>
                            <div class="file-img-box"><img src="{{ asset('storage').'/'.$lois->enonce->getFirstMedia()['id'].'/'.$lois->enonce ->getFirstMedia()['file_name']}}" alt="icon"></div><a href="{{ asset('storage').'/'.$lois->enonce->getFirstMedia()['id'].'/'.$lois->enonce ->getFirstMedia()['file_name']}}" class="file-download"><i class="fa fa-download"></i></a>
                            <div class="file-man-title">
                                <h5 class="mb-0 text-overflow">invoice_project.pdf</h5>
                                <p class="mb-0"><small>568.8 kb</small></p>
                            </div>
                        </div>
                    </div>



                    <hr class="my-2">
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form method="post" action="{{action('App\Http\Controllers\LoisController@updateEnonce')}}" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    {{ method_field('POST') }}
                                    <div class="modal-body">
                                    <input type="hidden" value="{{$lois->id}}" name="id">
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
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save </button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                        Ajouter l'enoncé
                    </button>



                    </div>

                <div class="tab-pane" id="pill2">
                    <p> I will be the leader of a company that ends up being worth billions of dollars, because I got the answers. I understand culture. I am the nucleus. I think that&#x2019;s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at. I think that&#x2019;s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at. </p>
                </div>
                <div class="tab-pane" id="pill3">
                    <p> I think that&#x2019;s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at. I will be the leader of a company that ends up being worth billions of dollars, because I got the answers. I understand culture. I am the nucleus. I think that&#x2019;s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at.</p>
                </div>
                <div class="tab-pane" id="pill4">
                    <p> I think that&#x2019;s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at. I will be the leader of a company that ends up being worth billions of dollars, because I got the answers. I understand culture. I am the nucleus. I think that&#x2019;s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at.</p>
                </div>
                <div class="tab-pane" id="pill5">
                    <p> I think that&#x2019;s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at. I will be the leader of a company that ends up being worth billions of dollars, because I got the answers. I understand culture. I am the nucleus. I think that&#x2019;s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at.</p>
                </div>
                <div class="tab-pane" id="pill6">
                    <p> I think that&#x2019;s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at. I will be the leader of a company that ends up being worth billions of dollars, because I got the answers. I understand culture. I am the nucleus. I think that&#x2019;s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at.</p>
                </div>

            </div>
        </div>

        </div>

@endsection
