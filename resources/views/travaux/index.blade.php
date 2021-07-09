@extends('layouts.app', ['page' => __('Manage Users'), 'pageSlug' => 'Users'])
@section('content')
    <div class="content">
        <div class="row " >
            @foreach($travaux as $travail)
                <div class="card mb-3 ml-2 mr-2" >
                    <div class="row g-0">
                        <div class="col-md-4 mt-3 ml-3">
                            <img  src="{{ asset('storage').'/'.$travail ->getFirstMedia()['id'].'/'.$travail ->getFirstMedia()['file_name']}}" >
                        </div>
                        <div class="col-md-7    ">
                            <div class="card-body">
                                <h2 class="card-title"><b>{{substr($travail ->title,0,60)}}...</b></h2>
                                <p class="card-text">{{substr($travail ->contenu,0,250)}}...</p>
                                <div class="card-footer">
                                        <a href="{{ url('travaux/'.$travail->id) }}" class="btn btn-info btn-fab btn-icon btn-round" >
                                            <i class="tim-icons icon-book-bookmark"></i>
                                        </a>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h2 class="card-title text-muted pull-right"><b>Travail de la commission {{$travail->comissions->name}}</b></h2>
                                    </div>
                                    <div class="col-md-6 pull-right">
                                    <h2 class="card-title text-muted pull-left"><b>{{$travail->created_at}}</b></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
