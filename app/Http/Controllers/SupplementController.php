<?php

namespace App\Http\Controllers;

use App\Models\Supplement;
use Illuminate\Http\Request;

class SupplementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    public function getAllSupplements()
    {
        $supplements = Supplement::all();
        return view('admin.supplements.listSupplement', compact('supplements'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.supplements.addSupplement');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'prix' => 'required|numeric',
            'nbMax' => 'required|numeric',
            'libelle' => 'nullable|string',
        ]);

        $supplement = new Supplement();
        $supplement->libelle = $request->libelle;
        $supplement->nbMax = $request->nbMax;
        $supplement->prix = $request->prix;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->file('image')->storeAs('public/img', $imageName);
            $supplement->image = $imageName;
        }
        $supplement->save();

        return redirect()->route('supplement.listSupplement')->with('success', 'Supplément ajoutée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Supplement $supplement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(supplement $supplement)
    {
        return view('admin.supplements.updateSupplement', compact('supplement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Supplement $supplement)
    {
        $validatedData = $request->validate([
            'prix' => 'required|numeric|min:0',
            'nbMax' => 'required|integer|min:1|max:3',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $supplement->prix = $validatedData['prix'];
        $supplement->nbMax = $validatedData['nbMax'];

        if ($request->hasFile('image')) {

            $imageName = time() . '.' . $request->file('image')->extension();
            $request->file('image')->storeAs('public/img', $imageName);
            if ($supplement->image && file_exists(storage_path('app/public/img/' . $supplement->image))) {
                unlink(storage_path('app/public/img/' . $supplement->image));
            }
            $supplement->image = $imageName;
        }
        $supplement->save();

        return redirect()->route('supplement.listSupplement')->with('success', 'Le supplément a été mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(Supplement $supplement)
    {
        if ($supplement->reservations()->exists()) {
            return redirect()->route('supplement.listSupplement')
                ->with('error', 'Le supplément ne peut pas être supprimé car il est associé à une réservation.');
        }

        if ($supplement->image && file_exists(storage_path('app/public/img/' . $supplement->image))) {
            unlink(storage_path('app/public/img/' . $supplement->image));
        }

        $supplement->delete();

        return redirect()->route('supplement.listSupplement')->with('success', 'Le supplément a été supprimé avec succès.');
    }
}
