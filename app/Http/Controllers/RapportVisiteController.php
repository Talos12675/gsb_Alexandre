<?php

namespace App\Http\Controllers;

use App\Models\RapportVisite;
use App\Models\Praticien;
use App\Models\Visiteur;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class RapportVisiteController extends Controller
{
    public function index()
    {
        if (!session('loggedin')) {
            return redirect('/login');
        }
        
        $rapports = RapportVisite::where('VIS_MATRICULE', session('matricule'))->with('praticien', 'visiteur')->get();
        return view('rapports.index', compact('rapports'));
    }

    public function create()
    {
        $praticiens = Praticien::all();
        return view('rapports.create', compact('praticiens'));
    }

    public function store(Request $request)
    {
        if (!session('loggedin')) {
            return redirect('/login');
        }
        
        $request->validate([
            'PRA_NUM' => 'required|exists:praticien,PRA_NUM',
            'RAP_DATE' => 'required|date',
            'RAP_BILAN' => 'required|string',
            'RAP_MOTIF' => 'required|string',
        ]);

        $matricule = session('matricule');
        $lastRapNum = RapportVisite::where('VIS_MATRICULE', $matricule)->max('RAP_NUM') ?? 0;

        RapportVisite::create([
            'VIS_MATRICULE' => $matricule,
            'RAP_NUM' => $lastRapNum + 1,
            'PRA_NUM' => $request->PRA_NUM,
            'RAP_DATE' => $request->RAP_DATE,
            'RAP_BILAN' => $request->RAP_BILAN,
            'RAP_MOTIF' => $request->RAP_MOTIF,
        ]);

        return redirect()->route('rapports.index')->with('success', 'Rapport créé avec succès.');
    }

    public function show($id)
    {
        if (!session('loggedin')) {
            return redirect('/login');
        }
        
        // Since composite key, parse VIS_MATRICULE_RAP_NUM
        [$vis_matricule, $rap_num] = explode('_', $id);
        if ($vis_matricule !== session('matricule')) {
            abort(403);
        }
        $rapport = RapportVisite::where('VIS_MATRICULE', $vis_matricule)->where('RAP_NUM', $rap_num)->firstOrFail();
        return view('rapports.show', compact('rapport'));
    }

    public function exportPdf($id)
    {
        if (!session('loggedin')) {
            return redirect('/login');
        }

        [$vis_matricule, $rap_num] = explode('_', $id);
        if ($vis_matricule !== session('matricule')) {
            abort(403);
        }
        $rapport = RapportVisite::where('VIS_MATRICULE', $vis_matricule)->where('RAP_NUM', $rap_num)->firstOrFail();

        $pdf = Pdf::loadView('rapports.pdf', compact('rapport'))
            ->setPaper('a4', 'portrait');

        $fileName = sprintf('compte_rendu_%s_%s.pdf', $vis_matricule, $rap_num);
        return $pdf->download($fileName);
    }

    public function edit($id)
    {
        if (!session('loggedin')) {
            return redirect('/login');
        }
        
        [$vis_matricule, $rap_num] = explode('_', $id);
        if ($vis_matricule !== session('matricule')) {
            abort(403);
        }
        $rapport = RapportVisite::where('VIS_MATRICULE', $vis_matricule)->where('RAP_NUM', $rap_num)->firstOrFail();
        $praticiens = Praticien::all();
        return view('rapports.edit', compact('rapport', 'praticiens'));
    }

    public function update(Request $request, $id)
    {
        if (!session('loggedin')) {
            return redirect('/login');
        }
        
        [$vis_matricule, $rap_num] = explode('_', $id);
        if ($vis_matricule !== session('matricule')) {
            abort(403);
        }
        $rapport = RapportVisite::where('VIS_MATRICULE', $vis_matricule)->where('RAP_NUM', $rap_num)->firstOrFail();

        $request->validate([
            'PRA_NUM' => 'required|exists:praticien,PRA_NUM',
            'RAP_DATE' => 'required|date',
            'RAP_BILAN' => 'required|string',
            'RAP_MOTIF' => 'required|string',
        ]);

        $rapport->update($request->only(['PRA_NUM', 'RAP_DATE', 'RAP_BILAN', 'RAP_MOTIF']));

        return redirect()->route('rapports.index')->with('success', 'Rapport mis à jour avec succès.');
    }

    public function destroy($id)
    {
        if (!session('loggedin')) {
            return redirect('/login');
        }
        
        [$vis_matricule, $rap_num] = explode('_', $id);
        if ($vis_matricule !== session('matricule')) {
            abort(403);
        }
        $rapport = RapportVisite::where('VIS_MATRICULE', $vis_matricule)->where('RAP_NUM', $rap_num)->firstOrFail();
        $rapport->delete();
        return redirect()->route('rapports.index')->with('success', 'Rapport supprimé avec succès.');
    }
}