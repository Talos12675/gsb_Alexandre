<?php

namespace App\Http\Controllers;

use App\Models\Medicament;
use Illuminate\Http\Request;

class MedicamentController extends Controller
{
    public function index(Request $request)
    {
        if (! session('loggedin')) {
            return redirect('/login');
        }

        $query = Medicament::query();

        if ($request->has('search') && ! empty($request->search)) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('MED_NOMCOMMERCIAL', 'LIKE', "%{$search}%")
                    ->orWhere('MED_COMPOSITION', 'LIKE', "%{$search}%")
                    ->orWhere('MED_EFFETS', 'LIKE', "%{$search}%")
                    ->orWhere('FAM_CODE', 'LIKE', "%{$search}%");
            });
        }

        $medicaments = $query->paginate(10);

        return view('medicaments.index', compact('medicaments'));
    }

    public function create()
    {
        return view('medicaments.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'MED_NOMCOMMERCIAL' => 'required|string|max:25',
            'MED_DEPOTLEGAL' => 'required|string|max:10|unique:medicament,MED_DEPOTLEGAL',
            'FAM_CODE' => 'required|string|max:3',
            'MED_COMPOSITION' => 'nullable|string',
            'MED_EFFETS' => 'nullable|string',
            'MED_CONTREINDIC' => 'nullable|string',
            'MED_PRIXECHANTILLON' => 'nullable|numeric',
        ]);

        Medicament::create($request->all());

        return redirect()->route('medicaments.index')->with('success', 'Médicament créé avec succès.');
    }

    public function show(Medicament $medicament)
    {
        return view('medicaments.show', compact('medicament'));
    }

    public function edit(Medicament $medicament)
    {
        return view('medicaments.edit', compact('medicament'));
    }

    public function update(Request $request, Medicament $medicament)
    {
        $request->validate([
            'MED_NOMCOMMERCIAL' => 'required|string|max:25',
            'MED_DEPOTLEGAL' => 'required|string|max:10|unique:medicament,MED_DEPOTLEGAL,'.$medicament->MED_DEPOTLEGAL.',MED_DEPOTLEGAL',
            'FAM_CODE' => 'required|string|max:3',
            'MED_COMPOSITION' => 'nullable|string',
            'MED_EFFETS' => 'nullable|string',
            'MED_CONTREINDIC' => 'nullable|string',
            'MED_PRIXECHANTILLON' => 'nullable|numeric',
        ]);

        $medicament->update($request->all());

        return redirect()->route('medicaments.index')->with('success', 'Médicament mis à jour avec succès.');
    }

    public function destroy(Medicament $medicament)
    {
        $medicament->delete();

        return redirect()->route('medicaments.index')->with('success', 'Médicament supprimé avec succès.');
    }
}
