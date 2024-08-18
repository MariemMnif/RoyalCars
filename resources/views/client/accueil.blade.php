@extends('client.layouts.base')
@section('titre', 'Accueil')


@section('contenu')
    @include('client.layouts.carousel')

    <!-- services Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <h1 class="display-4 text-uppercase text-center mb-5">Nos Services</h1>
            <p class=" text-uppercase text-center">Pour vos locations de voitures en Tunisie, Royal Cars vous propose
                plusieurs produits et services adaptés à
                vos
                besoins.</p>
            <div class="owl-carousel team-carousel position-relative" style="padding: 0 30px;">
                <div class="team-item flex-column justify-content-center  ">
                    <img class="img-fluid w-200" src="img/lDuree.jfif" alt="">
                    <div class="position-relative py-4">
                        <h4 class="text-uppercase">Location voiture longue durée</h4>
                        <p class="m-0">Location voiture longue durée comprenant assurances tous risques et entretien
                            inclus.</p>
                    </div>
                </div>

                <div class="team-item flex-column justify-content-center  ">
                    <img class="img-fluid w-100" src="img/locchauff.jfif" alt="">
                    <div class="position-relative py-4">
                        <h4 class="text-uppercase">Location voiture avec chauffeur</h4>
                        <p class="m-0"> Location voiture avec un chauffeur à disposition 150 TND /Jour.</p><br>
                    </div>
                </div>

                <div class="team-item flex-column justify-content-center  ">
                    <img class="img-fluid w-150" src="img/gps.jfif" alt="">
                    <div class="position-relative py-4">
                        <h4 class="text-uppercase"> GPS</h4>
                        <p class="m-0"> Trouver facilement votre destination sans perte de temps 2 TND /Jour.</p><br><br>
                    </div>
                </div>

                <div class="team-item flex-column justify-content-center  ">
                    <img class="img-fluid w-150" src="img/siegebebe.jfif" alt="">
                    <div class="position-relative py-4">
                        <h4 class="text-uppercase">Siège Bébé</h4>
                        <p class="m-0">
                            Offrez plus de sécurité avec un siège bébé, avec un coût supplémentaire. </p><br>

                    </div>
                </div>

                <div class="team-item flex-column justify-content-center  ">
                    <img class="img-fluid w-100" src="img/boiteauto.jfif" alt="">
                    <div class="position-relative py-4">
                        <h4 class="text-uppercase">Location voiture boite automatique</h4>
                        <p class="m-0">
                            Optez pour une conduite sans effort avec nos véhicules à boîte
                            automatique</p>

                    </div>
                </div>

                <div class="team-item flex-column justify-content-center  ">
                    <img class="img-fluid w-100" src="img/locluxe.jfif" alt="">
                    <div class="position-relative py-4">
                        <h4 class="text-uppercase">Location voitures de luxe</h4>
                        <p class="m-0">
                            Vivez le raffinement avec nos voitures de luxe, parfaites pour vos
                            mariages et événements spéciaux.
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- services End -->
@endsection
