<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VoitureController;
use App\Http\Controllers\ConducteurController;
use App\Http\Controllers\TemoignageController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SupplementController;
use App\Models\Reservation;
use App\Models\Supplement;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
/*
Route::get('/reservation1', function () {
    return view('client.reservation');
})->name('reservation1');

Route::get('/reservation', function () {
    return view('client.reservation');
})->name('reservation');*/

Route::get('/', function () {
    return view('client.accueil');
});
Route::get('/base', function () {
    return view('client.layouts.base');
});

Route::get('/search', function () {
    return view('client.layouts.search');
})->name('search');

Route::get('/accueil', function () {
    return view('client.accueil');
})->name('accueil');

Route::get('/contact', function () {
    return view('client.contact');
})->name('contact');

Route::get('/faq', function () {
    return view('client.faq');
})->name('faq');

Route::get('/a-propos', function () {
    return view('client.a-propos');
})->name('a-propos');

//Temoignage 
Route::get('/temoignage', [TemoignageController::class, 'getAllTemoignages'])->name('temoignage');
Route::post('/temoignage', [TemoignageController::class, 'store'])->name('temoignage.store');

Route::post('/notifications/{id}/markAsRead', [NotificationController::class, 'markAsRead'])->name('notifications.markAsRead');

Route::get('/connexion', function () {
    return view('client.connexion');
})->name('connexion');

Route::get('/listVoitures', [VoitureController::class, 'getAllVoitures'])->name('listVoitures');

//réservation
Route::get('/reservation/{id}', [VoitureController::class, 'getVoiture'])->name('reservation');
Route::post('/reservation', [ReservationController::class, 'store'])->name('reservation.store');
Route::get('/listReservations', [ReservationController::class, 'getAllReservations'])->name('listReservations');
Route::get('/reservations/{id}/edit', [ReservationController::class, 'edit'])->name('reservation.edit');
Route::put('/reservations/{id}', [ReservationController::class, 'update'])->name('reservation.update');
Route::get('/reservations/{id}/show', [ReservationController::class, 'show'])->name('reservation.show');
Route::delete('/reservations/{id}', [ReservationController::class, 'destroy'])->name('reservation.destroy');

Route::get('/inscription', function () {
    return view('client.inscription');
})->name('inscription');

Route::post('/conducteur/store', [ConducteurController::class, 'store'])->name('conducteur.store');

Route::get('/rechercher-voitures', [ReservationController::class, 'rechercherVoitures'])->name('rechercherVoitures');
// Routes pour l'authentification Breeze
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
//Admin 
Route::prefix('admin')->group(function () {
    Route::get('/addUser', function () {
        return view('admin.users.addUser');
    })->name('admin.addUser');
    Route::post('/register', [RegisteredUserController::class, 'storeAdmin'])->name('admin.register');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/users', [UserController::class, 'getAllUsers'])->name('user.listUser');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('user.destroy');
});
//Voiture 
Route::prefix('voiture')->group(function () {
    Route::post('/addVoiture', [VoitureController::class, 'addVoiture'])->name('voitures.addVoiture');
    Route::get('/create', [VoitureController::class, 'create'])->name('voiture.create');
    Route::get('/voitures/{id}', [VoitureController::class, 'getDetailsVoiture'])->name('voiture.details');
    Route::get('/', [VoitureController::class, 'getAllVoituresAdmin'])->name('voiture.listVoiture');
    Route::get('/{voiture}/edit', [VoitureController::class, 'edit'])->name('voiture.edit');
    Route::put('/voiture/{id}', [VoitureController::class, 'update'])->name('voiture.update');
    Route::delete('/voitures/{voiture}', [VoitureController::class, 'destroy'])->name('voiture.destroy');
});

//reservationParAdmin 
Route::prefix('reservationAdmin')->group(function () {
    Route::get('/', [ReservationController::class, 'getAllReservationsAdmin'])->name('reservation.listReservation');
    Route::get('/reservations/{id}', [ReservationController::class, 'getDetailsReservation'])->name('reservation.details');
    Route::post('/addReservation', [ReservationController::class, 'addReservation'])->name('reservations.addReservation');
    Route::post('/saveReservation', [ReservationController::class, 'saveReservation'])->name('reservations.saveReservation');
    Route::get('/create', [ReservationController::class, 'createAdmin'])->name('reservation.create');
    Route::get('/admin/rechercherVoitures', [ReservationController::class, 'rechercherVoituresAdmin'])->name('rechercherVoituresAdmin');

    Route::get('/addConducteur', function () {
        return view('admin.reservations.addConducteur');
    })->name('reservation.addConducteur');
    Route::get('/{reservation}/editEtat', [ReservationController::class, 'editEtat'])->name('reservation.editEtat');
    Route::patch('/reservation/{id}', [ReservationController::class, 'updateEtat'])->name('reservation.updateEtat');
    Route::delete('/reservation/{voiture}', [ReservationController::class, 'destroy'])->name('reservation.destroy');
    Route::get('/reservation/{id}/imprimer', [ReservationController::class, 'imprimer'])->name('reservation.imprimer');
    Route::get('/facture', function () {
        return view('admin.reservations.reservationFacture');
    })->name('reservation.reservationFacture');
});

//Suppléments
Route::prefix('supplement')->group(function () {
    Route::get('/', [SupplementController::class, 'getAllSupplements'])->name('supplement.listSupplement');
    Route::get('/create', [SupplementController::class, 'create'])->name('supplement.create');
    Route::post('/addSupplement', [SupplementController::class, 'store'])->name('supplements.addSupplement');
    Route::get('/{supplement}/edit', [SupplementController::class, 'edit'])->name('supplement.edit');
    Route::patch('/supplement/{supplement}', [SupplementController::class, 'update'])->name('supplement.update');
    Route::delete('/supplements/{supplement}', [SupplementController::class, 'destroy'])->name('supplement.destroy');
});
require __DIR__ . '/auth.php';
