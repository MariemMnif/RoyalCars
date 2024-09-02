@extends('client.layouts.base')

@section('contenu')
    @include('client.layouts.headerStart', [
        'pageTitle' => 'Connexion',
    ])
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <h1 class="display-4 text-uppercase text-center mb-5">Espace client</h1>
            <form method="POST" action="">
                @csrf
                <div class="row contact-form bg-light">
                    <div class="col-lg-8 mb-2  ">

                        <div style="padding: 30px;">
                            <form>
                                <div class="row">

                                    <p>Vous avez commandé un véhicule et souhaitez en savoir plus sur l'état de votre
                                        dossier
                                        de réservation? Identifiez-vous maintenant!</p>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control p-4" placeholder="Email" name="email"
                                        required="required">
                                </div>

                                <div class="form-group">
                                    <input type="password" class="form-control p-4" placeholder="Mot de passe "
                                        name="mdp" required="required">
                                </div>
                                <div class="container pt-2 pb-2">
                                    <a href="#" id="myBtn" style=" color:var(--dark);">Mot de passe oublié ?</a>
                                </div>
                                <div style="text-align: right;">
                                    <button class="btn btn-primary py-3 px-5" type="submit">Connexion</button>
                                </div>
                            </form>

                        </div>
                        <div class="text-center ">
                            <p>Vous n'avez pas encore de compte ? <a href="{{ route('inscription') }}"
                                    style="color: var(--dark);">Inscrivez-vous ici</a>.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 d-flex justify-content-center align-items-center p-0">
                        <img class="img-fluid" style="width: 100%; height: 100%; object-fit: cover;" src="img/cars2.jpg">
                    </div>
            </form>
        </div>

    </div>
    </div>

    <!-- Modal HTML -->
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        /* The Modal (background) */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            padding-top: 100px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.4);
            z-index: 1050;
        }

        /* Modal Content */
        .modal-content {
            position: relative;
            background-color: #fefefe;
            margin: auto;
            padding: 0;
            border: 1px solid #888;
            width: 40%;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            -webkit-animation-name: animatetop;
            -webkit-animation-duration: 0.4s;
            animation-name: animatetop;
            animation-duration: 0.4s
        }

        /* Add Animation */
        @-webkit-keyframes animatetop {
            from {
                top: -300px;
                opacity: 0
            }

            to {
                top: 0;
                opacity: 1
            }
        }

        @keyframes animatetop {
            from {
                top: -300px;
                opacity: 0
            }

            to {
                top: 0;
                opacity: 1
            }
        }

        /* The Close Button */
        .close {
            color: grey;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #ff8000;
            text-decoration: none;
            cursor: pointer;
        }

        .modal-header {
            padding: 10px 16px;
            background-color: white;
            color: var(--dark);
        }

        .modal-body {
            padding: 2px 16px;
        }
    </style>
    </head>

    <body>


        <!-- The Modal -->
        <div id="myModal" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Mot de passe oublié</h4>
                    <span class="close">&times;</span>

                </div>
                <div class="modal-body">
                    <form>
                        <br>
                        <p>Veuillez saisir votre adresse e-mail pour recevoir un lien de réinitialisation de mot de
                            passe.</p>
                        <div class="form-group">
                            <label for="email">Votre E-mail:</label>
                            <input type="email" class="form-control p-2" id="email" class="form-control p-4"
                                name="email" required="required">
                        </div>
                        <div style="text-align: right;">
                            <button class="btn btn-primary py-2 px-3" type="submit">Valider</button>
                        </div>
                        <br>
                    </form>
                </div>

            </div>

        </div>

        <script>
            // Get the modal
            var modal = document.getElementById("myModal");

            // Get the button that opens the modal
            var btn = document.getElementById("myBtn");

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // When the user clicks the button, open the modal 
            btn.onclick = function() {
                modal.style.display = "block";
            }

            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
                modal.style.display = "none";
            }

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        </script>
    @endsection
