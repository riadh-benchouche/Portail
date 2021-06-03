@extends('layouts.app', ['page' => __('Icons'), 'pageSlug' => 'icons'])
@section('content')

<div class="container">
    <div calss="row">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div calss="col-md-8 col-md-offset-2">
            <div class="card">
            <div calss="panel panel-default m-3">
                <div class="card-body">
                    <h1> Ajouter un évènement </h1>
                    <form method="POST" action="{{ url('fullcalender') }}"  enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <label for=""> Entrer le titre de l'évènement  </label>
                        <input class="form-control" type="text" name="title" placeholder="Enter The Name"/>
                        <label for=""> Entrer la categorie</label>
                        @foreach($catergorys as $category)

                            <div class="form-check form-check-radio form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="category" id="{{$category->id}}" value="{{$category->id}}"> {{$category->name}}
                                    <span class="form-check-sign"></span>
                                </label>
                                <input type="color" value="{{$category->color}}" disabled>
                            </div>


                        @endforeach
                        <div class="form-group mt-3" >
                        <label for="input-contenu"> Entrer la description </label>
                        <textarea class="form-control" name="description" id="input-contenu" rows="3" required autofocus></textarea>
                        </div>
                        <label for=""> Entrer la date de début </label>
                        <input class="form-control " type="datetime-local" id="startdate" name="start_date" class="date" placeholder="Enter Start Date"/>
                        <label for=""> Entrer la date de fin </label>
                        <input class="form-control" id="enddate" type="datetime-local" name="end_date"  class="date" placeholder="Enter End Date"/>
                        <a href="{{url('fullcalender')}}" class="btn btn-sm btn-secondary"> Back </a>
                        <input type="submit" name="submit" class="btn btn-sm btn-info" value="Ajouter l'évènement"/>
                    </form>
                    <script type="text/javascript">
                        $('#startdate').datetimepicker
                        ({
                            autoclose: true,
                            format: 'yyyy-mm-dd hh:ii'
                        });
                        $('#enddate').datetimepicker
                        ({
                            autoclose: true,
                            format: 'yyyy-mm-dd hh:ii'
                        });
                    </script>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection
