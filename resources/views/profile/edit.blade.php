@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h2>Mon Profil</h2>
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form method="POST" action="{{ route('profile.update') }}">
                    @csrf
                    @method('PATCH')

                    @if(isset($isAdmin) && $isAdmin && isset($user))
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Nom</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}" required>
                                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}" required>
                                    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Nouveau mot de passe</label>
                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                                    @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Confirmation du mot de passe</label>
                                    <input type="password" name="password_confirmation" class="form-control">
                                </div>
                            </div>
                        </div>
                    @else
                        @php $visiteur = $visiteur ?? null; @endphp
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Matricule</label>
                                    <input type="text" class="form-control" value="{{ optional($visiteur)->VIS_MATRICULE }}" disabled>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Nom</label>
                                    <input type="text" name="VIS_NOM" class="form-control @error('VIS_NOM') is-invalid @enderror" value="{{ old('VIS_NOM', optional($visiteur)->VIS_NOM) }}" required>
                                    @error('VIS_NOM') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Prénom</label>
                                    <input type="text" name="Vis_PRENOM" class="form-control @error('Vis_PRENOM') is-invalid @enderror" value="{{ old('Vis_PRENOM', optional($visiteur)->Vis_PRENOM) }}">
                                    @error('Vis_PRENOM') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Adresse</label>
                                    <input type="text" name="VIS_ADRESSE" class="form-control @error('VIS_ADRESSE') is-invalid @enderror" value="{{ old('VIS_ADRESSE', optional($visiteur)->VIS_ADRESSE) }}">
                                    @error('VIS_ADRESSE') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Code Postal</label>
                                    <input type="text" name="VIS_CP" class="form-control @error('VIS_CP') is-invalid @enderror" value="{{ old('VIS_CP', optional($visiteur)->VIS_CP) }}">
                                    @error('VIS_CP') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Ville</label>
                                    <input type="text" name="VIS_VILLE" class="form-control @error('VIS_VILLE') is-invalid @enderror" value="{{ old('VIS_VILLE', optional($visiteur)->VIS_VILLE) }}">
                                    @error('VIS_VILLE') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Date d'embauche</label>
                                    @php
                                        $dateEmbauche = optional($visiteur)->VIS_DATEEMBAUCHE ? \Carbon\Carbon::parse(optional($visiteur)->VIS_DATEEMBAUCHE)->format('d/m/Y') : '';
                                    @endphp
                                    <input type="text" class="form-control" value="{{ $dateEmbauche }}" disabled>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Secteur</label>
                                    <input type="text" name="SEC_CODE" class="form-control @error('SEC_CODE') is-invalid @enderror" value="{{ old('SEC_CODE', optional($visiteur)->SEC_CODE) }}">
                                    @error('SEC_CODE') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Laboratoire</label>
                                    <input type="text" name="LAB_CODE" class="form-control @error('LAB_CODE') is-invalid @enderror" value="{{ old('LAB_CODE', optional($visiteur)->LAB_CODE) }}">
                                    @error('LAB_CODE') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Nouveau mot de passe <small class="text-muted">(laisser vide pour ne pas changer)</small></label>
                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                                    @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Confirmation du mot de passe</label>
                                    <input type="password" name="password_confirmation" class="form-control">
                                </div>
                            </div>
                        </div>
                    @endif

                    <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
