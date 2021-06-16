@extends('layouts.app', ['page' => __('Manage Users'), 'pageSlug' => 'Users'])
@section('content')
<div class=" text-sm-right mb-2">
    <a href="{{ url('Image/create') }}" class="btn btn-sm btn-primary ">
        <i class="tim-icons icon-simple-add"></i> Ajouter Image
    </a>
</div>

@endsection
