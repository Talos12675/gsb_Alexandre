@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h2>Détails du Compte Rendu</h2>
                <a href="{{ route('rapports.index') }}" class="btn btn-secondary">Retour</a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($rapport->RAP_DATE)->format('d/m/Y') }}</p>
                        <p><strong>Visiteur:</strong> {{ $rapport->visiteur->VIS_NOM ?? 'N/A' }} {{ $rapport->visiteur->VIS_PRENOM ?? '' }}</p>
                        <p><strong>Praticien:</strong> {{ $rapport->praticien->PRA_NOM ?? 'N/A' }} {{ $rapport->praticien->PRA_PRENOM ?? '' }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Motif:</strong> {{ $rapport->RAP_MOTIF }}</p>
                        <p><strong>Créé le:</strong> {{ $rapport->created_at ? \Carbon\Carbon::parse($rapport->created_at)->format('d/m/Y à H:i:s') : 'N/A' }}</p>
                        <p><strong>Modifié le:</strong> {{ $rapport->updated_at ? \Carbon\Carbon::parse($rapport->updated_at)->format('d/m/Y à H:i:s') : 'N/A' }}</p>
                    </div>
                </div>
                <div class="mt-3">
                    <strong>Bilan:</strong>
                    <p>{{ $rapport->RAP_BILAN }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection