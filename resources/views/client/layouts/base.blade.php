<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>ROYAL CARS - Car Rental HTML Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="{{ asset('https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&family=Rubik&display=swap') }}"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css') }}"
        rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <style>
        .datepicker table tr td.disabled,
        .datepicker table tr td.disabled:hover {
            background: none;
            color: #999999;
            cursor: default;
        }


        .datepicker table tr td {
            padding: 8px;
            /* Ajoute de l'espace à l'intérieur des cellules du calendrier */
        }
    </style>
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid bg-dark py-3 px-lg-5 d-none d-lg-block">
        <div class="row">
            <div class="col-md-6 text-center text-lg-left mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center">
                    <a class="text-body pr-3" href=""><i class="fa fa-phone-alt mr-2"></i>+012 345 6789</a>
                    <span class="text-body">|</span>
                    <a class="text-body px-3" href=""><i class="fa fa-envelope mr-2"></i>info@example.com</a>
                </div>
            </div>
            <div class="col-md-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <a class="text-body px-3" href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-body px-3" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-body px-3" href="">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-body px-3" href="">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="text-body pl-3" href="">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar Start -->
    <div class="container-fluid position-relative nav-bar p-0">
        <div class="position-relative px-lg-5" style="z-index: 9;">
            <nav class="navbar navbar-expand-lg bg-secondary navbar-dark py-3 py-lg-0 pl-3 pl-lg-5">
                <a href="{{ route('accueil') }}" class="navbar-brand">
                    <h1 class="text-uppercase text-primary mb-1">Royal Cars</h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                    <div class="navbar-nav ml-auto py-0">
                        <a href="{{ route('accueil') }}" class="nav-item nav-link ">ACCUEIL</a>
                        <a href="{{ route('listVoitures') }}" class="nav-item nav-link ">Nos Voitures</a>
                        @guest
                            <a href="{{ route('login') }}" class="nav-item nav-link">ESPACE CLIENT</a>
                        @endguest
                        <a href="{{ route('a-propos') }}" class="nav-item nav-link">À propos</a>
                        <a href="{{ route('contact') }}" class="nav-item nav-link">Contact</a>

                        <!-- Vérifie si l'utilisateur est authentifié -->
                        @auth
                            <a href="{{ route('listReservations') }}" class="nav-item nav-link"> Mes reservations</a>
                            <a href="{{ route('logout') }}" class="nav-item nav-link active"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Déconnexion</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        @endauth
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->



    <!-- Search Start -->
    <div class="container-fluid bg-white pt-3 px-lg-5">
        <form action="{{ route('rechercherVoitures') }}" method="GET">
            <div class="row mx-n2">
                <div class="col-xl-2 col-lg-4 col-md-6 px-2">
                    <label for="lieuPrise" class="form-label">Lieu de prise en charge</label>
                    <select id="lieuPrise" name="lieuPrise" class="custom-select px-4 mb-3" style="height: 50px;">
                        <option selected>
                            lieu prise en charge
                        </option>
                        <optgroup label="Aéroports">
                            <option value="Aeroport Tunis Carthage">Aéroport Tunis Carthage</option>
                            <option value="Aeroport Enfidha">Aéroport Enfidha</option>
                            <option value="Aeroport Monastir">Aéroport Monastir</option>
                            <option value="Aeroport Djerba">Aéroport Djerba</option>
                            <option value="Aeroport Tozeur">Aéroport Tozeur</option>
                        </optgroup>

                        <optgroup label="Centres-Villes">
                            <option value="Tunis">Tunis</option>
                            <option value="Hammamet">Hammamet</option>
                            <option value="Sousse">Sousse</option>
                            <option value="Monastir">Monastir</option>
                            <option value="Djerba">Djerba</option>
                            <option value="Kairouan">Kairouan</option>
                            <option value="Sfax">Sfax</option>
                            <option value="Tabarka">Tabarka</option>
                            <option value="Bizerte">Bizerte</option>
                            <option value="Mahdia">Mahdia</option>
                        </optgroup>
                    </select>
                </div>

                <div class="col-xl-2 col-lg-4 col-md-6 px-2">
                    <div class="date mb-3" id="dateLocationContainer" data-target-input="nearest">
                        <label for="dateLocation" class="form-label">Date de location</label>
                        <div class="input-group">
                            <input type="text" id="dateLocation" name="dateLocation"
                                class="form-control p-4 datetimepicker-input" placeholder="jj/mm/aaaa"
                                data-target="#dateLocationContainer" data-toggle="datetimepicker">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-4 col-md-6 px-2">
                    <div class="time mb-3" id="heureLocation" data-target-input="nearest">
                        <label for="heureLocation" class="form-label">Heure de location</label>
                        <input type="text" class="form-control p-4 datetimepicker-input" placeholder="hh:mm"
                            data-target="#heureLocation" data-toggle="datetimepicker" name="heureLocation"
                            id="heureLocation" />
                    </div>
                </div>

                <div class="col-xl-2 col-lg-4 col-md-6 px-2">
                    <div class="date mb-3" id="dateRetourContainer" data-target-input="nearest">
                        <label for="dateRetour" class="form-label">Date de retour</label>
                        <div class="input-group">
                            <input type="text" class="form-control p-4 datetimepicker-input"
                                placeholder="jj/mm/aaaa" data-target="#dateRetourContainer"
                                data-toggle="datetimepicker" id="dateRetour" name="dateRetour" />
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-4 col-md-6 px-2">
                    <div class="time mb-3" id="heureRetourContainer" data-target-input="nearest">
                        <label for="heureRetour" class="form-label">Heure de retour</label>
                        <input type="text" class="form-control p-4 datetimepicker-input" placeholder="hh:mm"
                            name="heureRetour"id="heureRetour" data-target="#heureRetourContainer"
                            data-toggle="datetimepicker" />
                    </div>
                </div>

                <div class="col-xl-2 col-lg-4 col-md-6 px-2 d-flex align-items-end">
                    <button class="btn btn-primary btn-block mb-3" type="submit"
                        style="height: 50px;">Rechercher</button>
                </div>
            </div>
            <div class="row mx-n2">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="LieuRestitution"
                        name="LieuRestitution"checked>
                    <label class="custom-control-label" for="LieuRestitution">Lieu de restitution identique</label>
                </div>
            </div>
            <div id="LocRestitution" class="row mx-n2">
                <div class="col-xl-2 col-lg-4 col-md-6 px-2">
                    <select id="lieuRes" name="lieuRes"class="custom-select px-4 mb-3" style="height: 50px;">
                        <option selected> Lieu restitution</option>
                        <optgroup label="Aéroports">
                            <option value="Aeroport Tunis Carthage">Aéroport Tunis Carthage</option>
                            <option value="Aeroport Enfidha">Aéroport Enfidha</option>
                            <option value="Aeroport Monastir">Aéroport Monastir</option>
                            <option value="Aeroport Djerba">Aéroport Djerba</option>
                            <option value="Aeroport Tozeur">Aéroport Tozeur</option>
                        </optgroup>

                        <optgroup label="Centres-Villes">
                            <option value="Tunis">Tunis</option>
                            <option value="Hammamet">Hammamet</option>
                            <option value="Sousse">Sousse</option>
                            <option value="Monastir">Monastir</option>
                            <option value="Djerba">Djerba</option>
                            <option value="Kairouan">Kairouan</option>
                            <option value="Sfax">Sfax</option>
                            <option value="Tabarka">Tabarka</option>
                            <option value="Bizerte">Bizerte</option>
                            <option value="Mahdia">Mahdia</option>
                        </optgroup>
                    </select>
                </div>
            </div>
        </form>
        &nbsp
    </div>
    <!-- Search End -->


    <!-- Carousel Start  -->

    <!-- Carousel End -->

    @yield('contenu')
    <!-- About Start -->

    <!-- About End -->


    <!-- Services Start -->

    <!-- Services End -->


    <!-- Banner Start -->

    <!-- Banner End -->


    <!-- Rent A Car Start -->

    <!-- Rent A Car End -->


    <!-- Team Start -->

    <!-- Team End -->


    <!-- Banner Start -->

    <!-- Banner End -->


    <!-- Testimonial Start -->

    <!-- Testimonial End -->


    <!-- Contact Start -->

    <!-- Contact End -->


    <!-- Vendor Start -->


    <!-- Vendor End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-secondary py-5 px-sm-3 px-md-5" style="margin-top: 90px;">
        <div class="row pt-5">
            <div class="col-lg-3 col-md-5 mb-5">
                <h1 class="text-uppercase text-primary   mb-2">Royal Cars</h1>
                <p class="mb-4">Vous propose une flotte de
                    véhicules modernes et climatisés. Réservez facilement pour diverses villes avec une confirmation
                    rapide et une voiture prête à votre arrivée, pour un voyage sans souci.
                </p>

            </div>

            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="text-uppercase text-light mb-2">Services</h5>
                <div class="d-flex flex-column justify-content-start">
                    <a class="text-body mb-2" href="#">
                        <i class="fa fa-angle-right text-white mr-2"></i>Location voiture avec GPS
                    </a>
                    <a class="text-body mb-2" href="#">
                        <i class="fa fa-angle-right text-white mr-2"></i>Location voiture longue durée
                    </a>
                    <a class="text-body mb-2" href="#"><i
                            class="fa fa-angle-right text-white mr-2"></i>Location voiture automatique</a>
                    <a class="text-body mb-2" href="#"><i
                            class="fa fa-angle-right text-white mr-2"></i>Location voiture à domicile</a>
                    <a class="text-body mb-2" href="#"><i
                            class="fa fa-angle-right text-white mr-2"></i>Location voiture avec chauffeur</a>
                    <a class="text-body mb-2" href="#"><i
                            class="fa fa-angle-right text-white mr-2"></i>Location voitures de luxe</a>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="text-uppercase text-light mb-2">Société</h5>
                <div class="d-flex flex-column justify-content-start">
                    <a class="text-body mb-2" href="{{ route('a-propos') }}"><i
                            class="fa fa-angle-right text-white mr-2"></i>Qui
                        sommes-nous ?</a>
                    <a class="text-body mb-2" href="#"><i
                            class="fa fa-angle-right text-white mr-2"></i>Conditions de location</a>
                </div>
                <div>
                    <br>
                    <h5 class="text-uppercase text-white mb-2">Nous contacter</h5>
                    <p class="mb-2"><i class="fa fa-phone-alt text-white mr-3"></i>+012 345 67890</p>
                    <p><i class="fa fa-envelope text-white mr-3"></i>info@example.com</p>
                </div>
            </div>



            <div class="col-lg-3 col-md-6 mb-5">

                <h5 class="text-uppercase text-light mb-2">Services client</h5>
                <div class="d-flex flex-column justify-content-start">
                    <a class="text-body mb-2" href="{{ route('contact') }}"><i
                            class="fa fa-angle-right text-white mr-2"></i>Contact</a>
                    <a class="text-body mb-2" href="{{ route('faq') }}"><i
                            class="fa fa-angle-right text-white mr-2"></i>FAQ</a>
                    <a class="text-body mb-2" href="{{ route('temoignage') }}"><i
                            class="fa fa-angle-right text-white mr-2"></i>Témoignages clients</a>
                </div>

                <h5 class="text-uppercase text-light mb-2">Newsletter</h5>
                <div class="w-100 mb-3">
                    <div class="input-group">
                        <input type="text" class="form-control bg-dark border-dark" style="padding: 25px;"
                            placeholder="Email">
                        <div class="input-group-append">
                            <button class="btn btn-primary text-uppercase px-3">S'inscrire</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-dark py-4 px-sm-3 px-md-5">
        <p class="mb-2 text-center text-body">&copy; <a href="#">Your Site Name</a>. All Rights Reserved.
        </p>

        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
        <p class="m-0 text-center text-body">Designed by <a href="https://htmlcodex.com">HTML Codex</a></p>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i
            class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="{{ asset('https://code.jquery.com/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('lib/tempusdominus/js/moment.min.js') }}"></script>

    <!-- Pour date remplacer ces deus lignes
    <script src="{{ asset('lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script> -->

    <!-- Par  -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <!--heure-->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/clockpicker/0.0.7/bootstrap-clockpicker.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clockpicker/0.0.7/bootstrap-clockpicker.min.js"></script>
    <!-- Template Javascript -->
    <script src="{{ asset('js/main.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var checkbox = document.getElementById('LieuRestitution');
            var locationSection = document.getElementById('LocRestitution');

            function toggleLocationSection() {
                locationSection.style.display = checkbox.checked ? 'none' : 'block';
            }

            toggleLocationSection();
            checkbox.addEventListener('change', toggleLocationSection);
        });
        $('#dateRetour').datepicker({
            format: 'dd/mm/yyyy' // Format du calendrier
        });
        $('#dateLocation').datepicker({
            autoclose: true,
            startDate: '+0d', // Date par défaut à aujourd'hui
            format: 'dd/mm/yyyy' // Format du calendrier
        }).on('changeDate', function(e) {
            // Mettre à jour la date minimale pour dateRetour lorsque dateLocation change
            var minDate = new Date(e.date);
            minDate.setDate(minDate.getDate() + 1); // Ajouter 1 jour
            $('#dateRetour').datepicker('setStartDate', minDate);
        });


        $('#heureLocation').clockpicker({
            autoclose: true,
            placement: 'bottom',
            align: 'left',
            donetext: 'Done'
        });
        $('#heureRetour').clockpicker({
            autoclose: true,
            placement: 'bottom',
            align: 'left',
            donetext: 'Done'
        });
    </script>
</body>

</html>
