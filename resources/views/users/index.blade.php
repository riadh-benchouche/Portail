@extends('layouts.app', ['page' => __('Manage Users'), 'pageSlug' => 'Users'])

@section('content')
                <div class="content">
                        <div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <div class="row">
                    <div class="col-8">
                        <h4 class="card-title">Annuaire</h4>
                    </div>
                    @can('adminp')
                    <div class="col-4 text-right">
                        <a href="{{ route('user.create') }}" class="btn btn-sm btn-primary">Add user</a>
                    </div>
                    @endcan
                </div>
            </div>
            <div class="row">
                @foreach($users as $user)
                    <a href="{{ url('user/'.$user->id) }}" >

                    <div class="card-body">
                <div class="col-lg-4 ml-auto mr-auto" >
                    <div class="card mb-3 bg-gray-800">
                        <div class="row g-0">
                            <div class="col-md-5">
                                <img src="{{ asset('storage').'/'.$user ->getFirstMedia()['id'].'/'.$user ->getFirstMedia()['file_name']}}" >
                            </div>
                            <div class="col-md-7">
                                <div class="card-body   ">
                                    <p class="card-title">{{$user ->name}}</p>
                                    <p class="card-text">{{ $user ->nom_a }}</p>
                                    <div class="card-footer">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            </a>
            @endforeach
        </div>
    </div>
</div>
                </div>
@endsection
