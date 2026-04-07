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
                                <th>
                                    <a href="{{ route('rapports.index', ['sort_by' => 'RAP_DATE', 'sort_dir' => $sortBy === 'RAP_DATE' && $sortDir === 'asc' ? 'desc' : 'asc']) }}" style="color: inherit; text-decoration: none;">
                                        Date 
                                        @if($sortBy === 'RAP_DATE')
                                            <i class="bi bi-arrow-{{ $sortDir === 'asc' ? 'up' : 'down' }}"></i>
                                        @endif
                                    </a>
                                </th>
                                <th>Visiteur</th>
                                <th>Praticien</th>
                                <th>Bilan</th>
                                <th>
                                    <a href="{{ route('rapports.index', ['sort_by' => 'created_at', 'sort_dir' => $sortBy === 'created_at' && $sortDir === 'asc' ? 'desc' : 'asc']) }}" style="color: inherit; text-decoration: none;">
                                        Créé le 
                                        @if($sortBy === 'created_at')
                                            <i class="bi bi-arrow-{{ $sortDir === 'asc' ? 'up' : 'down' }}"></i>
                                        @endif
                                    </a>
                                </th>
                                <th>
                                    <a href="{{ route('rapports.index', ['sort_by' => 'updated_at', 'sort_dir' => $sortBy === 'updated_at' && $sortDir === 'asc' ? 'desc' : 'asc']) }}" style="color: inherit; text-decoration: none;">
                                        Modifié le 
                                        @if($sortBy === 'updated_at')
                                            <i class="bi bi-arrow-{{ $sortDir === 'asc' ? 'up' : 'down' }}"></i>
                                        @endif
                                    </a>
                                </th>
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
                                <td>{{ $rapport->created_at ? \Carbon\Carbon::parse($rapport->created_at)->format('d/m/Y H:i') : 'N/A' }}</td>
                                <td>{{ $rapport->updated_at ? \Carbon\Carbon::parse($rapport->updated_at)->format('d/m/Y H:i') : 'N/A' }}</td>
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