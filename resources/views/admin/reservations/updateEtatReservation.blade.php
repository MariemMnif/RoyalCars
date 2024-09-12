@extends('admin.layouts.baseAdmin')
@section('contenu')
    <div class="container py-5 px-sm-3 px-md-0">

        <div class="card shadow-sm">
            <div class="card-body">
                <h2 class="text-center mb-4">Details sur la réservation</h2>
                <table class="table table-bordered">
                    <thead class="thead-light">
                        <tr class="bg-light">
                            <th class="text-center"colspan="6">Informations sur le conducteur</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <tr>
                            <th>nom</th>
                            <th>prénom</th>
                            <th>email</th>
                            <th>telephone</th>
                            <th>date de naissance</th>
                            <th>Date de délivration de permis</th>
                        </tr>
                        <tr>
                            <td>{{ $reservation->user->first_name }}</td>
                            <td>{{ $reservation->user->name }}</td>
                            <td>{{ $reservation->user->email }}</td>
                            <td>{{ $reservation->user->telephone }}</td>
                            <td>{{ $reservation->user->date_naissance }}</td>
                            <td>{{ $reservation->user->date_permis }} </td>
                        </tr>
                    </tbody>
                </table>
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
                            <td>
                                <form action="{{ route('reservation.updateEtat', $reservation->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <select name="etat" class="form-control mb-2">
                                        <option value="en attente"
                                            {{ $reservation->etat == 'en attente' ? 'selected' : '' }}>En attente</option>
                                        <option value="refuse" {{ $reservation->etat == 'refuse' ? 'selected' : '' }}>
                                            Refusé</option>
                                        <option value="accepte" {{ $reservation->etat == 'accepte' ? 'selected' : '' }}>
                                            Accepté</option>
                                        <option value="en cours de traitement"
                                            {{ $reservation->etat == 'en cours de traitement' ? 'selected' : '' }}>En cours
                                            de traitement</option>
                                    </select>
                                    <button type="submit" class="btn btn-primary">Mettre à jour l'état</button>
                                </form>
                            </td>
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
                            <td>{{ $reservation->voiture->marque_modele }} -
                                {{ $reservation->voiture->annee_fabrication }}
                            </td>
                            <td>{{ $reservation->voiture->categorie }}</td>
                            <td>{{ $reservation->voiture->type_carburant }}</td>
                            <td>{{ $reservation->voiture->nb_portes }}</td>
                            <td>{{ $reservation->voiture->capacite_coffre }}</td>
                            <td>{{ $reservation->voiture->nb_places }}</td>
                            <td colspan="6">{{ $reservation->voiture->type_transmission }}</td>
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

                @if ($reservation->vol_id != 0)
                    <table class="table table-bordered mt-4">
                        <thead class="thead-light">
                            <tr class="bg-light">
                                <th class="text-center" colspan="2">Informations sur le Vol</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <tr>
                                <th>Numéro de vol</th>
                                <th>Heure de location</th>
                            </tr>

                            <tr>
                                <td>{{ $reservation->vol->numero_vol }}</td>
                                <td>{{ $reservation->vol->horaire_vol }}</td>
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
        </div>
        <a href="{{ route('reservation.listReservation') }}" class="btn btn-secondary mt-3">Retour à la Liste des
            Réservations</a>
    </div>
@endsection
