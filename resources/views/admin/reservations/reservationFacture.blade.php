<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facture de Réservation</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <style>
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            margin: 20px auto;
        }

        .invoice-header {
            display: flex;
            justify-content: space-between;
            align-items: center;

        }

        .invoice-header h1 {
            font-size: 22px;
        }

        .invoice-date {
            font-size: 20px;
            color: #666;
            text-align: right;
            margin-top: 0px;
        }

        .invoice-title {
            text-align: center;
            font-size: 22px;
        }

        .invoice-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }

        .invoice-table th,
        .invoice-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        .invoice-table th {
            background-color: #f4f4f4;
            font-weight: bold;
        }

        .invoice-total {
            font-weight: bold;
            font-size: 16px;
        }

        .btn-print {
            margin: 20px 0;
            text-align: center;
        }

        .btn-print a {
            padding: 10px 20px;
            font-size: 14px;
            color: #fff;
            background-color: #007bff;
            text-decoration: none;
            border-radius: 4px;
        }

        .signature {
            margin-top: 20px;
            font-size: 14px;
            font-weight: bold;
            text-align: right;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- En-tête -->
        <div class="invoice-header">
            <div class="invoice-date">
                {{ \Carbon\Carbon::now()->format('d/m/Y') }}
            </div>
        </div>
        <div class="invoice-title">
            <h1>Facture de Réservation</h1>
        </div>

        <!-- Informations Générales -->
        <h3>Informations Générales</h3>
        <table class="invoice-table">
            <tbody>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Date de Naissance</th>
                    <th>Date de Délivration de Permis</th>
                </tr>
                <tr>
                    <td>{{ $reservation->user->name }}</td>
                    <td>{{ $reservation->user->first_name }}</td>
                    <td>{{ $reservation->user->email }}</td>
                    <td>{{ $reservation->user->telephone }}</td>
                    <td>{{ $reservation->user->date_naissance }}</td>
                    <td>{{ $reservation->user->date_permis }}</td>
                </tr>
            </tbody>
        </table>

        <!-- Détails de la Réservation -->
        <h3>Détails de la Réservation</h3>
        <table class="invoice-table">
            <tbody>
                <tr>
                    <th>Lieu de Prise en Charge</th>
                    <th>Date et Heure de Location</th>
                    <th>Lieu de Retour</th>
                    <th>Date et Heure de Retour</th>
                    <th>État</th>
                    <th>Total Location</th>
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
        <h3>Informations sur la Voiture</h3>
        <table class="invoice-table">
            <tbody>
                <tr>
                    <th>Modèle</th>
                    <th>Catégorie</th>
                    <th>Type Carburant</th>
                    <th>Nombre de Portes</th>
                    <th>Capacité du Coffre</th>
                    <th>Nombre de Places</th>
                    <th>Type de Transmission</th>
                </tr>
                <tr>
                    <td>{{ $reservation->voiture->marque_modele }} - {{ $reservation->voiture->annee_fabrication }}
                    </td>
                    <td>{{ $reservation->voiture->categorie }}</td>
                    <td>{{ $reservation->voiture->type_carburant }}</td>
                    <td>{{ $reservation->voiture->nb_portes }}</td>
                    <td>{{ $reservation->voiture->capacite_coffre }}</td>
                    <td>{{ $reservation->voiture->nb_places }}</td>
                    <td>{{ $reservation->voiture->type_transmission }}</td>
                </tr>
            </tbody>
        </table>

        <!-- Suppléments -->
        @if ($reservation->supplements->count())
            <h3>Suppléments</h3>
            <table class="invoice-table">
                <tbody>
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
                    <tr class="invoice-total">
                        <td colspan="2" class="text-right">Total Suppléments :</td>
                        <td>{{ number_format($reservation->supplements->sum(fn($supplement) => $supplement->prix * $supplement->pivot->quantite), 2) }}
                            TND</td>
                    </tr>
                </tbody>
            </table>
        @endif

        <!-- Informations sur le Vol -->
        @if ($reservation->vol_id != 0)
            <h3>Informations sur le Vol</h3>
            <table class="invoice-table">
                <tbody>
                    <tr>
                        <th>Numéro de Vol</th>
                        <th>Heure de Vol</th>
                    </tr>
                    <tr>
                        <td>{{ $reservation->vol->numero_vol }}</td>
                        <td>{{ $reservation->vol->horaire_vol }}</td>
                    </tr>
                </tbody>
            </table>
        @endif

        <!-- Détails Financiers -->
        <h3>Détails Financiers</h3>
        <table class="invoice-table">
            <tbody>
                <tr>
                    <th>Total Location</th>
                    <th>Total Suppléments</th>
                    <th>Total Facture</th>
                </tr>
                <tr>
                    <td>{{ number_format($reservation->montant, 2) }} TND</td>
                    <td>{{ number_format($reservation->supplements->sum(fn($supplement) => $supplement->prix * $supplement->pivot->quantite), 2) }}
                        TND</td>
                    <td>{{ number_format($reservation->montant + $reservation->supplements->sum(fn($supplement) => $supplement->prix * $supplement->pivot->quantite), 2) }}
                        TND</td>
                </tr>
            </tbody>
        </table>

        <!-- Pied de Page -->
        <div class="invoice-footer">
            <p>Merci pour votre réservation. Si vous avez des questions, veuillez nous contacter.</p>
            <div class="signature">
                <p>Signature de l'agence</p>
            </div>
        </div>
    </div>


</body>

</html>
