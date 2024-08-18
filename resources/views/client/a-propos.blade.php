@extends('client.layouts.base')
@section('titre', 'À propos')
@section('contenu')
    @include('client.layouts.headerStart', [
        'pageTitle' => 'A propos',
    ])
    <!-- Bienvenue -->
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <h1 class="display-4 text-uppercase text-center mb-5">Bienvenue chez <span class="text-primary">Royal Cars</span>
            </h1>
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <img class="w-75 mb-4" src="img/about.png" alt="">
                    <p>
                        Royal Cars est une agence de location de voitures en Tunisie offrant des tarifs compétitifs pour
                        tous vos besoins de mobilité. Nous sommes dédiés à fournir des solutions de transport fiables et
                        abordables pour rendre vos déplacements aussi simples et agréables que possible.
                        <br>
                        Avec un large choix de véhicules récents et bien entretenus, nous nous engageons à vous offrir une
                        expérience de conduite confortable et sans tracas. Que vous ayez besoin d'une voiture pour un voyage
                        d'affaires, des vacances en famille, ou une escapade rapide, nous avons l'option qu'il vous faut.
                        <br>
                        Notre agence met à votre disposition des voitures de location pour une courte, moyenne ou longue
                        durée, en s'appuyant sur une large gamme diversifiée qui répond à tous vos désirs et besoins.
                        <br>
                        Nos clients peuvent compter sur nous partout où ils ont besoin de louer un véhicule, que ce soit sur
                        les aéroports internationaux de la Tunisie ou dans les villes touristiques et les banlieues.
                    </p>

                </div>
            </div>
        </div>
    </div>
    <!-- Bienvenue End -->

    <!-- Pourquoi Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <h1 class="display-4 text-uppercase text-center mb-5">Pourquoi Choisir <span class="text-primary">Royal
                    Cars</span> ?</h1>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-2">
                    <div class="service-item d-flex flex-column justify-content-center px-4 mb-4">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary ml-n4 mr-4"
                                style="width: 100px; height: 100px;">
                                <i class="fa fa-2x fa-headset text-secondary"></i>
                            </div>
                            <h4 class="text-uppercase m-0">Assistance 24/7</h4>
                        </div>
                        <p class="m-0">
                            Nous offrons une assistance disponible à toute heure, chaque jour de la semaine.
                            <br> Notre équipe est là pour vous aider et résoudre vos problèmes à tout moment.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-2">
                    <div class="service-item d-flex flex-column justify-content-center px-4 mb-4">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary ml-n4 mr-4"
                                style="width: 100px; height: 100px;">
                                <i class="fa fa-2x fa-car text-secondary"></i>
                            </div>
                            <h4 class="text-uppercase m-0">Réservation à Tout Moment </h4>
                        </div>
                        <p class="m-0">
                            Réservez votre véhicule en ligne, quand vous le souhaitez.<br> Notre système simple et
                            accessible
                            vous permet de planifier facilement votre location.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-2">
                    <div class="service-item  d-flex flex-column justify-content-center px-4 mb-4">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary ml-n4 mr-4"
                                style="width: 100px; height: 100px;">
                                <i class="fa fa-2x fa-map-marker-alt text-secondary"></i>
                            </div>
                            <h4 class="text-uppercase m-0">Nombreux Points de Retrait</h4>
                        </div>
                        <p class="m-0">
                            Profitez de nombreux points de retrait pratiques à travers la Tunisie.<br> Que vous soyez à un
                            aéroport ou en ville, nous facilitons la récupération et le retour de votre voiture.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pourquoi End -->

    <!-- Services Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <h1 class="display-4 text-uppercase text-center mb-5">Nos Produits et services</h1>
            <p class=" text-uppercase text-center">Pour vos locations de voitures en Tunisie, Royal Cars vous propose
                plusieurs produits et services adaptés à vos besoins.</p>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-2">
                    <div class="service-item d-flex flex-column justify-content-center px-4 mb-4">
                        <div class="d-flex justify-content-center mb-3"> <img class="img-fluid w-150" src="img/lDuree.jfif"
                                alt="">
                        </div>
                        <h4 class="text-uppercase text-center mb-3">Location longue durée</h4>
                        <p class="m-0 text-center">Location voiture longue durée comprenant assurances tous risques et
                            entretien
                            inclus.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-2">
                    <div class="service-item d-flex flex-column justify-content-center px-4 mb-4">
                        <div class="d-flex justify-content-center mb-3"> <img class="img-fluid w-55"
                                src="img/locchauff.jfif" alt="">
                        </div>
                        <h4 class="text-uppercase text-center  mb-3">Location voiture avec chauffeur</h4>
                        <p class="m-0 text-center"> Location voiture avec un chauffeur à disposition 150 TND /Jour.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-2">
                    <div class="service-item d-flex flex-column justify-content-center px-4 mb-4">
                        <div class="d-flex justify-content-center mb-3">
                            <img class="img-fluid w-150" src="img/gps.jfif" alt="">
                        </div>
                        <h4 class="text-uppercase text-center mb-3">GPS</h4>
                        <p class="m-0 text-center">Trouver facilement votre destination sans perte de temps 2 TND /Jour.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-2">
                    <div class="service-item d-flex flex-column justify-content-center px-4 mb-4">
                        <div class="d-flex justify-content-center mb-3">
                            <img class="img-fluid w-150" src="img/siegebebe.jfif" alt="">
                        </div>
                        <h4 class="text-uppercase text-center mb-3">Siège Bébé</h4>
                        <p class="m-0 text-center"> Offrez plus de sécurité avec un siège bébé, avec un coût supplémentaire
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-2">
                    <div class="service-item d-flex flex-column justify-content-center px-4 mb-4">
                        <div class="d-flex justify-content-center mb-3">
                            <img class="img-fluid w-90" src="img/boiteauto.jfif" alt="">
                        </div>
                        <h4 class="text-uppercase text-center mb-3">Location voiture boite automatique</h4>
                        <p class="m-0 text-center">Optez pour une conduite sans effort avec nos véhicules à boîte
                            automatique</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-2">
                    <div class="service-item d-flex flex-column justify-content-center px-4 mb-4">
                        <div class="d-flex justify-content-center mb-3"> <img class="img-fluid w-150" src="img/locluxe.jfif"
                                alt="">
                        </div>
                        <h4 class="text-uppercase text-center  mb-3">Location voitures de luxe</h4>
                        <p class="m-0 text-center">Vivez le raffinement avec nos voitures de luxe, parfaites pour vos
                            mariages et événements spéciaux.</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Services End -->

    <!-- valeurs Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <h1 class="display-4 text-uppercase text-center mb-5">Nos valeurs </h1>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-2">
                    <div class="service-item d-flex flex-column justify-content-center px-4 mb-4">
                        <div class="d-flex align-items-center justify-content-center mb-3">
                            <h4 class="text-uppercase m-0">Excellence</h4>
                        </div>
                        <p class="m-0">
                            Nous visons l'excellence dans tous les aspects de notre activité. Chaque détail, de la qualité
                            irréprochable de nos véhicules à la rapidité et la précision de notre service, est soigneusement
                            optimisé pour vous offrir une expérience inégalée</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-2">
                    <div class="service-item d-flex flex-column justify-content-center px-4 mb-4">
                        <div class="d-flex align-items-center justify-content-center mb-3">
                            <h4 class="text-uppercase m-0 ">Confiance </h4>
                        </div>
                        <p class="m-0">
                            Nous croyons en la force des relations basées sur la confiance et la transparence. Notre
                            engagement à maintenir des pratiques claires et honnêtes nous permet de construire des
                            partenariats durables avec nos clients, garantissant ainsi une expérience fiable et rassurante.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-2">
                    <div class="service-item d-flex flex-column justify-content-center px-4 mb-4">
                        <div class="d-flex align-items-center justify-content-center mb-3">
                            <h4 class="text-uppercase m-0">Innovation </h4>
                        </div>
                        <p class="m-0">
                            Nous nous engageons à repousser les limites pour améliorer constamment nos services. En adoptant
                            les dernières technologies et en introduisant des solutions innovantes, nous nous efforçons de
                            vous offrir des solutions modernes et adaptées à vos besoins en perpétuelle évolution. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- valeur End -->
@endsection
