<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/base', function () {
    return view('client.layouts.base');
});

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
Route::get('/temoignage', function () {
    return view('client.temoignage');
})->name('temoignage');
Route::get('/connexion', function () {
    return view('client.connexion');
})->name('connexion');

