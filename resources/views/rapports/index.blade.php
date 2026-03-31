@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h2>Comptes Rendus</h2>
                <a href="{{ route('rapports.create') }}" class="btn btn-primary">Nouveau Rapport</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Visiteur</th>
                                <th>Praticien</th>
                                <th>Bilan</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($rapports as $rapport)
                            <tr>
                                <td>{{ \Carbon\Carbon::parse($rapport->RAP_DATE)->format('d/m/Y') }}</td>
                                <td>{{ $rapport->visiteur->VIS_NOM ?? 'N/A' }} {{ $rapport->visiteur->VIS_PRENOM ?? '' }}</td>
                                <td>{{ $rapport->praticien->PRA_NOM ?? 'N/A' }} {{ $rapport->praticien->PRA_PRENOM ?? '' }}</td>
                                <td>{{ Str::limit($rapport->RAP_BILAN, 50) }}</td>
                                <td>
                                    <a href="{{ route('rapports.show', $rapport->VIS_MATRICULE . '_' . $rapport->RAP_NUM) }}" class="btn btn-sm btn-outline-primary">Voir</a>
                                <a href="{{ route('rapports.pdf', ['id' => $rapport->VIS_MATRICULE . '_' . $rapport->RAP_NUM]) }}" class="btn btn-sm btn-outline-info" target="_blank">PDF</a>
                                <a href="{{ route('rapports.edit', $rapport->VIS_MATRICULE . '_' . $rapport->RAP_NUM) }}" class="btn btn-sm btn-outline-secondary">Éditer</a>
                                <form method="POST" action="{{ route('rapports.destroy', $rapport->VIS_MATRICULE . '_' . $rapport->RAP_NUM) }}" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Êtes-vous sûr?')">Supprimer</button>
                                </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection