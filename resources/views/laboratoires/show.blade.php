@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Laboratoire {{ $laboratoire->LAB_NOM }}</h2>
        </div>
        <div class="card-body">
            <div class="row g-4 mb-4">
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Informations générales</h5>
                            <table class="table mb-0">
                                <tbody>
                                    <tr>
                                        <th class="w-50">Code</th>
                                        <td>{{ $laboratoire->LAB_CODE }}</td>
                                    </tr>
                                    <tr>
                                        <th>Chef des ventes</th>
                                        <td>{{ $laboratoire->LAB_CHEFVENTE }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Coordonnées</h5>
                            <table class="table mb-0">
                                <tbody>
                                    <tr>
                                        <th class="w-50">Email</th>
                                        <td>{{ $laboratoire->LAB_EMAIL ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Adresse</th>
                                        <td>{{ $laboratoire->LAB_ADRESSE ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Code postal</th>
                                        <td>{{ $laboratoire->LAB_CP ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Ville</th>
                                        <td>{{ $laboratoire->LAB_VILLE ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Téléphone</th>
                                        <td>{{ $laboratoire->LAB_TELEPHONE ?? '-' }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-4">
                <h5>Collaborateurs</h5>
                @if($laboratoire->collaborateurs->isEmpty())
                    <div class="alert alert-info" role="alert">
                        Aucun collaborateur identifié pour ce laboratoire.
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Poste</th>
                                    <th>Email</th>
                                    <th>Téléphone</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($laboratoire->collaborateurs as $collaborateur)
                                    <tr>
                                        <td>{{ $collaborateur->COL_NOM }}</td>
                                        <td>{{ $collaborateur->COL_PRENOM }}</td>
                                        <td>{{ $collaborateur->COL_POSTE }}</td>
                                        <td>{{ $collaborateur->COL_EMAIL }}</td>
                                        <td>{{ $collaborateur->COL_TELEPHONE ?? '-' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>

            <a href="{{ route('laboratoires.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-2"></i> Retour à la liste
            </a>
        </div>
    </div>
@endsection
