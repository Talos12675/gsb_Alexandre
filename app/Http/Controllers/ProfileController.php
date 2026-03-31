<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visiteur;

class ProfileController extends Controller
{
    public function edit()
    {
        if (!session('loggedin')) {
            return redirect('/login');
        }
        
        $visiteur = Visiteur::where('VIS_MATRICULE', session('matricule'))->first();
        return view('profile.edit', compact('visiteur'));
    }

    public function update(Request $request)
    {
        if (!session('loggedin')) {
            return redirect('/login');
        }
        
        $visiteur = Visiteur::where('VIS_MATRICULE', session('matricule'))->firstOrFail();

        $request->validate([
            'VIS_NOM' => 'required|string|max:25',
            'Vis_PRENOM' => 'nullable|string|max:50',
            'VIS_ADRESSE' => 'nullable|string|max:50',
            'VIS_CP' => 'nullable|string|max:5',
            'VIS_VILLE' => 'nullable|string|max:30',
            'SEC_CODE' => 'nullable|string|max:1',
            'LAB_CODE' => 'nullable|string|max:2',
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $visiteur->update(
            $request->only([
                'VIS_NOM',
                'Vis_PRENOM',
                'VIS_ADRESSE',
                'VIS_CP',
                'VIS_VILLE',
                'SEC_CODE',
                'LAB_CODE',
            ])
        );

        // If password was provided, save it (mutator will hash it)
        if ($request->filled('password')) {
            $visiteur->VIS_PASSWORD = $request->password;
            $visiteur->save();
        }

        // Update session values used across the app
        session([
            'nom' => $visiteur->VIS_NOM,
            'prenom' => $visiteur->Vis_PRENOM,
        ]);

        return back()->with('success', 'Profil mis à jour avec succès.');
    }
}