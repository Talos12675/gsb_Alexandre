<?php

namespace App\Http\Controllers;

use App\Models\JournalConnexion;
use Illuminate\Http\Request;

class JournalConnexionController extends Controller
{
    public function index(Request $request)
    {
        if (! session('loggedin') || ! session('is_admin')) {
            return redirect()->route('dashboard')->with('error', 'Accès réservé aux administrateurs.');
        }

        $sort = $request->get('sort', 'dateConnexion');
        $direction = $request->get('direction', 'desc');

        if (! in_array($sort, ['idUtilisateur', 'dateConnexion'])) {
            $sort = 'dateConnexion';
        }

        if (! in_array($direction, ['asc', 'desc'])) {
            $direction = 'desc';
        }

        $journalConns = JournalConnexion::with('visiteur')
            ->orderBy($sort, $direction)
            ->paginate(20);

        return view('journal_connexions.index', compact('journalConns', 'sort', 'direction'));
    }
}
