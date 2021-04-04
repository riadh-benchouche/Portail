@extends('layouts.app', ['page' => __('User Management'), 'pageSlug' => 'users'])

@section('content')
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('User Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('user.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('user.update', $user) }}" autocomplete="off">
                            @csrf
                            @method('put')

                            <h6 class="heading-small text-muted mb-4">{{ __('User information') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                    <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', $user->name) }}" required autofocus>
                                    @include('alerts.feedback', ['field' => 'name'])
                                </div>
                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-email">{{ __('Email') }}</label>
                                    <input type="email" name="email" id="input-email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email', $user->email) }}" required>
                                    @include('alerts.feedback', ['field' => 'email'])
                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-password">{{ __('Password') }}</label>
                                    <input type="password" name="password" id="input-password" class="form-control form-control-alternative{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Password') }}" value="">
                                    @include('alerts.feedback', ['field' => 'password'])
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="input-password-confirmation">{{ __('Confirm Password') }}</label>
                                    <input type="password" name="password_confirmation" id="input-password-confirmation" class="form-control form-control-alternative" placeholder="{{ __('Confirm Password') }}" value="">
                                </div>
                                <div class="form-group{{ $errors->has('phone') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('phone') }}</label>
                                    <input type="text" name="phone" id="input-phone" class="form-control form-control-alternative{{ $errors->has('phone') ? ' is-invalid' : '' }}" placeholder="{{ __('phone') }}" value="{{ old('phone', $user->phone) }}" required autofocus>
                                    @include('alerts.feedback', ['field' => 'phone'])
                                </div>
                                <div class="form-group{{ $errors->has('fonction') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('fonction') }}</label>
                                    <input type="text" name="fonction" id="input-fonction" class="form-control form-control-alternative{{ $errors->has('fonction') ? ' is-invalid' : '' }}" placeholder="{{ __('fonction') }}" value="{{ old('fonction', $user->fonction) }}" required autofocus>
                                    @include('alerts.feedback', ['field' => 'fonction'])
                                </div>
                                <div class="form-group{{ $errors->has('Wilaya') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Wilaya') }}</label>
                                    <input type="text" name="Wilaya" id="input-wilaya" class="form-control form-control-alternative{{ $errors->has('Wilaya') ? ' is-invalid' : '' }}" placeholder="{{ __('Wilaya') }}" value="{{ old('Wilaya', $user->Wilaya) }}" required autofocus>
                                    @include('alerts.feedback', ['field' => 'Wilaya'])
                                </div>


                                <div class="form-check">

                                    <label class="form-control-label" for="input-password-confirmation">{{ __('Give rights') }}</label>

                                        @foreach($roles as $role)
                                            <label for="{{ $role -> id  }}" class="form-check-label ml-2"> {{$role -> name}}
                                                <input type="checkbox"  class="form-check-input" name="role[]" value="{{$role->id}}" id="{{$role -> id}}"
                                                       @if ($user->hasRole($role->name))checked @endif >
                                                <span class="form-check-sign">
                                                     <span
                                                         class="check">
                                                     </span>
                                             </span>
                                            </label>
                                        @endforeach

                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
