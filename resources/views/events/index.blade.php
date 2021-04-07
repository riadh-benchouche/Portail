@extends('layouts.app', ['page' => __('User Management'), 'pageSlug' => 'users'])

@section('content')

    {!! $events->calendar() !!}

@endsection

