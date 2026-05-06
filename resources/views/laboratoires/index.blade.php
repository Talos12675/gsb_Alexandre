@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Laboratoires</h2>
        </div>
        <div class="card-body">
            @if($laboratoires->isEmpty())
                <div class="alert alert-warning" role="alert">
                    Aucun laboratoire n'est disponible.
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Email siège</th>
                                <th>Ville</th>
                                <th>Code postal</th>
                                <th>Téléphone siège</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($laboratoires as $labo)
                                <tr>
                                    <td>{{ $labo->LAB_NOM }}</td>
                                    <td>{{ $labo->LAB_EMAIL ?? '-' }}</td>
                                    <td>{{ $labo->LAB_VILLE ?? '-' }}</td>
                                    <td>{{ $labo->LAB_CP ?? '-' }}</td>
                                    <td>{{ $labo->LAB_TELEPHONE ?? '-' }}</td>
                                    <td>
                                        <a href="{{ route('laboratoires.show', $labo->LAB_CODE) }}" class="btn btn-sm btn-primary">
                                            Consulter
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
@endsection
