<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Voiture;
use App\Models\Supplement;
use Illuminate\Http\Request;

class VoitureController extends Controller
{
    public function getAllVoitures()
    {

        /* Voiture::create([
            'marque_modele' => 'Hyundai Grand I10',
            'annee_fabrication' => 2024,
            'etat' => 'neuf',
            'type_transmission' => 'manuelle',
            'type_carburant' => 'essence',
            'categorie' => 'citadine',
            'nb_portes' => 5,
            'nb_places' => 5,
            'capacite_coffre' => 2,
            'description' => '',
            'image' => 'car-rent-4.png',
            'disponibilite' => 'disponible',
            'prix' => 150
        ]);
        Voiture::create([
            'marque_modele' => 'Skoda Fabia',
            'annee_fabrication' => 2022,
            'etat' => 'neuf',
            'type_transmission' => 'manuelle',
            'type_carburant' => 'essence',
            'categorie' => 'citadine',
            'nb_portes' => 5,
            'nb_places' => 5,
            'capacite_coffre' => 2,
            'description' => '  TVA / Taxes locales (18%)
                                        Assurrances de base (RC, Incendie)
                                        Surcharge aéroport : 
                                        KM illimité',
            'image' => 'car-rent-4.png',
            'disponibilite' => 'disponible',
            'prix' => 150
        ]);*/



        $voitures = Voiture::all();
        return view('client.listVoitures', compact('voitures'));
    }
    public function getVoiture($id, Request $request)
    {

        $lieuPrise = $request->query('lieuPrise');
        $dateLocation = $request->query('dateLocation');
        $heureLocation = $request->query('heureLocation');
        $dateRetour = $request->query('dateRetour');
        $heureRetour = $request->query('heureRetour');
        if ($request->query('lieuRes') == "Lieu restitution") {
            $lieuRes = $lieuPrise;;
        } else {
            $lieuRes = $request->query('lieuRes');
        }

        $dateLocation1 = Carbon::createFromFormat('d/m/Y', '30/09/2024');
        $dateRetour1 = Carbon::createFromFormat('d/m/Y', '04/10/2024');

        $diffInDays = $dateLocation1->diffInDays($dateRetour1);
        // Vérifier si au moins un champ est vide
        if (empty($lieuPrise) || empty($dateLocation) || empty($heureLocation) || empty($dateRetour) || empty($heureRetour) || empty($lieuRes)) {
            // Rediriger l'utilisateur vers le haut de la page pour qu'il remplisse les champs
            return back()->withInput()->with('error', 'Merci de compléter ou de remplir tous les champs du formulaire de recherche pour continuer.');
        }
        $voiture = Voiture::findOrFail($id);

        // Convertir les dates en objets Carbon en utilisant le format d'entrée attendu
        $dateLocationCarbon = Carbon::createFromFormat('d/m/Y', $dateLocation);
        $dateRetourCarbon = Carbon::createFromFormat('d/m/Y', $dateRetour);

        // Calculer la différence en jours
        $diffInDays = $dateLocationCarbon->diffInDays($dateRetourCarbon);
        $prixTot = $voiture->prix * $diffInDays;

        /* Supplement::create([
            'image' => 'rehausseur.png',
            'libelle' => 'Rehausseur(24-42 Mois)',
            'prix' => 20.00,
            'nbMax' => 3,
        ]);
        Supplement::create([
            'image' => 'landau.png',
            'libelle' => 'Landau (1-12 mois)',
            'prix' => 20.00,
            'nbMax' => 3,
        ]);
        Supplement::create([
            'image' => 'pleinCarburant.png',
            'libelle' => 'Plein Carburant',
            'prix' => 150.00,
            'nbMax' => 1,
        ]);
        Supplement::create([
            'image' => 'optionGPS.png',
            'libelle' => 'Terminal GPS',
            'prix' => 10.00,
            'nbMax' => 1,
        ]);*/
        $supplements = Supplement::all();
        return view('client.reservation', compact('voiture', 'supplements', 'lieuPrise', 'dateLocation', 'heureLocation', 'dateRetour', 'heureRetour', 'lieuRes', 'diffInDays', 'prixTot'));
    }
}
