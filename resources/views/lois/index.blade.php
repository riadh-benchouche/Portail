@extends('layouts.app', ['page' => __('Manage Users'), 'pageSlug' => 'Users'])

<style>

    /* ===========
       Profile
     =============*/
    .card-box {
        padding: 20px;
        box-shadow: 0 2px 15px 0 rgba(0, 0, 0, 0.06), 0 2px 0 0 rgba(0, 0, 0, 0.02);
        -webkit-border-radius: 5px;
        border-radius: 5px;
        -moz-border-radius: 5px;
        background-clip: padding-box;
        margin-bottom: 20px;
        background-color: transparent;
    }
    .header-title {
        text-transform: uppercase;
        font-size: 15px;
        font-weight: 600;
        letter-spacing: 0.04em;
        line-height: 16px;
        margin-bottom: 8px;
    }
    .social-links li a {
        -webkit-border-radius: 50%;
        background: #EFF0F4;
        border-radius: 50%;
        color: #7A7676;
        display: inline-block;
        height: 30px;
        line-height: 30px;
        text-align: center;
        width: 30px;
    }

    /* ===========
       Gallery
     =============*/
    .portfolioFilter a {
        -moz-box-shadow: 0px 1px 2px 0px rgba(0, 0, 0, 0.1);
        -moz-transition: all 0.3s ease-out;
        -ms-transition: all 0.3s ease-out;
        -o-transition: all 0.3s ease-out;
        -webkit-box-shadow: 0px 1px 2px 0px rgba(0, 0, 0, 0.1);
        -webkit-transition: all 0.3s ease-out;
        box-shadow: 0px 1px 2px 0px rgba(0, 0, 0, 0.1);
        color: #333333;
        padding: 5px 10px;
        display: inline-block;
        transition: all 0.3s ease-out;
    }
    .portfolioFilter a:hover {
        background-color: #228bdf;
        color: transparent;
    }
    .portfolioFilter a.current {
        background-color: #228bdf;
        color: transparent;
    }
    .thumb {
        background-color: transparent;
        border-radius: 3px;
        box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.1);
        margin-top: 30px;
        padding-bottom: 10px;
        padding-left: 10px;
        padding-right: 10px;
        padding-top: 10px;
        width: 100%;
    }
    .thumb-img {
        border-radius: 2px;
        overflow: hidden;
        width: 100%;
    }
    .gal-detail h4 {
        margin: 16px auto 10px auto;
        width: 80%;
        white-space: nowrap;
        display: block;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .gal-detail .ga-border {
        height: 3px;
        width: 40px;
        background-color: #228bdf;
        margin: 10px auto;
    }




    .tabs-vertical-env .tab-content {
        background: transparent;
        display: table-cell;
        margin-bottom: 30px;
        padding: 30px;
        vertical-align: top;
    }
    .tabs-vertical-env .nav.tabs-vertical {
        display: table-cell;
        min-width: 120px;
        vertical-align: top;
        width: 150px;
    }
    .tabs-vertical-env .nav.tabs-vertical li.active > a {
        background-color: transparent;
        border: 0;
    }
    .tabs-vertical-env .nav.tabs-vertical li > a {
        color: #333333;
        text-align: center;
        font-family: 'Roboto', sans-serif;
        font-weight: 500;
        white-space: nowrap;
    }
    .nav.nav-tabs > li.active > a {
        background-color: transparent;
        border: 0;
    }
    .nav.nav-tabs > li > a {
        background-color: transparent;
        border-radius: 0;
        border: none;
        color: #333333 !important;
        cursor: pointer;
        line-height: 50px;
        font-weight: 500;
        padding-left: 20px;
        padding-right: 20px;
        font-family: 'Roboto', sans-serif;
    }
    .nav.nav-tabs > li > a:hover {
        color: #228bdf !important;
    }
    .nav.tabs-vertical > li > a {
        background-color: transparent;
        border-radius: 0;
        border: none;
        color: #333333 !important;
        cursor: pointer;
        line-height: 50px;
        padding-left: 20px;
        padding-right: 20px;
    }
    .nav.tabs-vertical > li > a:hover {
        color: #228bdf !important;
    }
    .tab-content {
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
        color: #777777;
    }
    .nav.nav-tabs > li:last-of-type a {
        margin-right: 0px;
    }
    .nav.nav-tabs {
        border-bottom: 0;
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
    }
    .navtab-custom li {
        margin-bottom: -2px;
    }
    .navtab-custom li a {
        border-top: 2px solid transparent !important;
    }
    .navtab-custom li.active a {
        border-top: 2px solid #228bdf !important;
    }
    .nav-tab-left.navtab-custom li a {
        border: none !important;
        border-left: 2px solid transparent !important;
    }
    .nav-tab-left.navtab-custom li.active a {
        border-left: 2px solid #228bdf !important;
    }
    .nav-tab-right.navtab-custom li a {
        border: none !important;
        border-right: 2px solid transparent !important;
    }
    .nav-tab-right.navtab-custom li.active a {
        border-right: 2px solid #228bdf !important;
    }
    .nav-tabs.nav-justified > .active > a,
    .nav-tabs.nav-justified > .active > a:hover,
    .nav-tabs.nav-justified > .active > a:focus,
    .tabs-vertical-env .nav.tabs-vertical li.active > a {
        border: none;
    }
    .nav-tabs > li.active > a,
    .nav-tabs > li.active > a:focus,
    .nav-tabs > li.active > a:hover,
    .tabs-vertical > li.active > a,
    .tabs-vertical > li.active > a:focus,
    .tabs-vertical > li.active > a:hover {
        color: #228bdf !important;
    }

    .nav.nav-tabs + .tab-content {
        background: transparent;
        margin-bottom: 20px;
        padding: 20px;
    }
    .progress.progress-sm .progress-bar {
        font-size: 8px;
        line-height: 5px;
    }


</style>

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-12">
                <div class="">
                    <div class="">
                        <ul class="nav nav-tabs navtab-custom">
                            <li class="">
                                <a href="#home" data-toggle="tab" aria-expanded="false">
                                    <span class="visible-xs"><i class="fa fa-user"></i></span>
                                    <span class="hidden-xs">ABOUT ME</span>
                                </a>
                            </li>
                            <li class="active">
                                <a href="#profile" data-toggle="tab" aria-expanded="true">
                                    <span class="visible-xs"><i class="fa fa-galery"></i></span>
                                    <span class="hidden-xs">GALLERY</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="#settings" data-toggle="tab" aria-expanded="false">
                                    <span class="visible-xs"><i class="fa fa-cog"></i></span>
                                    <span class="hidden-xs">SETTINGS</span>
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane" id="home">
                                <p class="m-b-5">Hi I'm Johnathn Deo,has been the industry's standard dummy text ever
                                    since the 1500s, when an unknown printer took a galley of type.
                                    Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.
                                    In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo.
                                    Nullam dictum felis eu pede mollis pretium. Integer tincidunt.Cras
                                    dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend
                                    tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend
                                    ac, enim.</p>

                                <div class="m-t-30">
                                    <h4>Experience</h4>

                                    <div class=" p-t-10">
                                        <h5 class="text-primary m-b-5">Lead designer / Developer</h5>
                                        <p class="">websitename.com</p>
                                        <p><b>2010-2015</b></p>

                                        <p class="text-muted font-13 m-b-0">Lorem Ipsum is simply dummy text
                                            of the printing and typesetting industry. Lorem Ipsum has
                                            been the industry's standard dummy text ever since the
                                            1500s, when an unknown printer took a galley of type and
                                            scrambled it to make a type specimen book.
                                        </p>
                                    </div>

                                    <hr>

                                    <div class="">
                                        <h5 class="text-primary m-b-5">Senior Graphic Designer</h5>
                                        <p class="">coderthemes.com</p>
                                        <p><b>2007-2009</b></p>

                                        <p class="text-muted font-13">Lorem Ipsum is simply dummy text
                                            of the printing and typesetting industry. Lorem Ipsum has
                                            been the industry's standard dummy text ever since the
                                            1500s, when an unknown printer took a galley of type and
                                            scrambled it to make a type specimen book.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane active" id="profile">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="gal-detail thumb">
                                            <a href="#" class="image-popup" title="Screenshot-2">
                                                <img src="https://via.placeholder.com/400x300/008B8B/00000" class="thumb-img" alt="work-thumbnail">
                                            </a>
                                            <h4 class="text-center">Gallary Image</h4>
                                            <div class="ga-border"></div>
                                            <p class="text-muted text-center"><small>Photography</small></p>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="gal-detail thumb">
                                            <a href="#" class="image-popup" title="Screenshot-2">
                                                <img src="https://via.placeholder.com/400x300/FF7F50/00000" class="thumb-img" alt="work-thumbnail">
                                            </a>
                                            <h4 class="text-center">Gallary Image</h4>
                                            <div class="ga-border"></div>
                                            <p class="text-muted text-center"><small>Photography</small></p>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="gal-detail thumb">
                                            <a href="#" class="image-popup" title="Screenshot-2">
                                                <img src="https://via.placeholder.com/400x300/6495ED/00000" class="thumb-img" alt="work-thumbnail">
                                            </a>
                                            <h4 class="text-center">Gallary Image</h4>
                                            <div class="ga-border"></div>
                                            <p class="text-muted text-center"><small>Photography</small></p>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="gal-detail thumb">
                                            <a href="#" class="image-popup" title="Screenshot-2">
                                                <img src="https://via.placeholder.com/400x300/4169E1/00000" class="thumb-img" alt="work-thumbnail">
                                            </a>
                                            <h4 class="text-center">Gallary Image</h4>
                                            <div class="ga-border"></div>
                                            <p class="text-muted text-center"><small>Photography</small></p>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="gal-detail thumb">
                                            <a href="#" class="image-popup" title="Screenshot-2">
                                                <img src="https://via.placeholder.com/400x300/B0E0E6/00000" class="thumb-img" alt="work-thumbnail">
                                            </a>
                                            <h4 class="text-center">Gallary Image</h4>
                                            <div class="ga-border"></div>
                                            <p class="text-muted text-center"><small>Photography</small></p>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="gal-detail thumb">
                                            <a href="#" class="image-popup" title="Screenshot-2">
                                                <img src="https://via.placeholder.com/400x300/4169E1/00000" class="thumb-img" alt="work-thumbnail">
                                            </a>
                                            <h4 class="text-center">Gallary Image</h4>
                                            <div class="ga-border"></div>
                                            <p class="text-muted text-center"><small>Photography</small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="settings">
                                <form role="form">
                                    <div class="form-group">
                                        <label for="FullName">Full Name</label>
                                        <input type="text" value="John Doe" id="FullName" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="Email">Email</label>
                                        <input type="email" value="first.last@example.com" id="Email" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="Username">Username</label>
                                        <input type="text" value="john" id="Username" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="Password">Password</label>
                                        <input type="password" placeholder="6 - 15 Characters" id="Password" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="RePassword">Re-Password</label>
                                        <input type="password" placeholder="6 - 15 Characters" id="RePassword" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="AboutMe">About Me</label>
                                        <textarea style="height: 125px" id="AboutMe" class="form-control">Loren gypsum dolor sit mate, consecrate disciplining lit, tied diam nonunion nib modernism tincidunt it Loretta dolor manga Amalia erst volute. Ur wise denim ad minim venial, quid nostrum exercise ration perambulator suspicious cortisol nil it applique ex ea commodore consequent.</textarea>
                                    </div>
                                    <button class="btn btn-primary waves-effect waves-light w-md" type="submit">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>






@endsection
<script>
    $(".nav-tabs li a").click(function(){
        $(".nav-tabs li").removeClass("active");
        $(this).parent().addClass("active");
    });

</script>
