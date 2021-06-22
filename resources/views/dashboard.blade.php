@extends('layouts.app', ['pageSlug' => 'dashboard'])

@section('content')
    <div class="row ">
        <!--Carousel Wrapper-->
        <div id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel">
            <!--Indicators-->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-2" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-2" data-slide-to="1"></li>
            </ol>
            <!--/.Indicators-->
            <!--Slides-->
            <div class="carousel-inner" role="listbox">
           <!--    <div class="carousel-item ">
                    <div class="view">
                        <video class="video-fluid z-depth-1" autoplay loop controls muted>
                            <source src="{{asset('black/img/video.mp4')}}" type="video/mp4" />
                        </video>
                        <div class="mask rgba-black-light"></div>
                    </div>

                </div> -->
                <div class="carousel-item active">
                    <!--Mask color-->
                    <div class="view">
                        <img class="d-block w-100" src="{{asset('black/img/chahid.jpg')}}"
                             alt="Second slide">
                        <div class="mask rgba-black-strong"></div>
                    </div>
                    <div class="carousel-caption ">
                        <h1 class="h1 ml-auto mr-auto text-white w-100 animated fadeInDown  " style="    font-family: 'Kaushan Script', cursive;"  ><b>Bienvenue a l’intranet</b> </h1>
                        <h2 class="h2 ml-auto mr-auto text-white w-75 animated fadeInDown " style="    font-family: 'Comfortaa', cursive;">Espace colaboratif pour les Parlementaire et Fonctionnaire de l’Assemblée Populaire Nationale</h2>
                        <div class="row ml-auto mr-auto">
                            <div class="col-12 text-center animated carousel-fade" style="padding: 90px ">
                                <button class="gbutton noselect"><b>Mediathque</b></button>
                                <button class="gbutton noselect"><b>JOD</b></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/.Slides-->
            <!--Controls-->
            <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
            <!--/.Controls-->
        </div>
        <!--/.Carousel Wrapper-->
    </div>

    <div class="row animated fadeInDown">
                    <div class="row mt-3">
                            <div class="col-md-6 " >
                                <div class="row text-center">
                                    <h1 class="h4  mt-3 ml-auto mr-auto text-info "><b>Actualité – Ressources Humaines et Affaires Sociales</b></h1>
                                </div>
                                <div class="row-fluid">
                                    <div id="productSlider1" class="carousel slide" data-ride="carousel">
                                        <div class="carousel-inner  mr-auto ml-auto w-100">
                                            @foreach($annonces->chunk(2) as $productCollections)
                                                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                                    <div class="row ">
                                                        @foreach($productCollections as $product)
                                                            <div class="col-md-6">
                                                                <div class="card "  >
                                                                    <iframe style="height:29em " class="img-fluid"  src="{{ asset('storage').'/'.$product ->getFirstMedia()['id'].'/'.$product ->getFirstMedia()['file_name']}}" alt="{{ $product->name }}"></iframe>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div>
                                            <a class="carousel-control-prev pr-md-5 " href="#productSlider1" role="button" data-slide="prev" >
                                                <span class="carousel-control-prev-icon text-dark hover:bg-pink-500" aria-hidden="true"></span>
                                                <span class="sr-only text-dark ">Previous</span>
                                            </a>
                                            <a class="carousel-control-next pl-md-5 text-dark" href="#productSlider1" role="button" data-slide="next">
                                                <span class="carousel-control-next-icon hover:bg-pink-500" aria-hidden="true"></span>
                                                <span class="sr-only text-dark">Next</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mt-2  " >
                                <div class="card p-2" style="background-image: url('{{asset('black/img/bg3.jpg')}}')">
                                <div class="row ml-auto mr-auto">
                                    <div class="col-12">
                                        <div class="row ml-auto mr-auto">
                                            <h1 class="ml-auto mr-auto  text-info h4 "><b>Formulaire à Télécharger</b></h1>
                                        </div>
                                        <div class="row  mb-3 ml-auto mr-auto">
                                            @foreach($rhs as $rh)
                                                <div class="col-md-3 text-center ">
                                                    <div class="file-img-box">
                                                        <iframe style="height:10em " class="img-fluid"  src="{{ asset('storage').'/'.$rh ->getFirstMedia()['id'].'/'.$rh ->getFirstMedia()['file_name']}}" alt="{{ $rh->name }}"></iframe>
                                                    </div>
                                                    <a href="#" class="file-download text-center"><i class="fa fa-download text-center"></i></a>
                                                    <div class="file-man-title">
                                                        <h5 class="mb-0 text-overflow text-center">{{substr($rh->getFirstMedia()['file_name'],0,10)}}</h5>
                                                        <p class="mb-0 text-center"><small>{{$rh->getFirstMedia()['human_readable_size']}}</small></p>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <!-- end col -->
                                </div>
                                </div>
                                <!-- end row -->
                            </div>


                    </div>

    </div>

    <div class="row">
            <div class="col-12 " >
                    <div class="row-fluid">
                    <div class="row">
                        <h1 class="h4 text-info text-center ml-auto mr-auto mt-2" ><b>Travaux des Commissions</b></h1>
                    </div>
                    <div id="productSlider" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            @foreach($actualites->chunk(4) as $productCollections)
                                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                    <div class="row ">
                                        @foreach($productCollections as $product)
                                            <div class="col-md-3">
                                                <div class="card" style="height: 28em" >
                                                    <img class="img-fluid"  src="{{ asset('storage').'/'.$product ->getFirstMedia()['id'].'/'.$product ->getFirstMedia()['file_name']}}" alt="{{ $product->name }}">
                                                        <div class="card-body text-center ">
                                                            <h4 class="card-title text-white " ><b>{{substr($product ->title,0,25)}}...</b></h4>
                                                            <p class="card-text">{{substr($product ->contenu,0,200)}}</p>
                                                        </div>
                                                        <div class="card-footer text-center">
                                                            <a href="{{url('actualite/'.$product->id)}}" class="btn btn-sm btn-info mt-auto mb-auto animation-on-hover">Lire la suite</a>
                                                        </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <div class="container-lg">
        <div class="card" style="background-image: url('{{asset('black/img/bg3.jpg')}}');   background-position: revert ;background-size: cover;">
        <div class="row mb-2 " style="z-index: 2">
            <div class="col-5 ml-auto mr-auto  ">
                        <div class="my-3">
                            <h1 class="h4 text-info" ><b>Activité Legislative 9ème Législation</b></h1>
                        </div>
                        <div class="card p-3 mt-auto mb-auto mt-3 " style="background-color: #1D283F; opacity: 0.9">
                            <div class="row ">
                                <div class="col-6 text-center ">
                                    <img class="ml-auto mr-auto icon mt-2" src="{{asset('black/img/calendar.svg')}}" alt="event" width="40%"  >
                                    <p class="text-center my-2  ">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s </p>
                                    <a class="btn btn-sm btn-warning text-center mt-2 text-white">Planning</a>
                                </div>
                                <div class="col-6 text-center">
                                    <img class="ml-auto mr-auto icon mt-2 " src="{{asset('black/img/news.svg')}}" alt="event" width="40%"  >
                                    <p class="text-center my-2 ">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s </p>
                                    <a class="btn btn-sm btn-danger text-center mt-2 text-white">Actualités</a>
                                </div>
                            </div>
                        </div>
                            <div class="card mt-3 p-1" style="background-color: transparent; " >
                                <div class="row ">
                                    <div class="col-md-12" >
                                        <div class="card-body ">
                                            <h1 class="  h1 text-center" style="color: #d6d8db;  "><b>Annuaire</b></h1>
                                            <div class="row text-center" >
                                                <div class="col-sm-6 text-center">
                                                    <a class="btn btn-sm btn-info text-center mt-2 text-white">Député</a>
                                                </div>
                                                <div class="col-sm-6">
                                                    <a class="btn btn-sm btn-success text-center mt-2 text-white">Personnel</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                    </div>
            <div class="col-6 ml-auto mr-auto">
                <div class="my-3">
                    <h1 class="h4 text-info" ><b>Activité Legislative 9ème Législation</b></h1>
                </div>
                @foreach($events as $event)
                    <div class="row">
                        <div class="card mb-3" style="background-color: #1D293F; z-index: 0; opacity: 0.9"  >
                            <div class="row ">
                                <div class="col-md-4 justify-content-center" >
                                    <img src="{{asset('black/img/clock.png')}}"  alt="event" width="50%" class="ml-auto mr-auto mt-2 ">
                                    <p class="card-text text-info text-center mt-1">{{$event->start_date}}</p>
                                    <p class="card-text  text-center " style="color: #ed5374">{{$event->end_date}}</p>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title h4" style="color: {{$event->categories->color}}">{{$event->categories->name}}</h5>
                                        <p class="card-text">{{substr($event->description,0,100)}}...</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
</div>
    </div>
        <!-- En direct -->
    <div class="row">

        <div class="col-md-6 ">
            <img src="{{asset('black/img/test1.png')}}" width="80%" class="ml-auto mr-auto ">
        </div>
        <div class="col-md-6 mt-2">
            <div class="card   ">
                 <embed width="100%" height="350" type="application/x-vlc-plugin" pluginspage="https://add0n.com/open-in-vlc.html" autoplay="yes" loop="no" width="300" height="200" target="mms://live.apn.gov.dz:8044" />
            </div>
         <!--   <div class="row">
                <a class="btn btn-warning btn-lg ml-4 animation-on-hover " style="width: 92% ; background-image: linear-gradient(#A03B8D,#E14C93)">
                    <div class="row">
                        <div class="col-md-2">
                            <i class="tim-icons icon-attach-87 text-white " style="font-size: 20px;"></i>
                        </div>
                        <div class="col-md-8">
                            <h1 class="text-white mt-1" >Diffusion en Direct</h1>
                        </div>
                        <div class="col-md-2">
                            <i class="tim-icons icon-minimal-right text-white" style="font-size: 20px"></i>
                        </div>
                    </div>
                </a>
            </div> -->
        </div>

    </div>
        <!-- Bouttons -->
        <!-- lois + stat -->
    <div class="row mb-3">
        <div class="card " style="background-image: url('{{asset('black/img/bg2.jpg')}}')" >
            <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <h1 class="h4  ml-auto mr-auto mt-3 text-info"><b>Lois Abordés</b></h1>
                </div>
                <div class="container-fluid">
                <table class="table table-striped table-dark p-2">
                    <thead >
                    <tr>
                        <th class="text-center ">#</th>
                        <th >Nom</th>
                        <th>Date D'adoption</th>
                        <th>Comission</th>
                        <th class="text-right">Détail</th>
                    </tr>
                    </thead>
                    <tbody >
                    @foreach($lois as $loi)
                    <tr class="text-darker">
                        <td class="text-center">{{$loi->id}}</td>
                        <td >{{substr($loi->name,0,20)}}...</td>
                        <td>{{$loi->DtAdoptAPN}}</td>
                        <td>{{$loi->comissions->name}}</td>
                        <td class="td-actions text-right">
                            <button type="button" rel="tooltip" class="btn btn-success btn-sm btn-round btn-icon">
                                <i class="tim-icons icon-cloud-download-93"></i>
                            </button>
                            <button type="button" rel="tooltip" class="btn btn-info btn-sm btn-round btn-icon">
                                <i class="tim-icons icon-single-copy-04"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                </div>
            </div>

            <div class="col-md-6">
                <div class="container-fluid">
                <div class="row">
                    <h1 class="h4 ml-auto mr-auto mt-3 text-info"><b>Statistiques Pertinantes  </b></h1>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6" >
                        <div class="card card-stats mb-4 mb-xl-0 " style="  background: linear-gradient(to bottom right,#59C9B7, #3795C4); opacity: 0.8" >
                            <div class="card-body">
                                <div class="row">
                                    <div class="col ml-3">
                                        <h5 class="card-title text-white text-uppercase mb-0 mt-2" >députés </h5>
                                    </div>
                                    <div class="col-auto ">
                                        <div class="icon icon-shape  text-white rounded-circle shadow display-3 p-2">
                                            <span id="value" class="h2 text-white font-weight-bold mb-0"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card card-stats mb-4 mb-xl-0" style="background: linear-gradient(to bottom right,#F07556, #EC599C); opacity: 0.8 ">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col ml-3">
                                        <h5 class="card-title text-white text-uppercase mb-0 mt-2">Personnel</h5>
                                    </div>
                                    <div class="col-auto ">
                                        <div class="icon icon-shape  text-white rounded-circle shadow display-3 p-2">
                                            <span id="value2" class="h2 text-white font-weight-bold mb-0"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <div class="card card-stats mb-4 mb-xl-0" style="background: linear-gradient(to bottom right,#c347d6, #ef61d2) ">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col ml-3">
                                        <h5 class="card-title text-white text-uppercase  mb-0">Groupes parlementaires</h5>
                                    </div>
                                    <div class="col-auto ">
                                        <div class="icon icon-shape  text-white rounded-circle shadow display-3 p-2">
                                            <span id="value3" class="h2  text-white font-weight-bold mb-0 "></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card card-stats mb-4 mb-xl-0" style="background: linear-gradient(to bottom right,#2D75C1, #7E65E7)">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col ml-3">
                                        <h5 class="card-title text-white text-uppercase text-white mb-0">Lois Adoptées 9ème Législation</h5>
                                    </div>
                                    <div class="col-auto ">
                                        <div class="icon icon-shape  text-white rounded-circle shadow display-3 p-2">
                                            <span id="value4" class="h2 text-white font-weight-bold mb-0"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <div class="card card-stats mb-4 mb-xl-0" style="background: linear-gradient(to bottom right,#ffcd6a, #dd8c00)">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col ml-3">
                                        <h5 class="card-title text-white text-uppercase text-white mb-0">Session plénières 9ème législation</h5>
                                        <span id="value4" class="h2 text-white font-weight-bold mb-0"></span>
                                    </div>
                                    <div class="col-auto ">
                                        <div class="icon icon-shape  text-white rounded-circle shadow display-3 p-2">
                                            <span id="value5" class="h2 text-white font-weight-bold mb-0">75</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 ">
                        <div class="card card-stats mb-4 mb-xl-0" style="background: linear-gradient(to bottom right,#007bff, #6ea0ff)">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col ml-3">
                                        <h5 class="card-title text-white text-uppercase h5 text-white mb-0">Journée Parlementaires 9ème Législation</h5>
                                    </div>
                                    <div class="col-auto ">
                                        <div class="icon icon-shape  text-white rounded-circle shadow display-3 p-2">
                                            <span id="value6" class="h2 text-white font-weight-bold mb-0">68</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>


@endsection

@push('js')
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.5.1/moment.min.js"></script>
    <script src="{{ asset('black') }}/js/plugins/chartjs.min.js"></script>
    <script>function animateValue(obj, start, end, duration) {
            let startTimestamp = null;
            const step = (timestamp) => {
                if (!startTimestamp) startTimestamp = timestamp;
                const progress = Math.min((timestamp - startTimestamp) / duration, 1);
                obj.innerHTML = Math.floor(progress * (end - start) + start);
                if (progress < 1) {
                    window.requestAnimationFrame(step);
                }
            };
            window.requestAnimationFrame(step);
        }

        const obj = document.getElementById("value");
        const obj1 = document.getElementById("value2");
        const obj2 = document.getElementById("value3");
        const obj3 = document.getElementById("value4");
        animateValue(obj, 0,100, 3000);
        animateValue(obj1, 0,{{$actualites->count()}}, 1000);
        animateValue(obj2, 0, {{$rhs->count()}}, 1000);
        animateValue(obj3, 0, {{$rhs->count()}}, 1000);
    </script>

    <script>
        var player = videojs('Video');
        player.play();
    </script>


    @endpush
