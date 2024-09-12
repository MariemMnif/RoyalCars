<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\User;
use App\Models\Voiture;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        //client
        $totalClientsInscrits = User::where('role', 0)->distinct()->count();
        $activeClients = User::whereHas('reservations', function ($query) {
            $query->where('date_retour', '>=', now()->subDays(30));
        })->count();
        $nouveauxClientsParMois = User::where('role', 0)
            ->whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->count();

        $totalReservations = Reservation::count();

        $voitureStats = Voiture::withCount('reservations')
            ->orderBy('reservations_count', 'desc')
            ->take(3)
            ->get();
        $reservations = Reservation::with(['user', 'voiture'])->get();

        // Réservations 
        $AVenirReservations = Reservation::where('etat', 'accepte')
            ->where('date_location', '>=', now())->count();
        $activeReservations = Reservation::where('date_retour', '>=', now())->where('etat', 'accepte')->count();
        $pastReservations = Reservation::where('date_retour', '<', now())->where('etat', 'accepte')->count();
        $refuseReservations = Reservation::where('etat', 'refuse')->count();
        $traitementReservations = Reservation::where('etat', 'en cours de traitement')->count();
        //voitures
        $totalVoitures = Voiture::count();
        $today = now()->format('Y-m-d');
        $voituresIdsAvecReservationAujourdHui = Reservation::where('etat', 'acceptée')
            ->where(function ($query) use ($today) {
                $query->whereRaw('? BETWEEN date_location AND date_retour', [$today])
                    ->orWhereRaw('date_location <= ? AND date_retour >= ?', [$today, $today]);
            })
            ->pluck('voiture_id')
            ->unique();
        $nombreVoituresAvecReservationAujourdHui = Voiture::whereIn('id', $voituresIdsAvecReservationAujourdHui)->count();



        $availableCars = Voiture::where('disponibilite', 'disponible')->count();
        //  $reservedCars = $totalCars - $availableCars;

        // Statistiques Financières
        $totalPayments = Reservation::sum('montant');
        $averageRevenuePerReservation = Reservation::avg('montant');
        $revenueByCarType = Voiture::select('categorie', DB::raw('SUM(reservations.montant) as total_revenue'))
            ->join('reservations', 'voitures.id', '=', 'reservations.voiture_id')
            ->groupBy('categorie')
            ->get();



        return view('admin.dashboard', compact(
            'totalReservations',
            'totalVoitures',
            'nombreVoituresAvecReservationAujourdHui',
            'voitureStats',
            'reservations',
            'activeReservations',
            'pastReservations',
            'availableCars',
            'totalPayments',
            'averageRevenuePerReservation',
            'revenueByCarType',
            'totalClientsInscrits',
            'activeClients',
            'nouveauxClientsParMois',
            'AVenirReservations',
            'refuseReservations',
            'traitementReservations'

        ));
    }
}
