<?php

namespace App\Http\Controllers;

use App\Models\Conducteur;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ConducteurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('conducteur.inscription');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Créer un nouveau conducteur avec les données validées
        $conducteur = new Conducteur();
        $conducteur->gendre = $request->input('gendre');
        $conducteur->nom = $request->input('nom');
        $conducteur->prenom = $request->input('prenom');
        $conducteur->email = $request->input('email');
        $conducteur->mdp = Hash::make($request->input('mdp'));
        $conducteur->telephone = $request->input('telephone');
        $conducteur->date_naissance = Carbon::createFromFormat('d/m/Y', $request->input('date_naissance'))->format('Y-m-d');
        $conducteur->date_permis = Carbon::createFromFormat('d/m/Y', $request->input('date_permis'))->format('Y-m-d');

        $conducteur->save();
        return redirect()->route('accueil');
    }

    /**
     * Display the specified resource.
     */
    public function show(Conducteur $conducteur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Conducteur $conducteur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Conducteur $conducteur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Conducteur $conducteur)
    {
        //
    }
}
