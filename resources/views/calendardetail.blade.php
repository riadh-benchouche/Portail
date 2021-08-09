@extends('layouts.app', ['page' => __('Icons'), 'pageSlug' => 'icons'])
@section('content')

<div class="row gutters-sm">
    <div class="col-md-4 mb-3">
        <div class="card" style="height: 420px">
            <div class="card-body">
                <div class="d-flex flex-column align-items-center text-center">
                    <img src="https://cdn4.iconfinder.com/data/icons/small-n-flat/24/calendar-512.png" width="100px" >
                    <div class="mt-3">

                            <p class="text-secondary text-left  mb-2" style="font-size: 15px">Évènement de type : </p>
                            <li class="text-secondary text-left font-weight-bold mb-2 ml-4" style="font-size: 15px">{{$event->categories->name}}  </li>
                            <p class="text-secondary text-left mb-2 " style="font-size: 15px">Début de l'évènement : </p>
                            <li class="text-secondary text-left font-weight-bold mb-2 ml-4" >{{$event->start_date}}</li>
                            <p class="text-secondary text-left  mb-2" style="font-size: 15px">Fin de l'évènement : </p>
                            <li class="text-secondary text-left font-weight-bold mb-2 ml-4" style="font-size: 15px">{{$event->end_date}}</li>

                                @can('edit')
                            <form class="text-center card-footer mt-3 " action="{{ url('fullcalender/'.$event->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <a rel="tooltip" class="btn btn-sm btn-warning " href="{{ url ('fullcalender/'.$event->id.'/edit')}}" data-original-title="" title="">
                                    <i class="tim-icons icon-pencil" title="edit"></i> Editer
                                </a>
                                <button type="button" class="btn btn-sm btn-danger " onclick="confirm('{{ __("Êtes vous sûr de vouloir supprimer ?") }}') ? this.parentElement.submit() : ''">
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
        <div class="card  p-sm" >
            <div class="card-body  ">
                <div class="row">
                    <div class="col-sm-12 text-secondary display-4">
                        {{ $event->title }}
                    </div>
                </div>
                <hr class="m-2">
                <div class="row">
                    <div class="col-sm-12 text-secondary">
                        {{ $event->description }}
                    </div>
                </div>
            </div>
            <div class="card-footer text-center ">
                <a  href="{{ url('icons') }}" class="btn btn-sm btn-primary ">{{ __('Retour') }}</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>
@endsection


