@extends('layouts.app', ['page' => __('Manage Users'), 'pageSlug' => 'Users'])

@section('content')
    <div class="row gutters-sm">
        <div class="col-md-4 mb-3">
            <div class="card" style="height: 420px">
                <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center">
                        @if ($user->getFirstMedia() == null)
                            <img src="http://style.anu.edu.au/_anu/4/images/placeholders/person_8x10.png" width="175px" class="rounded-circle" alt="...">
                        @elseif ( $user->getFirstMedia() )
                            <img  class="rounded-circle "  width="150px " src="{{ asset('storage').'/'.$user->getFirstMedia()['id'].'/'.$user->getFirstMedia()['file_name']}}"  >
                        @endif
                        <div class="mt-3">
                            <p class="text-secondary text-center font-weight-bold mb-2" style="font-size: 15px">{{ $user->name }} | {{ $user->nom_a }}</p>
                            @if ($user->category == 'Député')
                                <p class="text-secondary mb-3 " style="font-size: 22px">@if ($user->president==1) Président @elseif($user->president==2) Vice-président @elseif($user->president==3) Référendaire @elseif($user->president==4)Membre @endif  </p>
                            @elseif($user->category == 'Salarié')
                            <p class="text-secondary mb-3 " style="font-size: 22px">{{ $user->fonction }}</p>
                            @endif
                            @can('edit')
                            <form class="text-center" action="{{ url('user/'.$user->id) }}" method="post">
                                @csrf
                                @method('delete')

                                <a rel="tooltip" class="btn btn-sm btn-warning  " href="{{ url ('user/'.$user->id.'/edit')}}" data-original-title="" title="">
                                    <i class="tim-icons icon-pencil" title="edit"></i> Editer
                                </a>
                                <button type="button" class="btn btn-sm  btn-danger " onclick="confirm('{{ __("Êtes vous sûr de vouloir supprimer ?") }}') ? this.parentElement.submit() : ''">
                                    <i class="tim-icons icon-trash-simple" title="supprimer"></i> Supprimer
                                </button>
                            </form>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8" >
            <div class="card  p-sm" style="height: 420px">
                <div class="card-body  ">
                    <div class="row">
                        <div class="col-sm-4">
                            <h6>Matricule</h6>
                        </div>
                        <div class="col-sm-8 text-secondary">
                            <b>{{ $user->matricule }}</b>
                        </div>
                    </div>
                    <hr class="m-2">
                    <div class="row">
                        <div class="col-sm-4">
                            <h6 >Nom </h6>
                        </div>
                        <div class="col-sm-8 text-secondary">
                            <b>{{ $user->name }}</b>
                        </div>
                    </div>
                    <hr class="m-2">
                    <div class="row">
                        <div class="col-sm-4">
                            <h6 >Email</h6>
                        </div>
                        <div class="col-sm-8 text-secondary">
                            <b>{{ $user->email }}</b>
                        </div>
                    </div>
                    <hr class="m-2">
                    <div class="row">
                        <div class="col-sm-4">
                            <h6>Téléphone de poste</h6>
                        </div>
                        <div class="col-sm-8 text-secondary">
                            <b>{{ $user->phone }}</b>
                        </div>
                    </div>
                    <hr class="m-2">
                    @if($user->category == 'Député')
                        <div class="row">
                            <div class="col-sm-4">
                                <h6 >Commission</h6>
                            </div>
                            <div class="col-sm-8 text-secondary">
                           @if($user->comissions == null)
                           <b>Non atribué</b>
                                   @else
                                <b>{{ $user->comissions->name}}</b>
                               @endif
                            </div>
                        </div>
                    @elseif($user->category == 'Salarié')
                        <div class="row">
                            <div class="col-sm-4">
                                <h6 >Direction-direction</h6>
                            </div>
                            <div class="col-sm-8 text-secondary">
                                @if($user->departments == null)
                                    <b>Non atribué</b>
                                @else
                                    <b>{{ $user->departments->name}}</b>
                                @endif

                            </div>
                        </div>
                        <hr class="m-2">
                        <div class="row">
                            <div class="col-sm-4">
                                <h6 >Sous-direction</h6>
                            </div>
                            <div class="col-sm-8 text-secondary">
                            @if($user->services == null)
                           <b>Non atribué</b>
                                   @else
                                   <b>{{ $user->services->name}}</b>
                            @endif

                            </div>
                        </div>
                    @endif
                    <hr class="m-2">
                    <div class="row">
                        <div class="col-sm-4">
                            <h6 >Wilaya</h6>
                        </div>
                        <div class="col-sm-8 text-secondary">
                            <b>{{ $user->Wilaya}}</b>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center ">
                    <a  href="{{ url('user') }}" class="btn btn-sm btn-primary ">{{ __('Retour') }}</a>
                </div>
            </div>
        </div>
        </div>
@endsection
