<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getAllUsers()
    {
        $users = User::where('role', 1)->get();
        return view('admin.users.listUser', compact('users'));
    }
    public function edit(User $user)
    {
        return view('admin.users.editUser', compact('user'));
    }


    public function update(Request $request, User $user)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'telephone' => ['required', 'string', 'unique:users,telephone,' . $user->id],
            'date_naissance' => ['required', 'date_format:d/m/Y'],
        ]);

        $user->update([
            'first_name' => $request->first_name,
            'name' => $request->name,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'date_naissance' => Carbon::createFromFormat('d/m/Y', $request->input('date_naissance'))->format('Y-m-d'),
        ]);

        return redirect()->route('user.listUser')->with('success', 'Utilisateur mis à jour avec succès');
    }


    public function destroy(User $user)
    {
        if ($user->reservations()->exists()) {
            return redirect()->route('user.listUser')->with('error', 'L\'utilisateur ne peut pas être supprimé car il a des réservations associées.');
        }
        $user->delete();
        return redirect()->route('user.listUser')->with('success', 'Utilisateur supprimé avec succès');
    }
}
