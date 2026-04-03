@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h2>Praticiens</h2>
                @if(session('is_admin'))
                    <a href="{{ route('praticiens.create') }}" class="btn btn-primary">Nouveau Praticien</a>
                @endif
            </div>
            <div class="card-body">
                <!-- Formulaire de recherche -->
                <form method="GET" action="{{ route('praticiens.index') }}" class="mb-4">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" placeholder="Rechercher par nom, prénom, ville, type..." value="{{ request('search') }}">
                        <button class="btn btn-outline-secondary" type="submit">
                            <i class="fas fa-search"></i> Rechercher
                        </button>
                        @if(request('search'))
                            <a href="{{ route('praticiens.index') }}" class="btn btn-outline-danger">
                                <i class="fas fa-times"></i> Effacer
                            </a>
                        @endif
                    </div>
                </form>
                
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Ville</th>
                                <th>Type</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($praticiens as $praticien)
                            <tr>
                                <td>{{ $praticien->PRA_NOM }}</td>
                                <td>{{ $praticien->PRA_PRENOM }}</td>
                                <td>{{ $praticien->PRA_VILLE }}</td>
                                <td>{{ $praticien->TYP_CODE }}</td>
                                <td>
                                    <a href="{{ route('praticiens.show', $praticien) }}" class="btn btn-sm btn-outline-primary">Voir</a>
                                @if(session('is_admin'))
                                    <a href="{{ route('praticiens.edit', $praticien) }}" class="btn btn-sm btn-outline-secondary">Éditer</a>
                                    <form method="POST" action="{{ route('praticiens.destroy', $praticien) }}" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Êtes-vous sûr?')">Supprimer</button>
                                    </form>
                                @endif
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