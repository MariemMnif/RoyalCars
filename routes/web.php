<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VoitureController;
use App\Http\Controllers\ConducteurController;
use App\Http\Controllers\TemoignageController;
use App\Http\Controllers\ReservationController;

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

Route::get('/connexion', function () {
    return view('client.connexion');
})->name('connexion');

Route::get('/listVoitures', [VoitureController::class, 'getAllVoitures'])->name('listVoitures');
Route::get('/reservation/{id}', [VoitureController::class, 'getVoiture'])->name('reservation');
Route::post('/reservation', [ReservationController::class, 'store'])->name('reservation.store');



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

require __DIR__ . '/auth.php';
