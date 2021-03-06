@extends('layouts.app', ['page' => __('User Management'), 'pageSlug' => 'users'])

@section('content')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>

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
                        <form method="post" action="{{ route('user.update', $user) }}" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <h6 class="heading-small text-muted mb-4">{{ __('User information') }}</h6>

                            <div class="fileinput fileinput-new text-center col-md-8 ml-auto mr-auto" data-provides="fileinput">
                                <div class="fileinput-new thumbnail img-raised">
                                    @if ($user->getFirstMedia() == null)
                                    <img src="http://style.anu.edu.au/_anu/4/images/placeholders/person_8x10.png" alt="...">
                                        @elseif ( $user->getFirstMedia() )
                                    <img  class="col-md-4" src="{{ asset('storage').'/'.$user ->getFirstMedia()['id'].'/'.$user ->getFirstMedia()['file_name']}}"  >
                                        @endif
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail img-raised"></div>
                                <div>
                                    <div class="d-grid gap-2 col-12 mx-auto">
                                         <span class="input-group-btn d-flex ">

                                             <button class="btn btn-primary btn-round mr-auto ml-auto mt-2">
                                                 <input type="file" name="file"  class="inputFileHidden" id="input-file" >
                                            </button>
                                        </span>
                                    </div>
                                  <!--  <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a> -->
                                </div>
                            </div>

                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-matricule">{{ __('Matricule') }}</label>
                                        <input type="text" name="matricule" id="input-matricule" class="form-control form-control-alternative{{ $errors->has('matricule') ? ' is-invalid' : '' }}" placeholder="{{ __('matricule') }}" value="{{ old('matricule', $user->matricule) }}" required autofocus>
                                    @include('alerts.feedback', ['field' => 'matricule'])
                                </div>
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Nom Latin ') }}</label>
                                    <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', $user->name) }}" required autofocus>
                                    @include('alerts.feedback', ['field' => 'name'])
                                    <label class="form-control-label" for="input-nameA">{{ __('Nom Arabe') }}</label>
                                    <input type="text" name="nom_a" id="input-nameA" class="form-control form-control-alternative{{ $errors->has('nom_a') ? ' is-invalid' : '' }}" placeholder="{{ __('Nom Arabe') }}" value="{{ old('name', $user->nom_a) }}" required autofocus>
                                    @include('alerts.feedback', ['field' => 'name'])
                                </div>
                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-email">{{ __('Email') }}</label>
                                    <input type="email" name="email" id="input-email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email', $user->email) }}" required>
                                    @include('alerts.feedback', ['field' => 'email'])
                                </div>
                                <fieldset class="form-group">
                                    <label for="exampleSelect1">Cat??gorie</label>
                                    <select name="categorie" class="form-control bg-dark " id="TypeOfConstruction" >
                                        <option value="D??put??" @if($user->category == 'D??put??') selected @endif>D??put??</option>
                                        <option value="Salari??"@if($user->category == 'Salari??') selected @endif>Salari??</option>
                                    </select>
                                </fieldset>

                                <fieldset class="form-group" style="display:none;" id="salarie">
                                    <label for="PartyWalls">Direction :</label>
                                    <select name="department" class="form-control bg-dark" id="TypeOfConstruction" >
                                    @foreach($departments as $department)
                                        <option value="{{ $department->id }}" @if( $user->department_id == $department->id  ) selected @endif>{{ $department->name }}</option>
                                    @endforeach
                                    </select>
                                    <label for="PartyWalls">Sous-Direction :</label>
                                    <select name="service" class="form-control bg-dark" id="TypeOfConstruction" >
                                        <option value="" >Aucune sous direction</option>
                                    @foreach($services as $service)
                                            <option value="{{$service->id}}" @if( $user->service_id == $service->id ) selected @endif>{{ $service ->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="form-group{{ $errors->has('fonction') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="PartyWalls">{{ __('fonction') }}</label>
                                        <input type="text" name="fonction" id="TypeOfConstruction" class="form-control form-control-alternative{{ $errors->has('fonction') ? ' is-invalid' : '' }}" placeholder="{{ __('fonction') }}" value="{{ old('fonction', $user->fonction) }}" >
                                        @include('alerts.feedback', ['field' => 'fonction'])
                                    </div>
                                </fieldset>

                                <fieldset class="form-group" style="display:none;" id="depute">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="PartyWalls1">Comission :</label>
                                            <select name="comission" class="form-control bg-dark" id="TypeOfConstruction" >
                                                @foreach($comissions as $comission)
                                                    <option value="{{$comission->id}}" @if( $user->comission_id == $comission->id ) selected @endif>{{ $comission ->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="PartyWalls1">Role du parlementaire :</label>
                                            <select name="president" class="form-control bg-dark" id="TypeOfConstruction" >
                                                <option value="1" @if( $user->president == 1 ) selected @endif>Pr??sident</option>
                                                <option value="2" @if( $user->president == 2 ) selected @endif>Vice-pr??sident</option>
                                                <option value="3" @if( $user->president == 3 ) selected @endif>R??f??rendaire</option>
                                                <option value="3" @if( $user->president == 4 ) selected @endif>Membre</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-10 ml-auto mr-auto">
                                        <label for="PartyWalls1">Groupe parlementaire :</label>
                                        <select name="groupe" class="form-control bg-dark" id="TypeOfConstruction" >
                                            @foreach($groupes as $groupe)
                                                <option value="{{$groupe->id}}" @if( $user->groupe_id == $groupe->id ) selected @endif>{{ $groupe ->name }}</option>
                                            @endforeach
                                        </select>
                                        </div>
                                    </div>

                                </fieldset>

                            <!--    <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-password">{{ __('Password') }}</label>
                                    <input type="password" name="password" id="input-password" class="form-control form-control-alternative{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Password') }}" value="">
                                    @include('alerts.feedback', ['field' => 'password'])
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="input-password-confirmation">{{ __('Confirm Password') }}</label>
                                    <input type="password" name="password_confirmation" id="input-password-confirmation" class="form-control form-control-alternative" placeholder="{{ __('Confirm Password') }}" value="">
                                </div> -->
                                <div class="form-group{{ $errors->has('phone') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('phone') }}</label>
                                    <input type="text" name="phone" id="input-phone" class="form-control form-control-alternative{{ $errors->has('phone') ? ' is-invalid' : '' }}" placeholder="{{ __('phone') }}" value="{{ old('phone', $user->phone) }}" required autofocus>
                                    @include('alerts.feedback', ['field' => 'phone'])
                                </div>
                                <div class="form-group{{ $errors->has('Wilaya') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Wilaya') }}</label>
                                    <input type="text" name="Wilaya" id="input-wilaya" class="form-control form-control-alternative{{ $errors->has('Wilaya') ? ' is-invalid' : '' }}" placeholder="{{ __('Wilaya') }}" value="{{ old('Wilaya', $user->Wilaya) }}" required autofocus>
                                    @include('alerts.feedback', ['field' => 'Wilaya'])
                                </div>
                                <div class="form-check">
                                    <label class="form-control-label" for="input-password-confirmation">{{ __('Give rights') }}</label>
                                        @foreach($roles as $role)
                                            <label for="{{ $role -> id}}" class="form-check-label ml-2"> {{$role -> name}}
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
                                <script>
                                    $(document).ready(function(){
                                        $("#TypeOfConstruction").on("change", function(e){
                                            var v = $(this).val();
                                            if(v == 'Salari??') {
                                                $("#salarie").slideDown();
                                            } else {
                                                $("#salarie").slideUp();
                                            }
                                        });
                                    });
                                </script>
                                <script>
                                    $(document).ready(function(){
                                        $("#TypeOfConstruction").on("change", function(e){
                                            var v = $(this).val();
                                            if(v == 'D??put??') {
                                                $("#depute").slideDown();
                                            } else {
                                                $("#depute").slideUp();
                                            }
                                        });
                                    });
                                </script>


                           <!--     <script type="text/javascript">
                                    $(document).ready(function(){
                                        $("#TypeOfConstruction").on('change',function(){
                                            var selectedBalue = $("#TypeOfConstruction").val();
                                            if (selectedBalue == "Salari??")
                                            {
                                                $(".wfiedls").slideDown(500);
                                                $(".dfiedls").slideUp(500);
                                            }
                                            else if(selectedBalue == "D??put??"){
                                                $(".dfiedls").slideDown(500);
                                                $(".wfiedls").slideUp(500);
                                            }
                                        });
                                    });
                                </script> -->


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
