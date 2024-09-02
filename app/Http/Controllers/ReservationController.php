<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Voiture;
use App\Models\Reservation;
use App\Models\Supplement;
use App\Models\Vol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function rechercherVoitures(Request $request)
    {
        /* dd([
            'lieu' => $request->input('lieuPrise'),
            'dateLocation' => $request->input('dateLocation'),
            'heureLocation' => $request->input('heureLocation'),
            'dateRetour' => $request->input('dateRetour'),
            'heureRetour' => $request->input('heureRetour'),
            'lieuRestitution' => $request->input('lieuRes')
        ]);*/
        $lieuPrise = $request->input('lieuPrise');
        $dateLocation = $request->input('dateLocation');
        $heureLocation = $request->input('heureLocation');
        $dateRetour = $request->input('dateRetour');
        $heureRetour = $request->input('heureRetour');
        if ($request->input('lieuRes') == "Lieu restitution") {
            $lieuRes = $lieuPrise;
        } else {
            $lieuRes = $request->input('lieuRes');
        }

        $voitures = Voiture::all();
        return view('client.listVoitures', compact('voitures', 'lieuPrise', 'dateLocation', 'heureLocation', 'dateRetour', 'heureRetour', 'lieuRes'));
    }

    public function store(Request $request)
    {
        // Enregistrer la réservation
        $reservation = new Reservation();
        $reservation->user_id = Auth::id();
        $reservation->voiture_id = $request->input('voiture_id');
        $reservation->lieu_prise = $request->input('lieuPrise');
        $reservation->date_location =  Carbon::createFromFormat('d/m/Y', $request->input('dateLocation'))->format('Y-m-d');

        $reservation->heure_location = $request->input('heureLocation');
        $reservation->lieu_retour = $request->input('lieuRes');
        $reservation->date_retour = Carbon::createFromFormat('d/m/Y', $request->input('dateRetour'))->format('Y-m-d');
        $reservation->heure_retour = $request->input('heureRetour');
        $reservation->etat = 'En attente';
        $reservation->montant =  $request->input('montantTotal');
        $reservation->vol_id = 0;
        $reservation->save();

        // Enregistrer le vol si présent
        if ($request->input('volCheckbox')) {
            if ($request->input('NumVol') != null || $request->input('horaireVol') != null) {
                $vol = new Vol();

                $vol->numero_vol = $request->input('NumVol');
                $vol->horaire_vol = $request->input('horaireVol');

                $vol->save();

                // Associer le vol à la réservation
                $reservation->vol_id = $vol->id;
                $reservation->save();
            }
        }
        if ($request->has('supplement')) {
            foreach ($request->input('supplement') as $id => $quantite) {
                $supplement = Supplement::find($id);
                if ($supplement) {
                    if ($quantite != 0) {
                        $montantSupplement = $supplement->prix * $quantite;
                        // Associer le supplément à la réservation
                        $reservation->supplements()->attach($id, [
                            'quantite' => $quantite,
                            'montant' => $montantSupplement,
                        ]);
                    }
                }
            }
        }
        return view('client.accueil');
    }
}
