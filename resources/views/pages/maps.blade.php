@extends('layouts.app', ['activePage' => 'outlook', 'titlePage' => __('outlook')])

@section('content')

<!------ Include the above in your HEAD tag ---------->

<section class="about-us py-5 " id="about-us">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h1 class='text-info font-weight-bold h1'>A propos de la Direction informatique </h1>
                <hr class="mb-3" style="background-color:#FFFFFF;">
                <p class="text-justify ">La Direction de l’Informatique et des Nouvelles Technologies élabore les politiques et chartes relatives au domaine de l'information numérique et en assure le suivi.</p>
                <p class="text-justify  mt-2 font-weight-bold">Le Bureau de la Direction des Installations Informatiques est chargé :</p>
                <ul class="ml-4">
                    <li class="mt-2" ><span class="mr-1" style="color: #42A1AA; margin-left: -18px;">&#10003;</span>Assurer le suivi, le contrôle, la planification et l'extension des installations des réseaux et systèmes, ainsi que d'en assurer la pérennité ;</li>
                    <li  class="mt-2"><span class="mr-1" style="color: #42A1AA; margin-left: -18px;">&#10003;</span>Installation, exploitation et maintenance de divers logiciels et matériels pour les installations des réseaux et des systèmes;</li>
                    <li  class="mt-2"><span class="mr-1" style="color: #42A1AA; margin-left: -18px;">&#10003;</span>Installation, exploitation et maintenance de divers matériels et logiciels de sécurité (antivirus, pare-feu, ... etc.);</li>
                    <li  class="mt-2"><span class="mr-1" style="color: #42A1AA; margin-left: -18px;">&#10003;</span>Contrôler et assurer la maintenance du matériel et des logiciels;</li>
                    <li  class="mt-2"><span class="mr-1" style="color: #42A1AA; margin-left: -18px;">&#10003;</span>Assurer la mise en œuvre d'une politique de sécurité pour le réseau des systèmes d’information et installations multimédias ;</li>
                    <li  class="mt-2"><span class="mr-1" style="color: #42A1AA; margin-left: -18px;">&#10003;</span>La gestion et le suivi des contrats d'entretien, de garantie et d'extension de garantie des établissements ;</li>
                    <li  class="mt-2"><span class="mr-1" style="color: #42A1AA; margin-left: -18px;">&#10003;</span>Gestion de plusieurs programmes tels que : antivirus, e-mail, systèmes d'exploitation...etc.</li>
                    <li  class="mt-2"><span class="mr-1" style="color: #42A1AA; margin-left: -18px;">&#10003;</span>Installation de mises à jour logicielles pour les systèmes d'exploitation et divers logiciels et matériels de l’établissement;</li>
                    <li  class="mt-2"><span class="mr-1" style="color: #42A1AA; margin-left: -18px;">&#10003;</span>Conseils et assistance en cas de besoin;</li>
                    <li  class="mt-2"><span class="mr-1" style="color: #42A1AA; margin-left: -18px;">&#10003;</span>Soumission et participation à l'élaboration des cahiers des charges des projets relatifs aux programmes et dispositifs des établissements;</li>
                    <li  class="mt-2"><span class="mr-1" style="color: #42A1AA; margin-left: -18px;">&#10003;</span>Tenir l'inventaire et assurer la gestion administrative de la réserve pour les logiciels et le matériel liés aux installations.</li>
                </ul>
            </div>
            <div class="col-md-6 mt-5 pt-xl-5 ">
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <img class="ml-4" src="{{asset('black/img/undraw.svg')}}"alt="">
            </div>
        </div>
    </div>
</section>
@endsection
