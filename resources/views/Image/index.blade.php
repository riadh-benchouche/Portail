@extends('layouts.app', ['page' => __('Manage Users'), 'pageSlug' => 'Users'])
@section('content')
<div class=" text-sm-right mb-2">
    <a href="{{ url('Image/create') }}" class="btn btn-sm btn-primary ">
        <i class="tim-icons icon-simple-add"></i> Ajouter Image
    </a>
</div>
<style>
    body{
        margin-top:20px;
    }



    .mt-20 {
        margin-top: 20px !important;
    }

    .relative {
        position: relative;
    }

    .badge-corner:empty {
        display: inline-block;
    }
    .badge-corner {
        position: absolute;
        top: 0;
        right: 0;
        width: 0;
        height: 0;
        border-top: 66px solid #888;
        border-top-color: rgba(0, 0, 0, 0.3);
        border-left: 66px solid transparent;
        padding: 0;
        background-color: transparent;
        border-radius: 0;
    }
    .badge-corner span {
        position: absolute;
        top: -52px;
        left: -28px;
        font-size: 16px;
        color: #fff;
    }
    .badge-corner-base {
        border-top-color: #3498db;
    }
    .badge-corner-alt {
        border-top-color: #9cd70e;
    }
    .badge-corner-light {
        border-top-color: #ecf0f1;
    }
    .badge-corner-light span {
        color: #2c3e50;
    }
    .badge-corner-dark {
        border-top-color: #131313;
    }
    .badge-corner-orange {
        border-top-color: #ff8a3c;
    }

    .relative img{
        margin-top:6px;
    }
</style>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <div class="container bootstrap snippets bootdey">

            <div class="row">
            @foreach($images as $image)
            <div class="col-md-4 col-sm-4 col-xs-6">
                <div class="relative mt-auto mb-auto">
                    <a data-toggle="modal" data-target="#exampleModalCenterSA{{$image->id}}"> <img  src="{{ asset('storage').'/'.$image ->getFirstMedia()['id'].'/'.$image ->getFirstMedia()['file_name']}}" class="img-responsive mt-4" alt="" style="width:600px; height:200px "></a>
                </div>
            </div>
                    <!-- Modal -->
                    <div class="modal modal-search fade "  id="exampleModalCenterSA{{$image->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog  modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalCenterTitle">{{$image->title}}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                    <div class="modal-body">
                                        <img  src="{{ asset('storage').'/'.$image ->getFirstMedia()['id'].'/'.$image ->getFirstMedia()['file_name']}}" class="img-responsive " alt="" >

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <form class="text-center " action="{{ url('Image/'.$image->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <a rel="tooltip" class="btn btn-warning btn-fab btn-icon btn-round " href="{{ url ('Image/'.$image->id.'/edit')}}" data-original-title="" title="">
                                                <i class="tim-icons icon-pencil" title="edit"></i>
                                            </a>
                                            <button type="button" class="btn btn-danger btn-fab btn-icon btn-round " onclick="confirm('{{ __("Êtes vous sûr de vouloir supprimer ?") }}') ? this.parentElement.submit() : ''">
                                                <i class="tim-icons icon-trash-simple" title="supprimer"></i>
                                            </button>
                                        </form>
                                    </div>

                            </div>
                        </div>
                    </div>
                            @endforeach
        </div>
        </div>


@endsection
