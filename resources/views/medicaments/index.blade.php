@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h2>Médicaments</h2>
                <a href="{{ route('medicaments.create') }}" class="btn btn-primary">Nouveau Médicament</a>
            </div>
            <div class="card-body">
                <!-- Formulaire de recherche -->
                <form method="GET" action="{{ route('medicaments.index') }}" class="mb-4">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" placeholder="Rechercher par nom, composition, effets, famille..." value="{{ request('search') }}">
                        <button class="btn btn-outline-secondary" type="submit">
                            <i class="fas fa-search"></i> Rechercher
                        </button>
                        @if(request('search'))
                            <a href="{{ route('medicaments.index') }}" class="btn btn-outline-danger">
                                <i class="fas fa-times"></i> Effacer
                            </a>
                        @endif
                    </div>
                </form>
                
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Dépôt Légal</th>
                                <th>Nom Commercial</th>
                                <th>Famille</th>
                                <th>Prix Échantillon</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($medicaments as $medicament)
                            <tr>
                                <td>{{ $medicament->MED_DEPOTLEGAL }}</td>
                                <td>{{ $medicament->MED_NOMCOMMERCIAL }}</td>
                                <td>{{ $medicament->FAM_CODE }}</td>
                                <td>{{ $medicament->MED_PRIXECHANTILLON ? number_format($medicament->MED_PRIXECHANTILLON, 2) . ' €' : 'N/A' }}</td>
                                <td>
                                    <a href="{{ route('medicaments.show', $medicament) }}" class="btn btn-sm btn-outline-primary">Voir</a>
                                    <a href="{{ route('medicaments.edit', $medicament) }}" class="btn btn-sm btn-outline-secondary">Éditer</a>
                                    <form method="POST" action="{{ route('medicaments.destroy', $medicament) }}" style="display:inline;">
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