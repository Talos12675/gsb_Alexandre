<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\JournalConnexion;
use App\Models\User;
use App\Models\Visiteur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

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
                'is_admin' => false,
                'matricule' => $visiteur->VIS_MATRICULE,
                'nom' => $visiteur->VIS_NOM,
                'prenom' => $visiteur->VIS_PRENOM,
            ]);
            session()->regenerate();

            Log::channel('login')->info('Connexion réussie', [
                'matricule' => $visiteur->VIS_MATRICULE,
                'ip' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);

            JournalConnexion::create([
                'idUtilisateur' => $visiteur->VIS_MATRICULE,
                'dateConnexion' => now(),
                'adresseIP' => $request->ip(),
                'userAgent' => $request->userAgent(),
            ]);

            return redirect()->route('dashboard');
        }

        $admin = User::where('name', $request->matricule)->first();

        if ($admin && Hash::check($request->password, $admin->password) && $admin->is_admin) {
            session([
                'loggedin' => true,
                'is_admin' => true,
                'user_id' => $admin->id,
                'name' => $admin->name,
            ]);
            session()->regenerate();

            Log::channel('login')->info('Connexion administrateur réussie', [
                'name' => $admin->name,
                'ip' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);

            JournalConnexion::create([
                'idUtilisateur' => $admin->id,
                'dateConnexion' => now(),
                'adresseIP' => $request->ip(),
                'userAgent' => $request->userAgent(),
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
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
