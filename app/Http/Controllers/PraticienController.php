<?php

namespace App\Http\Controllers;

use App\Models\Praticien;
use Illuminate\Http\Request;

class PraticienController extends Controller
{
    public function index(Request $request)
    {
        if (! session('loggedin')) {
            return redirect('/login');
        }

        $query = Praticien::query();

        if ($request->has('search') && ! empty($request->search)) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
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
        if (! session('loggedin') || ! session('is_admin')) {
            return redirect()->route('dashboard')->with('error', 'Accès réservé aux administrateurs.');
        }

        return view('praticiens.create');
    }

    public function store(Request $request)
    {
        if (! session('loggedin') || ! session('is_admin')) {
            return redirect()->route('dashboard')->with('error', 'Accès réservé aux administrateurs.');
        }

        $request->validate([
            'PRA_NOM' => 'required|string|max:25',
            'PRA_PRENOM' => 'required|string|max:30',
            'PRA_ADRESSE' => 'required|string|max:50',
            'PRA_CP' => 'required|string|max:5',
            'PRA_VILLE' => 'required|string|max:25',
            'PRA_COEFNOTORIETE' => 'required|numeric',
            'TYP_CODE' => 'required|string|max:3',
        ]);

        $nextNumber = Praticien::max('PRA_NUM');
        $nextNumber = $nextNumber ? $nextNumber + 1 : 1;

        $data = $request->only(['PRA_NOM', 'PRA_PRENOM', 'PRA_ADRESSE', 'PRA_CP', 'PRA_VILLE', 'PRA_COEFNOTORIETE', 'TYP_CODE']);
        $data['PRA_NUM'] = $nextNumber;

        Praticien::create($data);

        return redirect()->route('praticiens.index')->with('success', 'Praticien créé avec succès.');
    }

    public function show(Praticien $praticien)
    {
        if (! session('loggedin')) {
            return redirect('/login');
        }

        return view('praticiens.show', compact('praticien'));
    }

    public function edit(Praticien $praticien)
    {
        if (! session('loggedin') || ! session('is_admin')) {
            return redirect()->route('dashboard')->with('error', 'Accès réservé aux administrateurs.');
        }

        return view('praticiens.edit', compact('praticien'));
    }

    public function update(Request $request, Praticien $praticien)
    {
        if (! session('loggedin') || ! session('is_admin')) {
            return redirect()->route('dashboard')->with('error', 'Accès réservé aux administrateurs.');
        }

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
        if (! session('loggedin') || ! session('is_admin')) {
            return redirect()->route('dashboard')->with('error', 'Accès réservé aux administrateurs.');
        }

        $praticien->delete();

        return redirect()->route('praticiens.index')->with('success', 'Praticien supprimé avec succès.');
    }
}
