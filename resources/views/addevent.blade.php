<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Black Dashboard') }}</title>
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('black') }}/img/apple-icon.png">
    <link rel="icon" type="image/png" href="{{ asset('black') }}/img/favicon.png">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <!-- Icons -->
    <link href="{{ asset('black') }}/css/nucleo-icons.css" rel="stylesheet" />
    <!-- CSS -->
    <link href="{{ asset('black') }}/css/black-dashboard.css?v=1.0.0" rel="stylesheet" />
    <link href="{{ asset('black') }}/css/theme.css" rel="stylesheet" />
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' /></head>
<body class="{{ $class ?? '' }}">
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
                    <h1> Task : Add Data </h1>
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
</body>
</html>
