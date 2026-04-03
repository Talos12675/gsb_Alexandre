<?php

namespace App\Http\Controllers;

use App\Models\RapportVisite;

class DashboardController extends Controller
{
    public function index()
    {
        if (! session('loggedin')) {
            return redirect('/login');
        }

        $user = session('matricule');

        // Get recent reports for the user
        $recentRapports = RapportVisite::where('VIS_MATRICULE', $user)->orderBy('RAP_DATE', 'desc')->take(5)->get();

        return view('dashboard', compact('recentRapports'));
    }
}
