@extends('client.layouts.base2')

@section('contenu')
    <div class="container py-5 px-sm-3 px-md-0">
        <h2 class="text-center mb-4">Details sur la réservation</h2>
        <div class="card shadow-sm">
            <div class="card-body">

                <!-- Informations Générales -->
                <table class="table table-bordered">
                    <thead class="thead-light">
                        <tr class="bg-light">
                            <th class="text-center"colspan="6">Informations Générales</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <tr>
                            <th>Lieu de prise en charge</th>
                            <th>Date et heure de location</th>
                            <th>Lieu de retour</th>
                            <th>Date et heure de retour</th>
                            <th>État</th>
                            <th>Total location</th>
                        </tr>
                        <tr>
                            <td>{{ $reservation->lieu_prise }}</td>
                            <td>{{ $reservation->date_location }} à {{ $reservation->heure_location }}</td>
                            <td>{{ $reservation->lieu_retour }}</td>
                            <td>{{ $reservation->date_retour }} à {{ $reservation->heure_retour }}</td>
                            <td>{{ $reservation->etat }}</td>
                            <td>{{ number_format($reservation->montant, 2) }} TND</td>
                        </tr>
                    </tbody>
                </table>

                <!-- Informations sur la Voiture -->
                <table class="table table-bordered mt-4">
                    <thead class="thead-light">
                        <tr class="bg-light">
                            <th class="text-center" colspan="7">Informations sur la Voiture</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <tr>
                            <th>Modèle</th>
                            <th>Catégorie</th>
                            <th>Type carburant</th>
                            <th>Nombre portes</th>
                            <th>Capacité coffre</th>
                            <th>Nombre places</th>
                            <th colspan="6">Type transmission</th>
                        </tr>
                        <tr>
                            <td>{{ $voiture->marque_modele }} - {{ $voiture->annee_fabrication }}</td>
                            <td>{{ $voiture->categorie }}</td>
                            <td>{{ $voiture->type_carburant }}</td>
                            <td>{{ $voiture->nb_portes }}</td>
                            <td>{{ $voiture->capacite_coffre }}</td>
                            <td>{{ $voiture->nb_places }}</td>
                            <td colspan="6">{{ $voiture->type_transmission }}</td>
                        </tr>
                    </tbody>
                </table>

                <!-- Suppléments -->
                @if ($reservation->supplements != null)
                    <table class="table table-bordered mt-4">
                        <thead class="thead-light">
                            <tr class="bg-light">
                                <th class="text-center" colspan="3">Suppléments</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <tr>
                                <th>Supplément</th>
                                <th>Quantité</th>
                                <th>Prix</th>
                            </tr>
                            @foreach ($reservation->supplements as $supplement)
                                <tr>
                                    <td>{{ $supplement->libelle }}</td>
                                    <td>{{ $supplement->pivot->quantite }}</td>
                                    <td>{{ number_format($supplement->pivot->quantite * $supplement->prix, 2) }} TND</td>
                                </tr>
                            @endforeach
                            <tr class="bg-light">
                                <th colspan="2" class="text-right">Total suppléments :</th>
                                <td>{{ number_format($reservation->supplements->sum(fn($supplement) => $supplement->prix * $supplement->pivot->quantite), 2) }}
                                    TND</td>
                            </tr>
                        </tbody>
                    </table>
                @endif

                <!-- Informations sur le Vol -->
                @if ($vol != null)
                    <table class="table table-bordered mt-4">
                        <thead class="thead-light">
                            <tr class="bg-light">
                                <th class="text-center" colspan="2">Informations sur le Vol</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <tr>
                                <th>Numéro de vol</th>
                                <th>horaire du vol</th>
                            </tr>
                            <tr>
                                <td>{{ $vol->numero_vol }}</td>
                                <td>{{ $vol->horaire_vol }}</td>
                            </tr>
                        </tbody>
                    </table>
                @endif

                <!-- Détails Financiers -->
                <table class="table table-bordered mt-4">
                    <thead class="thead-light">
                        <tr class="bg-light">
                            <th class="text-center" colspan="2">Détails Financiers</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <tr>
                            <th>Total location</th>
                            <td>{{ number_format($reservation->montant, 2) }} TND</td>
                        </tr>
                        <tr>
                            <th>Total suppléments</th>
                            <td>{{ number_format($reservation->supplements->sum(fn($supplement) => $supplement->prix * $supplement->pivot->quantite), 2) }}
                                TND</td>
                        </tr>
                        <tr class="bg-light">
                            <th class="text-right">Montant total :</th>
                            <td>{{ number_format($reservation->montant + $reservation->supplements->sum(fn($supplement) => $supplement->prix * $supplement->pivot->quantite), 2) }}
                                TND</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div> <a href="{{ route('listReservations') }}" class="btn btn-secondary mt-3">Retour à la Liste des
            reservations</a>
    </div>
@endsection
