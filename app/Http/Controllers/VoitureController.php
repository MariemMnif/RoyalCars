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

    public function getAllVoituresAdmin()
    {
        $voitures = Voiture::all();
        return view('admin.voitures.listVoitures', compact('voitures'));
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
        return view('client.reservation.reservation', compact('voiture', 'supplements', 'lieuPrise', 'dateLocation', 'heureLocation', 'dateRetour', 'heureRetour', 'lieuRes', 'diffInDays', 'prixTot'));
    }

    public function create()
    {
        return view('admin.voitures.addVoiture');
    }
    public function addVoiture(Request $request)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'marque_modele' => 'required|string|max:255',
            'annee_fabrication' => 'required|integer',
            'etat' => 'required|string|max:255',
            'type_transmission' => 'required|string',
            'nb_places' => 'required|integer',
            'categorie' => 'required|string',
            'type_carburant' => 'required|string',
            'disponibilite' => 'required|string',
            'prix' => 'required|numeric',
            'description' => 'nullable|string',
        ]);

        $voiture = new Voiture();
        $voiture->marque_modele = $request->marque_modele;
        $voiture->annee_fabrication = $request->annee_fabrication;
        $voiture->etat = $request->etat;
        $voiture->type_transmission = $request->type_transmission;
        $voiture->nb_places = $request->nb_places;
        $voiture->nb_portes = $request->nb_portes;
        $voiture->categorie = $request->categorie;
        $voiture->capacite_coffre = $request->capacite_coffre;
        $voiture->type_carburant = $request->type_carburant;
        $voiture->disponibilite = $request->disponibilite;
        $voiture->prix = $request->prix;
        $voiture->description = $request->description;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->file('image')->storeAs('public/img', $imageName);
            $voiture->image = $imageName;
        }
        $voiture->save();

        return redirect()->route('voiture.listVoiture')->with('success', 'Voiture ajoutée avec succès.');
    }
    public function getDetailsVoiture($id)
    {
        $voiture = Voiture::where('id', $id)->first();
        return view('admin.voitures.DetailsVoiture', compact('voiture'));
    }

    public function edit($id)
    {
        $voiture = Voiture::findOrFail($id);
        return view('admin.voitures.editVoiture', compact('voiture'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'marque_modele' => 'required|string|max:255',
            'annee_fabrication' => 'required|integer|min:1900|max:' . date('Y'),
            'etat' => 'required|string|max:255',
            'type_transmission' => 'nullable|string|max:255',
            'nb_places' => 'required|integer|min:1',
            'categorie' => 'nullable|string|max:255',
            'type_carburant' => 'nullable|string|max:255',
            'disponibilite' => 'required|string|in:Disponible,Non disponible',
            'prix' => 'required|numeric|min:0',
            'description' => 'nullable|string|max:1000',
        ]);


        $voiture = Voiture::findOrFail($id);

        $voiture->marque_modele = $request->input('marque_modele');
        $voiture->annee_fabrication = $request->input('annee_fabrication');
        $voiture->etat = $request->input('etat');
        $voiture->type_transmission = $request->input('type_transmission');
        $voiture->nb_places = $request->input('nb_places');
        $voiture->categorie = $request->input('categorie');
        $voiture->capacite_coffre = $request->input('capacite_coffre');
        $voiture->type_carburant = $request->input('type_carburant');
        $voiture->disponibilite = $request->input('disponibilite');
        $voiture->prix = $request->input('prix');
        $voiture->description = $request->input('description');


        if ($request->hasFile('image')) {

            $imageName = time() . '.' . $request->file('image')->extension();
            $request->file('image')->storeAs('public/img', $imageName);
            if ($voiture->image && file_exists(storage_path('app/public/img/' . $voiture->image))) {
                unlink(storage_path('app/public/img/' . $voiture->image));
            }
            $voiture->image = $imageName;
        }
        $voiture->save();
        return redirect()->route('voiture.listVoiture')->with('success', 'Voiture mise à jour avec succès.');
    }
    public function destroy(Voiture $voiture)
    {
        if ($voiture->reservations()->exists()) {
            return redirect()->route('voiture.listVoiture')->with('error', 'La voiture ne peut pas être supprimée car elle est associée à une  réservation.');
        }
        if ($voiture->image && file_exists(storage_path('app/public/img/' . $voiture->image))) {
            unlink(storage_path('app/public/img/' . $voiture->image));
        }
        $voiture->delete();
        return redirect()->route('voiture.listVoiture')->with('success', 'Voiture supprimé avec succès');
    }
}
