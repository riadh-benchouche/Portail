@extends('layouts.app', ['page' => __('Manage Users'), 'pageSlug' => 'Users'])

@section('content')
    <div class="container-fluid " >
        <div class="col-12">
            <div class="card mb-3 text-center">
                <div class="col-md-12 mr-auto ml-auto mt-3">
                    <img  src="{{ asset('storage').'/'.$actualite ->getFirstMedia()['id'].'/'.$actualite ->getFirstMedia()['file_name']}}" >
                </div>
                <div class="card-body">
                    <h1 class="card-title display-4 mt-3" ><b>{{$actualite->title}}</b></h1>
                    <p class="card-text text-justify " style="line-height: 2.3em">{{$actualite->contenu}}</p>
                </div>
                <div class="card-footer ">
                    <p class="card-text"><small class="text-muted pull-right mt-2">{{$actualite->created_at}}</small></p>
                    <a href="{{ url('actualite') }}" class="btn btn-sm btn-primary pull-left">{{ __('Retour') }}</a>
                </div>
            </div>
        </div>
        <hr>
        <h5>Commentaires</h5>
        <form action="{{action('App\Http\Controllers\CommentController@store', $actualite)}}" method="POST" class="mt-3">
            {{csrf_field()}}
            {{ method_field('POST') }}
            <div class="form-group">
                <label for="content">Votre commentaire</label>
                <textarea class="form-control" @error('content') aria-invalid @enderror name="content" id="content" rows="5"></textarea>
                @error('content')
                <div class="invalid-feedback">
                    {{ $errors->first('content') }}
                </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-success">Soumettre Commentaire</button>
        </form>

    </div>
@endsection
