<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Vol;
use App\Models\User;
use App\Models\Voiture;
use App\Models\Supplement;
use App\Models\Reservation;
use App\Notifications\ReservationEtatUpdated;
use Illuminate\Http\Request;
//use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ReservationRequestNotification;
use App\Notifications\ReservationUpdatedByClient;
use Barryvdh\DomPDF\Facade\Pdf;

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
        $dateTimeLocation = $dateLocation . ' ' . $heureLocation;
        $dateTimeRetour = $dateRetour . ' ' . $heureRetour;
        $voitures = Voiture::where('disponibilite', 'disponible')
            ->whereDoesntHave('reservations', function ($query) use ($dateTimeLocation, $dateTimeRetour) {
                $query->where(function ($q) use ($dateTimeLocation, $dateTimeRetour) {
                    $q->where(function ($subQuery) use ($dateTimeLocation, $dateTimeRetour) {
                        $subQuery->where('date_location', '<=', $dateTimeRetour)
                            ->where('date_retour', '>=', $dateTimeLocation);
                    });
                });
            })
            ->get();
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
        //notifi
        $admins = User::where('role', 1)->get();
        Notification::send($admins, new ReservationRequestNotification($reservation));
        //$user = user::first();
        // $user::notify(new ReservationRequestNotification($reservation)); // Assurez-vous de récupérer l'administrateur

        return redirect()->route('listReservations')->with('success', 'Votre demande de réservation a été envoyée avec succès.');
    }
    public function getAllReservations()
    {
        $reservations = Reservation::where('user_id', auth()->id())->get();
        return view('client.reservation.listreservation', compact('reservations'));
    }

    public function show($id)
    {
        $reservation = Reservation::find($id);
        $supplements = $reservation->supplements;
        $vol = $reservation->vol_id ? Vol::find($reservation->vol_id) : null;
        $voiture = $reservation->voiture;
        return view('client.reservation.consulterReservation', [
            'reservation' => $reservation,
            'supplements' => $supplements,
            'vol' => $vol,
            'voiture' => $voiture,
        ]);
    }

    public function edit($id)
    {
        $reservation = Reservation::with('supplements')->findOrFail($id);
        $supplements = Supplement::all();
        $vol = $reservation->vol_id ? Vol::find($reservation->vol_id) : null;
        $voiture = $reservation->voiture;
        $user = $reservation->user;

        // Assurez-vous que le format de date est correct dans la base de données
        $dateLocationCarbon = Carbon::createFromFormat('Y-m-d', $reservation->date_location);
        $dateRetourCarbon = Carbon::createFromFormat('Y-m-d', $reservation->date_retour);

        $diffInDays = $dateLocationCarbon->diffInDays($dateRetourCarbon);
        $prixTot = $voiture ? $voiture->prix * $diffInDays : 0;

        $totalSupplements = $reservation->supplements->reduce(function ($carry, $supplement) {
            return $carry + ($supplement->pivot->quantite * $supplement->prix);
        }, 0);

        return view('client.reservation.editReservation', compact('reservation', 'supplements', 'vol', 'voiture', 'user', 'diffInDays', 'prixTot', 'totalSupplements'));
    }

    public function update(Request $request, $id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->update($request->all());
        if ($request->has('supplement')) {
            $existingSupplementIds = $reservation->supplements->pluck('id')->toArray();

            // Mettre à jour ou supprimer les suppléments existants
            foreach ($request->input('supplement') as $supplementId => $quantite) {
                $supplement = Supplement::find($supplementId);
                $montantSupplement = $supplement ? $supplement->prix * $quantite : 0;

                if ($quantite > 0) {
                    if (in_array($supplementId, $existingSupplementIds)) {
                        $reservation->supplements()->updateExistingPivot($supplementId, [
                            'quantite' => $quantite,
                            'montant' => $montantSupplement
                        ]);
                    } else {
                        $reservation->supplements()->attach($supplementId, [
                            'quantite' => $quantite,
                            'montant' => $montantSupplement
                        ]);
                    }
                } else {
                    $reservation->supplements()->detach($supplementId);
                }
            }
        }
        if ($request->has('supplement-checkbox')) {
            foreach ($request->input('supplement-checkbox') as $supplementId) {
                $supplement = Supplement::find($supplementId);
                $montantSupplement = $supplement ? $supplement->prix : 0;
                $existingSupplement = $reservation->supplements()->where('supplement_id', $supplementId)->first();
                if (!$existingSupplement) {
                    $reservation->supplements()->attach($supplementId, [
                        'quantite' => 1,
                        'montant' => $montantSupplement
                    ]);
                }
            }
        }
        if ($request->input('volCheckbox')) {
            if ($request->input('NumVol') != null || $request->input('horaireVol') != null) {

                if ($reservation->vol) {
                    $vol = $reservation->vol;
                    $vol->numero_vol = $request->input('NumVol');
                    $vol->horaire_vol = $request->input('horaireVol');
                    $vol->save();
                } else {
                    $vol = new Vol();
                    $vol->numero_vol = $request->input('NumVol');
                    $vol->horaire_vol = $request->input('horaireVol');
                    $vol->save();

                    $reservation->vol_id = $vol->id;
                }
            }

            $reservation->save();
        } else {
            $volIds = Reservation::where('id', $id)->pluck('vol_id');
            Vol::whereIn('id', $volIds)->delete();
        }
        $admins = User::where('role', 1)->get();
        Notification::send($admins, new ReservationUpdatedByClient($reservation));
        return redirect()->route('listReservations')->with('success', 'Réservation mise à jour avec succès.');
    }

    public function destroy($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();
        return redirect()->route('listReservations')->with('success', 'Réservation supprimée avec succès.');
    }

    //Admin 
    public function getAllReservationsAdmin()
    {
        $reservations = Reservation::all();
        return view('admin.reservations.listreservation', compact('reservations'));
    }
    public function getDetailsReservation($id)
    {
        $reservation = Reservation::find($id);
        return view('admin.reservations.DetailsReservation', compact('reservation'));
    }
    public function addReservation(Request $request)
    {

        $user = User::where('email', $request->input('email'))->first();

        if (!$user) {
            return redirect()->back()->withErrors(['email' => 'Utilisateur non trouvé.']);
        }

        $reservation = new Reservation();
        $reservation->user_id = $user->id;
        $reservation->voiture_id = $request->input('voiture_id');
        $reservation->lieu_prise = $request->input('lieuPrise');
        $reservation->date_location = Carbon::createFromFormat('d/m/Y', $request->input('dateLocation'))->format('Y-m-d');
        $reservation->heure_location = $request->input('heureLocation');
        $reservation->lieu_retour = $request->input('lieuRes');
        $reservation->date_retour = Carbon::createFromFormat('d/m/Y', $request->input('dateRetour'))->format('Y-m-d');
        $reservation->heure_retour = $request->input('heureRetour');
        $reservation->etat = 'En attente';
        $dateLocationCarbon = Carbon::createFromFormat('d/m/Y', $request->input('dateLocation'));
        $dateRetourCarbon = Carbon::createFromFormat('d/m/Y', $request->input('dateRetour'));

        // Calculer la différence en jours
        $diffInDays = $dateLocationCarbon->diffInDays($dateRetourCarbon);

        $reservation->montant = $diffInDays * Voiture::find($request->input('voiture_id'))->prix;
        $reservation->vol_id = 0;
        $reservation->save();

        if ($request->input('volCheckbox')) {
            if ($request->input('NumVol') != null || $request->input('horaireVol') != null) {
                $vol = new Vol();
                $vol->numero_vol = $request->input('NumVol');
                $vol->horaire_vol = $request->input('horaireVol');
                $vol->save();

                $reservation->vol_id = $vol->id;
                $reservation->save();
            }
        }


        if ($request->has('supplement')) {
            foreach ($request->input('supplement') as $id => $quantite) {
                $supplement = Supplement::find($id);
                if ($supplement && $quantite != 0) {
                    $montantSupplement = $supplement->prix * $quantite;
                    $reservation->supplements()->attach($id, [
                        'quantite' => $quantite,
                        'montant' => $montantSupplement,
                    ]);
                }
            }
        }

        $reservations = Reservation::all();
        return view('admin.reservations.listreservation', compact('reservations'))->with('success', 'Réservation créée avec succès.');
    }
    public function createAdmin()
    {
        return view('admin.reservations.addReservation');
    }
    public function  rechercherVoituresAdmin(Request  $request)
    {
        $email = $request->input('email');
        $user = User::where('email', $email)->first();
        if (!$user) {
            return redirect()->back()->withErrors(['email' => 'Cet email ne correspond à aucun conducteur. Veuillez vérifier votre saisie.'])->withInput();
        }

        $lieuPrise = $request->input('lieuPrise');
        $dateLocation = $request->input('dateLocation');
        $heureLocation = $request->input('heureLocation');
        $lieuRes = $request->input('lieuRes');
        $dateRetour = $request->input('dateRetour');
        $heureRetour = $request->input('heureRetour');
        $voitures = Voiture::where('disponibilite', 'disponible')->get();

        $dateLocationCarbon = Carbon::createFromFormat('d/m/Y', $dateLocation);
        $dateRetourCarbon = Carbon::createFromFormat('d/m/Y', $dateRetour);
        $diffInDays = $dateLocationCarbon->diffInDays($dateRetourCarbon);
        $supplements = Supplement::all();
        return view('admin.reservations.saveReservation', compact('voitures', 'diffInDays', 'supplements', 'lieuPrise', 'dateLocation', 'heureLocation', 'lieuRes', 'dateRetour', 'heureRetour', 'email'));
    }
    public function editEtat($id)
    {
        $reservation = Reservation::findOrFail($id);
        return view('admin.reservations.updateEtatReservation', compact('reservation'));
    }
    public function updateEtat(Request $request, $id)
    {

        $reservation = Reservation::findOrFail($id);
        $reservation->etat = $request->input('etat');
        if ($reservation->etat == "accepte") {
            $reservation->voiture->disponibilite = "non disponible";
            $reservation->voiture->save();
        } else {
            $reservation->voiture->disponibilite = "disponible";
            $reservation->voiture->save();
        }
        $reservation->save();
        Notification::send($reservation->user, new ReservationEtatUpdated($reservation));
        return redirect()->route('reservation.listReservation', $id)->with('success', 'L\'état de la réservation a été mis à jour avec succès.');
    }

    public function imprimer($id)
    {
        $reservation = Reservation::with(['user', 'voiture', 'supplements', 'vol'])->findOrFail($id);
        $pdf = PDF::loadView('admin.reservations.reservationFacture', compact('reservation'));
        return $pdf->download('reservation_details.pdf');
    }
}
