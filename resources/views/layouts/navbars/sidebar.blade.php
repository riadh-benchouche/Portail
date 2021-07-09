<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
                <div class=" col-md-10 mr-auto ml-auto mt-2 mb-2">
                    <a href="{{ route('home') }}">
                    <img src="{{ asset('black') }}/img/logo-apn2.png" alt="logo"  >
                    </a>
                </div>
        </div>
        <ul class="nav">
            <li @if ($pageSlug ?? '' == 'dashboard') class="active " @endif>
                <a href="{{ route('home') }}">
                    <i class="tim-icons icon-components"></i>
                    <p class="font-weight-bold">{{ __('Accueil') }}</p>
                </a>
            </li>
        <!--
            <li>
                <a data-toggle="collapse" href="#laravel-examples" >
                    <i class="fab fa-laravel" ></i>
                    <span class="nav-link-text" >{{ __('Gestion utilisateurs') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse show" id="laravel-examples">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug ?? '' == 'profile') class="active " @endif>
                            <a href="{{ route('profile.edit')  }}">
                                <i class="tim-icons icon-single-02"></i>
                                <p>{{ __('User Profile') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug ?? '' == 'users') class="active " @endif>
                            <a href="{{ route('user.index')  }}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>{{ __('User Management') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
             //-->
            <li @if ($pageSlug ?? '' == 'icons') class="active " @endif>
                <a data-toggle="collapse" href="#administration" aria-expanded="true">
                    <i class="tim-icons icon-istanbul" ></i>
                    <span class="nav-link-text font-weight-bold" >{{ __('Administration') }}</span>
                    <b class="caret mt-1"></b>
                </a>
                <div class="collapse" id="administration">
                    <ul class="nav pl-2">
                      <!--  <li >
                            <a href="{{ route('user.index')  }}">
                                <i class="tim-icons icon-badge"></i>
                                <p class="font-weight-bold">{{ __('Annuaire Député') }}</p>
                            </a>
                        </li> -->
                          <li >
                              <a data-toggle="collapse" href="#Notes" aria-expanded="true">
                                  <i class="tim-icons icon-single-copy-04" ></i>
                                  <span class="text-white font-weight-bold" >{{ __('Notes & Documents') }}</span>
                                  <b class="caret mt-1"></b>
                              </a>
                              <div class="collapse" id="Notes">
                                  <ul class="nav pl-2">
                                      <li >
                                          <a href="{{ route('annonce.index') }}">
                                              <i class="tim-icons icon-notes"></i>
                                              <p class="font-weight-bold" >{{ __('Notes') }}</p>
                                          </a>
                                      </li>
                                      <li >
                                          <a href="{{ route('rh.index') }}">
                                              <i class="tim-icons icon-paper"></i>
                                              <p class="font-weight-bold" >{{ __('Documents') }}</p>
                                          </a>
                                      </li>
                                  </ul>
                              </div>
                          </li>
                        <li >
                            <a href="{{ route('actualite.index') }}">
                                <i class="tim-icons icon-planet"></i>
                                <p class="font-weight-bold">{{ __('Actualités') }}</p>
                            </a>
                        </li>
                        <li >
                              <a href="{{ url('fonc') }}">
                                  <i class="tim-icons icon-badge"></i>
                                  <p class="font-weight-bold">{{ __('Annuaire Personnel') }}</p>
                              </a>
                        </li>
                        <li >
                              <a href="{{url('bibu')}}">
                                  <i class="tim-icons icon-vector"></i>
                                  <p class="font-weight-bold">{{ __('Organigramme') }}</p>
                              </a>
                        </li>
                          <li >
                              <a href="{{ url('department') }}">
                                  <i class="tim-icons icon-pin"></i>
                                  <p class="font-weight-bold">{{ __('Direction') }}</p>
                              </a>
                          </li>
                    </ul>
                </div>
            </li>
            <li @if ($pageSlug ?? '' == 'icons') class="active " @endif>
                <a data-toggle="collapse" href="#Législation" aria-expanded="true">
                    <i class="tim-icons icon-bank" ></i>
                    <span class="nav-link-text font-weight-bold" >{{ __('Législation') }}</span>
                    <b class="caret mt-1"></b>
                </a>
                <div class="collapse" id="Législation">
                    <ul class="nav pl-2">

                        <li >
                            <a href="mms://live.apn.gov.dz:8044">
                                <i class="tim-icons icon-triangle-right-17"></i>
                                <p class="font-weight-bold" >{{ __('En direct') }}</p>
                            </a>
                        </li>
                        <li >
                            <a href="{{ route('travaux.index') }}">
                                <i class="tim-icons icon-molecule-40"></i>
                                <p class="font-weight-bold" >{{ __('Actualités législatives') }}</p>
                            </a>
                        </li>
                        <li >
                            <a href="{{ route('user.index')  }}">
                                <i class="tim-icons icon-badge"></i>
                                <p class="font-weight-bold">{{ __('Annuaire Député') }}</p>
                            </a>
                        </li>
                        <li >
                            <a href="{{ url('icons')  }}">
                                <i class="tim-icons icon-calendar-60"></i>
                                <p class="font-weight-bold">{{ __('Planning') }}</p>
                            </a>
                        </li>
                        <li >
                            <a href="{{url('commission')}}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p class="font-weight-bold">{{ __('Commission') }}</p>
                            </a>
                        </li>
                        <li >
                            <a data-toggle="collapse" href="#laravel-examples" aria-expanded="true">
                                <i class="tim-icons icon-map-big" ></i>
                                <span class="text-white font-weight-bold" >{{ __('Gestion des lois') }}</span>
                            </a>

                            <div class="collapse" id="laravel-examples">
                                <ul class="nav pl-4">
                                    <li >
                                        <a href="{{ route('lois.index')  }}">
                                            <i class="tim-icons icon-refresh-01"></i>
                                            <p>{{ __('En cours') }}</p>
                                        </a>
                                    </li>
                                    <li  >
                                        <a href="{{ route('loist.index')  }}">
                                            <i class="tim-icons icon-link-72"></i>
                                            <p>{{ __('Abordé') }}</p>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </li>
            <li @if ($pageSlug ?? '' == 'icons') class="active " @endif>
                <a data-toggle="collapse" href="#Mediathéque" aria-expanded="true">
                    <i class="tim-icons icon-camera-18" ></i>
                    <span class="nav-link-text font-weight-bold" >Mediathéques</span>
                    <b class="caret mt-1"></b>
                </a>
                <div class="collapse" id="Mediathéque">
                    <ul class="nav pl-2">
                        <li>
                            <a href="{{ url('Image') }}">
                                <i class="tim-icons icon-image-02"></i>
                                <p>{{ __('Galerie Images')}}</p>
                            </a>
                        </li>
                        <li  >
                            <a href="{{ url('Video') }}">
                                <i class="tim-icons icon-video-66"></i>
                                <p>{{ __('Galerie de Videos') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li @if ($pageSlug ?? '' == 'icons') class="active " @endif>
                <a data-toggle="collapse" href="#info" aria-expanded="true">
                    <i class="tim-icons icon-laptop" ></i>
                    <span class="nav-link-text font-weight-bold" >Direction informatique</span>
                    <b class="caret mt-1"></b>
                </a>
                <div class="collapse" id="info">
                    <ul class="nav pl-2">
                        <li>
                            <a href="{{url('maps')}}">
                                <i class="tim-icons icon-world"></i>
                                <p>{{ __('Présentation')}}</p>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="tim-icons icon-settings"></i>
                                <p>{{ __('Trucs & astuces')}}</p>
                            </a>
                        </li>
                        <li  >
                            <a href="{{url('notifications')}}">
                                <i class="tim-icons icon-tap-02"></i>
                                <p>{{ __('Application') }}</p>
                            </a>
                        </li>
                        <li  >
                            <a href="{{url('contact')}}">
                                <i class="tim-icons icon-settings-gear-63"></i>
                                <p>{{ __('Aide et assistance ') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>
