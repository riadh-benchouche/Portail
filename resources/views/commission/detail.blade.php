@extends('layouts.app', ['page' => __('User Management'), 'pageSlug' => 'users'])

@section('content')
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <style>
        body{margin-top:20px;}
        .single-team .inner {
            text-align: center;
            margin-bottom: 35px;
            border: 1px solid #e5eaf0;
            padding: 5px 5px 0px;
        }

        .single-team .inner .team-img {
            position: relative;
        }

        .single-team .inner .team-img img {
            width: 100%;
        }

        .single-team .inner .team-img::after {
            content: "";
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            opacity: 0;
        }

        .single-team .inner .team-img:hover::after {
            opacity: 0.4;
        }

        .single-team .inner .team-content {
            padding: 22px 0px 0px;
        }

        .single-team .inner .team-content h4 {
            font-size: 18px;
            font-weight: 400;
        }

        .single-team .inner .team-content h5 {
            font-weight: 300;
            font-size: 16px;
            letter-spacing: 0.5px;
            color: #7d91aa;
        }

        .single-team .inner .team-content a {
            display: inline-block;
            padding: 2px;
            margin: 0 3px;
            font-size: 16px;
        }

        .team-social {
            background: #f3f6fa;
            width: 50%;
            padding-top: 4px;
            margin: auto;
            border-radius: 15px 15px 0px 0px;
            margin-top: 17px;
        }

    </style>

    <div class="container">
        <div class="row gutters-sm">
            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                <div class="card h-50" >
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            @if ($president->getFirstMedia() == null)
                                <img src="http://style.anu.edu.au/_anu/4/images/placeholders/person_8x10.png" width="175px" class="rounded-circle" alt="...">
                            @elseif ( $president->getFirstMedia() )
                                <img  class="rounded-circle "  width="150px " src="{{ asset('storage').'/'.$president ->getFirstMedia()['id'].'/'.$president->getFirstMedia()['file_name']}}"  >
                            @endif
                            <div class="mt-3">
                                <p class="text-secondary text-center font-weight-bold mb-2" style="font-size: 15px">{{ $president->name }} | {{ $president->nom_a }}</p>
                                <p class="text-secondary mb-3 " style="font-size: 22px">{{ $president->fonction }}</p>
                                <form class="text-center" action="{{ url('user/'.$president->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <a rel="tooltip" class="btn btn-sm btn-warning  " href="{{ url ('user/'.$president->id.'/edit')}}" data-original-title="" title="">
                                        <i class="tim-icons icon-pencil" title="edit"></i> Editer
                                    </a>
                                    <button type="button" class="btn btn-sm  btn-danger " onclick="confirm('{{ __("Êtes vous sûr de vouloir supprimer ?") }}') ? this.parentElement.submit() : ''">
                                        <i class="tim-icons icon-trash-simple" title="supprimer"></i> Supprimer
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="team-area sp">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-6 col-md-4 col-lg-3 single-team">
                                        <div class="inner">
                                            <div class="team-img">
                                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="Member Photo">
                                            </div>
                                            <div class="team-content">
                                                <h4>Virgie Perry</h4>
                                                <h5>Athletic Trainer</h5>
                                                <div class="team-social">
                                                    <a href="#" class="fa fa-facebook"></a>
                                                    <a href="#" class="fa fa-twitter"></a>
                                                    <a href="#" class="fa fa-linkedin"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-lg-3 single-team">
                                        <div class="inner">
                                            <div class="team-img">
                                                <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="Member Photo">
                                            </div>
                                            <div class="team-content">
                                                <h4>Virgie Perry</h4>
                                                <h5>Athletic Trainer</h5>
                                                <div class="team-social">
                                                    <a href="#" class="fa fa-facebook"></a>
                                                    <a href="#" class="fa fa-twitter"></a>
                                                    <a href="#" class="fa fa-linkedin"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-lg-3 single-team">
                                        <div class="inner">
                                            <div class="team-img">
                                                <img src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="Member Photo">
                                            </div>
                                            <div class="team-content">
                                                <h4>Virgie Perry</h4>
                                                <h5>Athletic Trainer</h5>
                                                <div class="team-social">
                                                    <a href="#" class="fa fa-facebook"></a>
                                                    <a href="#" class="fa fa-twitter"></a>
                                                    <a href="#" class="fa fa-linkedin"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-lg-3 single-team">
                                        <div class="inner">
                                            <div class="team-img">
                                                <img src="https://bootdey.com/img/Content/avatar/avatar4.png" alt="Member Photo">
                                            </div>
                                            <div class="team-content">
                                                <h4>Virgie Perry</h4>
                                                <h5>Athletic Trainer</h5>
                                                <div class="team-social">
                                                    <a href="#" class="fa fa-facebook"></a>
                                                    <a href="#" class="fa fa-twitter"></a>
                                                    <a href="#" class="fa fa-linkedin"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-lg-3 single-team">
                                        <div class="inner">
                                            <div class="team-img">
                                                <img src="https://bootdey.com/img/Content/avatar/avatar5.png" alt="Member Photo">
                                            </div>
                                            <div class="team-content">
                                                <h4>Virgie Perry</h4>
                                                <h5>Athletic Trainer</h5>
                                                <div class="team-social">
                                                    <a href="#" class="fa fa-facebook"></a>
                                                    <a href="#" class="fa fa-twitter"></a>
                                                    <a href="#" class="fa fa-linkedin"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-lg-3 single-team">
                                        <div class="inner">
                                            <div class="team-img">
                                                <img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="Member Photo">
                                            </div>
                                            <div class="team-content">
                                                <h4>Virgie Perry</h4>
                                                <h5>Athletic Trainer</h5>
                                                <div class="team-social">
                                                    <a href="#" class="fa fa-facebook"></a>
                                                    <a href="#" class="fa fa-twitter"></a>
                                                    <a href="#" class="fa fa-linkedin"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-lg-3 single-team">
                                        <div class="inner">
                                            <div class="team-img">
                                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Member Photo">
                                            </div>
                                            <div class="team-content">
                                                <h4>Virgie Perry</h4>
                                                <h5>Athletic Trainer</h5>
                                                <div class="team-social">
                                                    <a href="#" class="fa fa-facebook"></a>
                                                    <a href="#" class="fa fa-twitter"></a>
                                                    <a href="#" class="fa fa-linkedin"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-lg-3 single-team">
                                        <div class="inner">
                                            <div class="team-img">
                                                <img src="https://bootdey.com/img/Content/avatar/avatar8.png" alt="Member Photo">
                                            </div>
                                            <div class="team-content">
                                                <h4>Virgie Perry</h4>
                                                <h5>Athletic Trainer</h5>
                                                <div class="team-social">
                                                    <a href="#" class="fa fa-facebook"></a>
                                                    <a href="#" class="fa fa-twitter"></a>
                                                    <a href="#" class="fa fa-linkedin"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
