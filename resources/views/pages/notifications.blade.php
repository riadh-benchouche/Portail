@extends('layouts.app', ['page' => __('Notifications'), 'pageSlug' => 'notifications'])

@section('content')
    <div class="row">
        <h1 class='text-info font-weight-bold h1 text-center ml-auto mr-auto'>Les Systemes d'information </h1>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="card card-blog pt-2">
                <div class="card-image">
                    <a href="javascript:;">
                        <img class="img ml-auto mr-auto" width="80%" src="{{asset('black/img/work.svg')}}">
                    </a>
                </div>
                <div class="card-body text-center">
                    <h4 class="card-title font-weight-bold">
                       Application des ressources Humaines
                    </h4>
                    <div class="card-description">
                        Un outil mis à la disposition des ressources humaines qui a pour objectif simplifier l’ensemble des tâches administratives liées à la gestion du personnel et d’optimiser les processus RH.
                    </div>
                    <div class="card-footer">
                        <a href="javascript:;" class="btn btn-danger btn-round">Accéder a l'application</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-blog pt-2">
                <div class="card-image">
                    <a href="javascript:;">
                        <img class="img ml-auto mr-auto" width="70%" src="{{asset('black/img/payment.svg')}}">
                    </a>
                </div>
                <div class="card-body text-center">
                    <h4 class="card-title font-weight-bold">
                        Application de gestion de la Paie
                    </h4>
                    <div class="card-description">
                       Un outil informatique permettant de gérer et d’automatiser l’intégralité des processus « Paiement » et permet donc d’établir une fiche de paie complète, ainsi que les déclarations obligatoires.
                    </div>
                    <div class="card-footer">
                        <a href="javascript:;" class="btn btn-danger btn-round">Accéder a l'application</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-blog pt-4 pl-3 pr-3">
                <div class="card-image">
                    <a href="javascript:;">
                        <img class="img" src="{{asset('black/img/mail.svg')}}">
                    </a>
                </div>
                <div class="card-body text-center">
                    <h4 class="card-title font-weight-bold">
                        Outlook Web Application « OWA »
                    </h4>
                    <div class="card-description">
                        Vous pouvez vous connecter à votre messagerie Exchange 2010 via un navigateur web grâce à Outlook Web App et ce depuis n’importe quel endroit.
                    </div>
                    <div class="card-footer">
                        <a href="{{url('https://mail.apn.gov.dz/owa')}}" class="btn btn-danger btn-round mt-4">Accéder a l'OWA</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
