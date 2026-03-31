<?php

namespace App\Http\Controllers;

use App\Models\Praticien;
use Illuminate\Http\Request;

class PraticienController extends Controller
{
    public function index(Request $request)
    {
        if (!session('loggedin')) {
            return redirect('/login');
        }
        
        $query = Praticien::query();
        
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('PRA_NOM', 'LIKE', "%{$search}%")
                  ->orWhere('PRA_PRENOM', 'LIKE', "%{$search}%")
                  ->orWhere('PRA_VILLE', 'LIKE', "%{$search}%")
                  ->orWhere('TYP_CODE', 'LIKE', "%{$search}%");
            });
        }
        
        $praticiens = $query->get();
        return view('praticiens.index', compact('praticiens'));
    }

    public function create()
    {
        return view('praticiens.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'PRA_NOM' => 'required|string|max:25',
            'PRA_PRENOM' => 'required|string|max:30',
            'PRA_ADRESSE' => 'required|string|max:50',
            'PRA_CP' => 'required|string|max:5',
            'PRA_VILLE' => 'required|string|max:25',
            'PRA_COEFNOTORIETE' => 'required|numeric',
            'TYP_CODE' => 'required|string|max:3',
        ]);

        Praticien::create($request->all());

        return redirect()->route('praticiens.index')->with('success', 'Praticien créé avec succès.');
    }

    public function show(Praticien $praticien)
    {
        return view('praticiens.show', compact('praticien'));
    }

    public function edit(Praticien $praticien)
    {
        return view('praticiens.edit', compact('praticien'));
    }

    public function update(Request $request, Praticien $praticien)
    {
        $request->validate([
            'PRA_NOM' => 'required|string|max:25',
            'PRA_PRENOM' => 'required|string|max:30',
            'PRA_ADRESSE' => 'required|string|max:50',
            'PRA_CP' => 'required|string|max:5',
            'PRA_VILLE' => 'required|string|max:25',
            'PRA_COEFNOTORIETE' => 'required|numeric',
            'TYP_CODE' => 'required|string|max:3',
        ]);

        $praticien->update($request->all());

        return redirect()->route('praticiens.index')->with('success', 'Praticien mis à jour avec succès.');
    }

    public function destroy(Praticien $praticien)
    {
        $praticien->delete();
        return redirect()->route('praticiens.index')->with('success', 'Praticien supprimé avec succès.');
    }
}