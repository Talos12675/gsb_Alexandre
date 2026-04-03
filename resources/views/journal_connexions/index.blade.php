@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h1 class="h4 mb-0">Journal des connexions</h1>
            <span class="text-muted">Nombre: {{ $journalConns->total() }}</span>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover table-sm mb-0">
        <thead>
            <tr>
                <th>#</th>
                <th>
                    <a href="?sort=idUtilisateur&direction={{ $sort === 'idUtilisateur' && $direction === 'asc' ? 'desc' : 'asc' }}">
                        Utilisateur
                        @if($sort === 'idUtilisateur')
                            @if($direction === 'asc') ↑ @else ↓ @endif
                        @endif
                    </a>
                </th>
                <th>
                    <a href="?sort=dateConnexion&direction={{ $sort === 'dateConnexion' && $direction === 'asc' ? 'desc' : 'asc' }}">
                        Date et heure
                        @if($sort === 'dateConnexion')
                            @if($direction === 'asc') ↑ @else ↓ @endif
                        @endif
                    </a>
                </th>
                <th>Adresse IP</th>
                <th>User Agent</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($journalConns as $item)
                <tr>
                    <td>{{ $item->idConnexion }}</td>
                    <td>{{ $item->idUtilisateur }} @if($item->visiteur) ({{ $item->visiteur->VIS_NOM }} {{ $item->visiteur->Vis_PRENOM }}) @endif</td>
                    <td>{{ $item->dateConnexion }}</td>
                    <td>{{ $item->adresseIP }}</td>
                    <td>{{ $item->userAgent }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Aucune connexion enregistrée.</td>
                </tr>
            @endforelse
        </tbody>
            </table>
        </div>
        <div class="card-footer d-flex justify-content-end">
            {{ $journalConns->withQueryString()->links() }}
        </div>
    </div>
</div>
@endsection
