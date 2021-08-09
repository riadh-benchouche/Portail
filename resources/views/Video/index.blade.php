@extends('layouts.app', ['page' => __('Manage Users'), 'pageSlug' => 'Users'])
@section('content')
    @can('edit')
<div class=" text-sm-right mb-2">
    <a href="{{ url('Video/create') }}" class="btn btn-sm btn-primary ">
        <i class="tim-icons icon-simple-add"></i> Ajouter Video
    </a>
</div>
@endcan

<div class="row">
    @foreach($videos as $video)
        <div class="col-md-4 col-sm-4 col-xs-6">
            <div class="relative mt-auto mb-auto">
               <div class="col py-2">
                        <div class="video">
                            <video class="video-fluid z-depth-1"  loop controls  muted>
                                <source src="{{ asset('storage').'/'.$video ->getFirstMedia()['id'].'/'.$video ->getFirstMedia()['file_name']}}" type="video/mp4" />
                            </video>
                        </div>
                    </div>
            </div>
        </div>


    @endforeach
        </div>

</div>
@endsection
