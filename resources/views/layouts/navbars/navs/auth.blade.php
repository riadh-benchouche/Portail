<nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent">
    <div class="container-fluid">
        <div class="navbar-wrapper d-none">
            <div class="navbar-toggle d-inline">
                <button type="button" class="navbar-toggler">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </button>
            </div>
            <a class="navbar-brand" href="#">{{ $page ?? __('Dashboard') }}</a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
        </button>
        <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav ml-auto">
                <li class="search-bar input-group">
                    <button class="btn btn-link" id="search-button" data-toggle="modal" data-target="#searchModal">
                        <i class="tim-icons icon-zoom-split"></i>
                        <span class="d-lg-none d-md-block">{{ __('Search') }}</span>
                    </button>
                </li>

                <li class="dropdown nav-item">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <div class="notification d-none d-lg-block d-xl-block"></div>
                        <i class="tim-icons icon-sound-wave"></i>
                        <p class="d-lg-none"> {{ __('Notifications') }} </p>
                    </a>
                    @unless(auth()->user()->unreadNotifications->isEmpty())
                    <ul class="dropdown-menu dropdown-menu-right dropdown-navbar">
                        @foreach(auth()->user()->unreadNotifications as $notification)
                            @if($notification->type == "App\Notifications\TeAAjouter")
                                <li class="nav-link">
                                    <a  href="{{url('TestEtAstuce/'.$notification->data['TeAId'])}}" class="nav-item dropdown-item text-dark">Nouvelle astuces:<u>{{substr($notification->data['TeAName'],0,15)}}</u>, Ajouter aux trucs et astuces</a>
                                </li>
                            @endif
                           @if($notification->type == "App\Notifications\ajouter")
                        <li class="nav-link">
                            <a  href="{{url('rh')}}" class="nav-item dropdown-item text-dark">Nouveau document:<u>{{substr($notification->data['rhName'],0,15)}}</u>, Ajouter aux Ressource humaines</a>
                        </li>
                            @endif
                        @if($notification->type == "App\Notifications\AnnonceAjouter")
                            <li class="nav-link">
                                <a  href="{{url('annonce/'.$notification->data['AnnonceId'])}}"   class="nav-item dropdown-item text-dark">Nouvelle Annonce: <u> {{substr($notification->data['AnnonceName'],0,15)}}</u>, Ajouter aux annonces</a>
                            </li>
                        @endif
                        @if($notification->type == "App\Notifications\ActualiteAjouter")
                            <li class="nav-link">
                                 <a  href="{{url('actualite/'.$notification->data['ActualiteId'])}}"   class="nav-item dropdown-item text-dark">Nouvelle Actualite:  <u>{{substr($notification->data['ActualiteName'],0,15)}}</u>, Ajouter aux Actualites</a>
                            </li>
                        @endif
                        @endforeach
                    </ul>
                    @endunless
                </li>

                <li class="dropdown nav-item">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <div class="photo">
                            <img src="{{ asset('black') }}/img/anime3.png" alt="{{ __('Profile Photo') }}">
                        </div>
                        <b class="caret d-none d-lg-block d-xl-block"></b>
                        <p class="d-lg-none">{{ __('Log out') }}</p>
                    </a>
                    <ul class="dropdown-menu dropdown-navbar">
                        <li class="nav-link">
                            <a href="{{ route('profile.edit') }}" class="nav-item dropdown-item">{{ __('Profile') }}</a>
                        </li>
                        <li class="nav-link">
                            <a href="#" class="nav-item dropdown-item">{{ __('Settings') }}</a>
                        </li>
                        <li class="dropdown-divider"></li>
                        <li class="nav-link">
                            <a href="{{ route('logout') }}" class="nav-item dropdown-item" onclick="event.preventDefault();  document.getElementById('logout-form').submit();">{{ __('Log out') }}</a>
                        </li>
                    </ul>
                </li>
                <li class="separator d-lg-none"></li>
            </ul>
        </div>
    </div>
</nav>
<div class="modal modal-search fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="{{ __('SEARCH') }}">
                <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('Close') }}">
                    <i class="tim-icons icon-simple-remove"></i>
              </button>
            </div>
        </div>
    </div>
</div>
