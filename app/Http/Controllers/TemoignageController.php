<?php

namespace App\Http\Controllers;

use App\Models\Temoignage;
use Illuminate\Http\Request;

class TemoignageController extends Controller
{

    public function getAllTemoignages()
    {
        $temoignages = Temoignage::all();
        return view('client.temoignage', compact('temoignages'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'etoiles' => 'required|integer|min:1|max:5',
            'avis' => 'required|string|max:500',
        ]);
        $temoignage = new Temoignage();
        $temoignage->etoiles = $request->etoiles;
        $temoignage->avis = $request->avis;
        $temoignage->user_id = auth()->id();
        $temoignage->save();
        return redirect()->back()->with('success', 'Merci pour votre avis!');
    }
}
