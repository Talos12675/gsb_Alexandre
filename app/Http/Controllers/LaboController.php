<?php

namespace App\Http\Controllers;

use App\Models\Labo;

class LaboController extends Controller
{
    // Retourne la liste des laboratoires pour la page d'index.
    public function index()
    {
        $laboratoires = Labo::orderBy('LAB_NOM')->get();

        return view('laboratoires.index', compact('laboratoires'));
    }

    // Affiche le détail d'un laboratoire, en chargeant ses collaborateurs liés.
    public function show($laboratoire)
    {
        $laboratoire = Labo::with('collaborateurs')->findOrFail($laboratoire);

        return view('laboratoires.show', compact('laboratoire'));
    }
}
