@extends('admin.layouts.baseAdmin')

@section('contenu')
    <div class="container">
        <h1 class="text-center text-uppercase bg-light text-primary p-3 mb-4"> Ajouter une reservation - 2 </h1>
        <br>
        <form method="POST" action="{{ route('reservations.addReservation') }}">
            @csrf
            <!-- Voiture -->
            <div class="row  mt-5 mb-2">
                <div class="col-12">
                    <h2 class="mb-4">Voitures Disponibles</h2>
                    @foreach ($voitures->chunk(2) as $voiturePair)
                        <div class="row mb-3">
                            @foreach ($voiturePair as $voiture)
                                <div class="col-md-6">
                                    <div class="d-flex border rounded p-3 align-items-center">
                                        <div class="flex-shrink-0 me-3">
                                            <img src="{{ asset('storage/img/' . $voiture->image) }}" class="img-fluid"
                                                style="width: 200px; height: auto;" alt="{{ $voiture->marque_modele }}">
                                        </div>

                                        <div class="flex-grow-1">
                                            <div class="d-flex align-items-center mb-2">

                                                <label for="voiture{{ $voiture->id }}" class="ms-2"
                                                    style="font-size: 20px;">{{ $voiture->marque_modele }} -
                                                    {{ $voiture->annee_fabrication }}</label>&nbsp;

                                                <input type="radio" id="voiture{{ $voiture->id }}" name="voiture_id"
                                                    value="{{ $voiture->id }}" data-prix="{{ $voiture->prix }}" required
                                                    style="width: 30px; height: 30px; accent-color: #007bff; margin-left: auto; margin-right: 0;">

                                            </div>
                                            <div class="d-flex text-center mb-3">
                                                <div class="px-2 border-right">
                                                    <img src="{{ asset('icons/oil.png') }}" width="24" height="24"
                                                        alt="Carburant">
                                                    <span>{{ $voiture->type_carburant }}</span>
                                                </div>
                                                <div class="px-2 border-right">
                                                    <img src="{{ asset('icons/car-door.png') }}" width="24"
                                                        height="24" alt="Portes">
                                                    <span>{{ $voiture->nb_portes }}</span>
                                                </div>
                                                <div class="px-2 border-right">
                                                    <img src="{{ asset('icons/luggage.png') }}" width="24"
                                                        height="24" alt="Coffre">
                                                    <span>{{ $voiture->capacite_coffre }}</span>
                                                </div>
                                                <div class="px-2 border-right">
                                                    <img src="{{ asset('icons/person.png') }}" width="24"
                                                        height="24" alt="Places">
                                                    <span>{{ $voiture->nb_places }}</span>
                                                </div>
                                                <div class="px-2">
                                                    <img src="{{ asset('icons/transmission.png') }}" width="24"
                                                        height="24" alt="Transmission">
                                                    <span>{{ $voiture->type_transmission }}</span>
                                                </div>
                                            </div>
                                            <div>
                                                <h4 class="d-inline-block"
                                                    style="font-size: 18px; text-transform: uppercase; margin-right: 10px;">
                                                    Prix par
                                                    jour :</h4>
                                                <p class="d-inline-block" id="prixParJour{{ $voiture->id }}"
                                                    name="voiture_prix"
                                                    style="text-transform: uppercase; margin-right: 10px; font-size: 21px;">
                                                    {{ $voiture->prix }} DT
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
            <!--Supp -->
            <div class="row  mt-5 ">
                <div class="col-lg-8">
                    <div>
                        <h2 class="mb-0">Options
                            pour compléter la location</h2>
                        <div class="">
                            <!-- liste des options-->
                            <div class="card-body py-2 mb-2 m-2">

                                @foreach ($supplements as $supplement)
                                    <div class="row mt-4">
                                        <div class="col-md col-6">
                                            <img src="{{ asset('storage/img/' . $supplement->image) }}" class="img-fluid">
                                        </div>
                                        <div class="col-md-4  mt-2 align-self-center">
                                            <div class="font-weight-bold text-uppercase">
                                                {{ $supplement->libelle }}
                                            </div>
                                            <span class="text-uppercase text-center">{{ $supplement->prix }} TND
                                                par
                                                jour</span>
                                        </div>
                                        <div class="col-md col-6 mt-2 align-self-center">
                                            <span class="text-uppercase">{{ $supplement->prix }} TND</span>
                                        </div>

                                        <div class="col-md col-6 align-self-center">
                                            <div class="">

                                                @if ($supplement->nbMax > 1)
                                                    <div class="d-flex">
                                                        <button class="btn btn-sm btn-primary minus-btn rounded-0"
                                                            type="button" id="button-decrement-{{ $supplement->id }}">
                                                            <i class="fas fa-minus"></i>
                                                        </button>
                                                        <input type="text" name="supplement[{{ $supplement->id }}]"
                                                            class="border form-control bg-white text-center supplement-quantity"
                                                            id="quantite-{{ $supplement->id }}" value="0"
                                                            data-prix="{{ $supplement->prix }}">
                                                        <button class="btn btn-sm btn-primary plus-btn rounded-0"
                                                            type="button" id="button-increment-{{ $supplement->id }}">
                                                            <i class="fas fa-plus"></i>
                                                        </button>
                                                    </div>
                                                @else
                                                    <div class="mb-2 mt-4">
                                                        <span class="font-weight-bold" style="font-size: 13px;">Non</span>
                                                        <label class="switch switch-green">
                                                            <input type="checkbox" name="supplement[{{ $supplement->id }}]"
                                                                value="1" data-prix="{{ $supplement->prix }}"
                                                                class="switch-input supplement-checkbox">
                                                            <span class="switch-label"></span>
                                                            <span class="switch-handle"></span>
                                                        </label>
                                                        <span class="font-weight-bold" style="font-size: 13px;">Oui</span>
                                                    </div>
                                                @endif


                                            </div>
                                        </div>
                                    </div>
                                    <input name="max"value="{{ $supplement->nbMax }}"
                                        data-max="{{ $supplement->nbMax }}"hidden />
                                @endforeach


                            </div>

                        </div>
                    </div>
                    <br>
                </div>
                <div class="col-lg-4">
                    <div class=" p-2 ">
                        <div class="px-2 border border-right">
                            <div class="p-2">
                                <h6 class=" mr-2">Prise :</h6>
                                <p>{{ $lieuPrise }}
                                    <br>
                                    Le {{ $dateLocation }} à {{ $heureLocation }}
                                </p>
                                <h6 class="mr-2">Retour :</h6>
                                <p> {{ $lieuRes }}<br>
                                    Le {{ $dateRetour }} à {{ $heureRetour }}
                                </p>
                                <h6 class="mr-2">Durée :</h6>
                                <p>{{ $diffInDays }} Jours</p>
                            </div>

                            <div class="bg-secondary py-3 px-sm-4 px-md-3 mb-4">
                                <div class="d-flex justify-content-between w-100">
                                    <h5 class="text-white">Total location</h5>
                                    <h5 name="montantTotal" class="text-white" id="prixLocation"></h5>
                                </div>

                                <div class="d-flex justify-content-between w-100">
                                    <h5 class="text-white">Option</h5>
                                    <h5 class="text-white" id="totalOptions">0</h5>
                                </div>
                            </div>
                            <div class="bg-primary py-3 px-sm-4 px-md-3">
                                <div class="d-flex justify-content-between w-100">
                                    <h4 class="mb-2 text-white">Montant total</h4>
                                    <h4 class="text-white" id="montantTotal"></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Vol -->
            <div class="row  mb-2">
                <div class=" col-lg-9 ">
                    <div class=" justify-content-center">
                        <br>
                        <h2 class="">Informations sur la livraison</h2>
                        <p class="">Avez-vous un vol le jour de la prise de véhicule ?</p>
                        <div class="mb-2">&nbsp;
                            <span style="font-size: 20px;">Non</span>
                            <label class="switch switch-green">
                                <input type="checkbox" id="volCheckbox"
                                    name="volCheckbox"class="switch-input switchFlight" data-toggle="popover">
                                <span class="switch-label"></span>
                                <span class="switch-handle"></span>
                            </label>
                            <span style="font-size: 20px;">Oui</span>
                        </div>
                    </div>
                    <div id="volDetails" style="display: none;">
                        &nbsp;&nbsp;
                        <div class="row">
                            <div class="col-4 form-group">
                                <label class="" for="NumVol">Numéro de vol</label>
                                <input type="text" name="NumVol" class="form-control p-4" id="NumVol"
                                    placeholder="Numéro de vol">
                            </div>
                            <div class="col-4 form-group">
                                <div class="time mb-3" id="horaireVol" data-target-input="nearest">
                                    <label for="horaireVol" class="form-label">Horaire du vol</label>
                                    <input type="text" name="horaireVol" class="form-control p-4 datetimepicker-input"
                                        placeholder="hh:mm" data-target="#horaireVol" data-toggle="datetimepicker"
                                        name="horaireVol" id="horaireVol" />
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <input type="hidden" name="lieuPrise" value="{{ $lieuPrise }}">
            <input type="hidden" name="dateLocation" value="{{ $dateLocation }}">
            <input type="hidden" name="heureLocation" value="{{ $heureLocation }}">
            <input type="hidden" name="lieuRes" value="{{ $lieuRes }}">
            <input type="hidden" name="dateRetour" value="{{ $dateRetour }}">
            <input type="hidden" name="heureRetour" value="{{ $heureRetour }}">
            <input type="hidden" name="email" value="{{ $email }}">

            <!-- Submit Button -->
            <div class="text-right">
                <button class="btn btn-success" type="submit">Envoyer ma demande de réservation</button>
            </div>

            <!-- Cost Summary -->
            <div class="toggle_pointer_events hidden-sm">
                <div class="cobalt-Card">
                    <div class="p-3">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-1">
                                    <span class="font-20 font-weight-600 text-white" id="montantTotal2"
                                        style="display: inline;"> DT</span>
                                </div>
                                <p class="text-white mb-0 font-14">Pour {{ $diffInDays }} jours</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Cost Summary -->


        </form>
    </div>

    <script>
        //vol
        document.addEventListener('DOMContentLoaded', function() {
            var flightSwitch = document.getElementById('volCheckbox');
            var flightDetails = document.getElementById('volDetails');

            // Ajouter un événement de changement au checkbox
            flightSwitch.addEventListener('change', function() {
                if (flightSwitch.checked) {
                    flightDetails.style.display = 'block';
                } else {
                    flightDetails.style.display = 'none';
                }
            });
            $('#horaireVol').clockpicker({
                autoclose: true,
                placement: 'bottom',
                align: 'left',
                donetext: 'Done'
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            // Mettre à jour le total des options lorsque les cases sont cochées ou décochées
            document.querySelectorAll('.supplement-checkbox').forEach(function(checkbox) {
                checkbox.addEventListener('change', function() {
                    updateTotal();
                });
            });

            // Mettre à jour le total des options lorsque les quantités sont modifiées
            document.querySelectorAll('.supplement-quantity').forEach(function(input) {
                input.addEventListener('input', function() {
                    updateTotal();
                });
            });

            // Gérer les boutons d'incrémentation et de décrémentation
            document.querySelectorAll('.plus-btn').forEach(function(button) {
                button.addEventListener('click', function() {
                    let input = button.previousElementSibling;
                    let max = parseInt(input.getAttribute('data-max')) ||
                        3; // Limite supérieure facultative
                    let currentValue = parseInt(input.value) || 0;
                    if (currentValue < max) {
                        input.value = currentValue + 1;
                        updateTotal();
                    }
                });
            });

            document.querySelectorAll('.minus-btn').forEach(function(button) {
                button.addEventListener('click', function() {
                    let input = button.nextElementSibling;
                    let currentValue = parseInt(input.value) || 0;
                    if (currentValue > 0) {
                        input.value = currentValue - 1;
                        updateTotal();
                    }
                });
            });

            // Fonction pour mettre à jour le prix total des options
            function updateTotal() {
                let selectedCar = document.querySelector('input[name="voiture_id"]:checked');
                if (selectedCar) {
                    carPricePerDay = parseFloat(selectedCar.getAttribute('data-prix')) || 0;
                }
                let days = {{ $diffInDays }};

                let totalPriceForCar = selectedCar ? (carPricePerDay * days) : 0;
                document.getElementById('prixLocation').textContent = totalPriceForCar.toFixed(2) + ' TND';


                let totalOptions = 0;


                document.querySelectorAll('.supplement-checkbox:checked').forEach(function(checkbox) {
                    let price = parseFloat(checkbox.getAttribute('data-prix')) || 0;
                    totalOptions += price;
                });

                document.querySelectorAll('.supplement-quantity').forEach(function(input) {
                    let quantity = parseInt(input.value) || 0;
                    let price = parseFloat(input.getAttribute('data-prix')) || 0;
                    totalOptions += quantity * price;
                });


                document.getElementById('totalOptions').textContent = totalOptions.toFixed(2) + ' TND';
                let montantTotal = totalPriceForCar + totalOptions;
                document.getElementById('montantTotal').textContent = montantTotal.toFixed(2) + ' TND';
                document.getElementById('montantTotal2').textContent = montantTotal.toFixed(2) + ' TND';

            }
            document.querySelectorAll('input[name="voiture_id"]').forEach(function(radio) {
                radio.addEventListener('change', updateTotal);
            });

            document.querySelectorAll('.supplement-checkbox').forEach(function(checkbox) {
                checkbox.addEventListener('change', updateTotal);
            });

            document.querySelectorAll('.supplement-quantity').forEach(function(input) {
                input.addEventListener('input', updateTotal);
            });

            // Initialiser le calcul au chargement de la page
            updateTotal();
        });
    </script>
    <style>
        .toggle_pointer_events {
            position: fixed;
            bottom: 0vh;
            background: #053069 !important;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
            right: 12.3vh;
            text-align: center;
            width: 30vh;
        }

        .toggle_pointer_events.scrolled {
            display: none;
        }

        .marketing-box {
            position: absolute;
            top: 22px;
            left: 0;
            padding: 6px 8px;
            color: #fff;
            font-size: 16px;
            background-color: #053069;
            border-top-right-radius: 0px;
            border-bottom-right-radius: 0px;
        }

        .hidden {
            display: none;
        }

        /* Style the indicator (dot/circle) */
        .content-radio .checkmark-radio:after {
            top: 2px;
            left: 2px;
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #fcdd34;
        }



        .switch {
            position: relative;
            display: inline-block;
            vertical-align: top;
            width: 73px;
            height: 26px;
            padding: 3px;
            background-color: white;
            border-radius: 18px;
            cursor: pointer;
        }

        .switch-input {
            position: absolute;
            top: 0;
            left: 0;
            opacity: 0;
        }

        .switch-label {
            position: relative;
            display: block;
            height: inherit;
            font-size: 10px;
            text-transform: uppercase;
            background: #eceeef;
            border-radius: inherit;
            box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.12), inset 0 0 2px rgba(0, 0, 0, 0.15);
            -webkit-transition: 0.15s ease-out;
            -moz-transition: 0.15s ease-out;
            -o-transition: 0.15s ease-out;
            transition: 0.15s ease-out;
            -webkit-transition-property: opacity background;
            -moz-transition-property: opacity background;
            -o-transition-property: opacity background;
            transition-property: opacity background;
        }

        .switch-label:before,
        .switch-label:after {
            position: absolute;
            top: 50%;
            margin-top: -.5em;
            line-height: 1;
            -webkit-transition: inherit;
            -moz-transition: inherit;
            -o-transition: inherit;
            transition: inherit;
        }

        .switch-label:before {
            content: attr(data-off);
            right: 11px;
            color: #aaa;
            text-shadow: 0 1px rgba(255, 255, 255, 0.5);
        }

        .switch-label:after {
            content: attr(data-on);
            left: 11px;
            color: white;
            text-shadow: 0 1px rgba(0, 0, 0, 0.2);
            opacity: 0;
        }

        .switch-input:checked~.switch-label {
            background: #47a8d8;
            box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.15), inset 0 0 3px rgba(0, 0, 0, 0.2);
        }

        .switch-input:checked~.switch-label:before {
            opacity: 0;
        }

        .switch-input:checked~.switch-label:after {
            opacity: 1;
        }

        .switch-handle {
            position: absolute;
            top: 4px;
            left: 4px;
            width: 23px;
            height: 24px;
            background: white;
            border-radius: 10px;
            box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.2);
            background-image: -webkit-linear-gradient(top, white 40%, #f0f0f0);
            background-image: -moz-linear-gradient(top, white 40%, #f0f0f0);
            background-image: -o-linear-gradient(top, white 40%, #f0f0f0);
            background-image: linear-gradient(to bottom, white 40%, #f0f0f0);
            -webkit-transition: left 0.15s ease-out;
            -moz-transition: left 0.15s ease-out;
            -o-transition: left 0.15s ease-out;
            transition: left 0.15s ease-out;
        }

        .switch-handle:before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            margin: -6px 0 0 -6px;
            width: 12px;
            height: 12px;
            background: #f9f9f9;
            border-radius: 6px;
            box-shadow: inset 0 1px rgba(0, 0, 0, 0.02);
            background-image: -webkit-linear-gradient(top, #eeeeee, white);
            background-image: -moz-linear-gradient(top, #eeeeee, white);
            background-image: -o-linear-gradient(top, #eeeeee, white);
            background-image: linear-gradient(to bottom, #eeeeee, white);
        }

        .switch-input:checked~.switch-handle {
            left: 46px;
            box-shadow: -1px 1px 5px rgba(0, 0, 0, 0.2);
        }

        .switch-green>.switch-input:checked~.switch-label {
            background: #669900;
        }

        .box-index {
            height: 140px;
        }

        .img-select-hotel {
            height: 226px;
            object-fit: cover;
            width: 100%;
        }

        .time-holder {
            background: #fcdd34;
            color: #000;
            text-align: center;
            height: 60px;
            line-height: 60px;
            font-size: 18px;
            border-radius: 50% !important;
            width: 60px;
        }

        .person-edit-search {
            top: 45px !important;
        }



        .category-item.effect-1 {
            overflow: hidden;
            position: relative;
        }
    </style>
@endsection
