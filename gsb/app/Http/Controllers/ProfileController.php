<?php

namespace App\Http\Controllers;

use App\Models\Visiteur;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit()
    {
        if (! session('loggedin')) {
            return redirect('/login');
        }

        $visiteur = Visiteur::where('VIS_MATRICULE', session('matricule'))->first();

        return view('profile.edit', compact('visiteur'));
    }

    public function update(Request $request)
    {
        if (! session('loggedin')) {
            return redirect('/login');
        }

        // For now, profile is read-only, as per original
        return back()->with('success', 'Profil consulté.');
    }
}
