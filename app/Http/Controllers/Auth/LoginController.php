<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use App\Models\Visiteur;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'matricule' => 'required|string',
            'password' => 'required',
        ]);

        $visiteur = Visiteur::where('VIS_MATRICULE', $request->matricule)->first();

        if ($visiteur && Hash::check($request->password, $visiteur->VIS_PASSWORD)) {
            session([
                'loggedin' => true,
                'matricule' => $visiteur->VIS_MATRICULE,
                'nom' => $visiteur->VIS_NOM,
                'prenom' => $visiteur->VIS_PRENOM,
            ]);

            Log::channel('login')->info('Connexion réussie', [
                'matricule' => $visiteur->VIS_MATRICULE,
                'ip' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);

            return redirect()->route('dashboard');
        }

        Log::channel('login')->warning('Échec de connexion', [
            'matricule' => $request->matricule,
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        throw ValidationException::withMessages([
            'matricule' => ['Les informations d\'identification fournies ne correspondent pas à nos enregistrements.'],
        ]);
    }

    public function logout(Request $request)
    {
        session()->forget(['loggedin', 'matricule', 'nom', 'prenom']);
        return redirect('/');
    }
}