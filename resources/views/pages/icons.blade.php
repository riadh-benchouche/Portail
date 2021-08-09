@extends('layouts.app', ['page' => __('Icons'), 'pageSlug' => 'icons'])
@section('content')

    <div class="row text-center">
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <p> {{ \session::get('success')}} </p>
            </div>
        @endif
    </div>

    <br>
    <div class="row">
        <div class="col-md-12 ml-auto mr-auto">
            <div class="card" style="background-image:url('{{asset('black/img/cal1.jpg')}}'); background-size: cover">
                <div class="card-header">
                    @can('edit')
                <div class="row pull-right mr-3">
                    <div class="  text-right pull-right mb-2">
                        <a href="{{ url('fullcalender/create') }}" class="btn btn-sm " style="background: #538037">
                            <i class="tim-icons icon-simple-add"></i> Evenement
                        </a>
                    </div>
                </div>
                </div>
                @endcan
                <div class="card-body" >
                    {!! $calendar->calendar() !!}
                </div>
            </div>
        </div>
    </div>
    @push('js')
        {!! $calendar->script() !!}
    @endpush
@endsection
