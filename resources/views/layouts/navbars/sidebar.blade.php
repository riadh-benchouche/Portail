<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
                <div class=" col-md-10 mr-auto ml-auto mt-2 mb-2">
                    <a href="{{ route('home') }}">
                    <img src="{{ asset('black') }}/img/logo-apn2.png" alt=""  >
                    </a>
                </div>
        </div>
        <ul class="nav">
            <li @if ($pageSlug ?? '' == 'dashboard') class="active " @endif>
                <a href="{{ route('home') }}">
                    <i class="tim-icons icon-components"></i>
                    <p>{{ __('Accueil') }}</p>
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
            <li @if ($pageSlug ?? '' == 'users') class="active " @endif>
                <a href="{{ route('user.index')  }}">
                    <i class="tim-icons icon-badge"></i>
                    <p>{{ __('Annuaire') }}</p>
                </a>
            </li>

            <li>
                <a data-toggle="collapse" href="#laravel-examples" aria-expanded="true">
                    <i class="fab fa-laravel" ></i>
                    <span class="nav-link-text" >{{ __('Gestion des lois') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse" id="laravel-examples">
                    <ul class="nav pl-4">
                        <li >
                            <a href="{{ route('lois.index')  }}">
                                <i class="tim-icons icon-badge"></i>
                                <p>{{ __('En cours') }}</p>
                            </a>
                        </li>
                        <li  >
                            <a href="{{ route('loist.index')  }}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>{{ __('Abordé') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li >
                <a href="{{ url('commission')  }}">
                    <i class="tim-icons icon-bank "></i>
                    <p>{{ __('Commision') }}</p>
                </a>
            </li>

            <li >
                <a href="{{ route('annonce.index')  }}">
                    <i class="tim-icons icon-badge"></i>
                    <p>{{ __('Annonces et circulaire') }}</p>
                </a>
            </li>
            <li @if ($pageSlug ?? '' == 'icons') class="active " @endif>
                <a href="{{ route('pages.icons') }}">
                    <i class="tim-icons icon-calendar-60"></i>
                    <p>{{ __('Calendrier') }}</p>
                </a>
            </li>
            <li @if ($pageSlug ?? '' == 'maps') class="active " @endif>
                <a href="{{ route('pages.maps') }}">
                    <i class="tim-icons icon-email-85"></i>
                    <p>{{ __('Messagerie') }}</p>
                </a>
            </li>
            <li @if ($pageSlug ?? '' == 'notifications') class="active " @endif>
                <a href="{{ route('pages.notifications') }}">
                    <i class="tim-icons icon-single-copy-04"></i>
                    <p>{{ __('Gestion des lois') }}</p>
                </a>
            </li>
            <li @if ($pageSlug ?? '' == 'tables') class="active " @endif>
                <a href="{{ url('rh') }}">
                    <i class="tim-icons icon-single-02"></i>
                    <p>{{ __('Ressources humaines') }}</p>
                </a>
            </li>
            <li @if ($pageSlug ?? '' == 'typography') class="active " @endif>
                <a href="{{ route('bibu.index') }}">
                    <i class="tim-icons icon-laptop"></i>
                    <p>{{ __('Bibliotheque Universel') }}</p>
                </a>
            </li>
             <li @if ($pageSlug ?? '' == 'typography') class="active " @endif>
                <a href="{{ route('actualite.index') }}">
                    <i class="tim-icons icon-paper"></i>
                    <p>{{ __('Actualite') }}</p>
                </a>
            </li>
        </ul>
    </div>
</div>
