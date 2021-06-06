@extends('layouts.app')

@section('content')
    <div class="header py-7 py-lg-8">
        <div class="container " >
            <div class="header-body text-center mb-7">  
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-6">
                        <h1 class="text-white display-4">{{ __('Bienvenue !') }}</h1>
                        <div class=" mt-4">
                            <img src="{{ asset('black') }}/img/logo apn.png" alt="" class="center-block"  >
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
