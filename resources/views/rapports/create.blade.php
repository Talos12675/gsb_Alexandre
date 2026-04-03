@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h2>Nouveau Compte Rendu</h2>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('rapports.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="PRA_NUM" class="form-label">Praticien</label>
                        <select class="form-control" id="PRA_NUM" name="PRA_NUM" required>
                            <option value="">Sélectionner un praticien</option>
                            @foreach($praticiens as $praticien)
                            <option value="{{ $praticien->PRA_NUM }}">{{ $praticien->PRA_NOM }} {{ $praticien->PRA_PRENOM }}</option>
                            @endforeach
                        </select>
                        @error('PRA_NUM')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="RAP_MOTIF" class="form-label">Motif</label>
                        <input type="text" class="form-control" id="RAP_MOTIF" name="RAP_MOTIF" value="{{ old('RAP_MOTIF') }}" required>
                        @error('RAP_MOTIF')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="RAP_BILAN" class="form-label">Bilan</label>
                        <textarea class="form-control" id="RAP_BILAN" name="RAP_BILAN" rows="4" required>{{ old('RAP_BILAN') }}</textarea>
                        @error('RAP_BILAN')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Créer</button>
                    <a href="{{ route('rapports.index') }}" class="btn btn-secondary">Annuler</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection