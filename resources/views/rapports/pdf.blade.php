<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Compte Rendu - {{ $rapport->VIS_MATRICULE }} / {{ $rapport->RAP_NUM }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #222;
            line-height: 1.4;
            margin: 0;
            padding: 20px;
        }

        header {
            text-align: center;
            margin-bottom: 30px;
        }

        h1 {
            margin: 0;
            font-size: 24px;
        }

        .meta {
            margin-top: 5px;
            font-size: 12px;
            color: #555;
        }

        .section {
            margin-bottom: 20px;
        }

        .section h2 {
            font-size: 16px;
            margin-bottom: 10px;
            border-bottom: 1px solid #ccc;
            padding-bottom: 5px;
        }

        .field {
            margin-bottom: 8px;
        }

        .field label {
            font-weight: bold;
            display: inline-block;
            width: 120px;
        }

        .field span {
            display: inline-block;
            width: calc(100% - 130px);
        }

        .wide {
            width: 100%;
            margin-top: 10px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            background: #fafafa;
        }

        footer {
            position: fixed;
            bottom: 20px;
            left: 20px;
            right: 20px;
            font-size: 11px;
            color: #777;
            border-top: 1px solid #eee;
            padding-top: 8px;
            text-align: center;
        }
    </style>
</head>
<body>
    <header>
        <h1>Compte rendu de visite</h1>
        <div class="meta">Visiteur : {{ $rapport->visiteur->VIS_NOM ?? '' }} {{ $rapport->visiteur->VIS_PRENOM ?? '' }} &ndash; Rapport #{{ $rapport->RAP_NUM }} &ndash; {{ \Carbon\Carbon::parse($rapport->RAP_DATE)->format('d/m/Y') }}</div>
    </header>

    <div class="section">
        <h2>Détails</h2>
        <div class="field">
            <label>Matricule :</label>
            <span>{{ $rapport->VIS_MATRICULE }}</span>
        </div>
        <div class="field">
            <label>Praticien :</label>
            <span>{{ $rapport->praticien->PRA_NOM ?? '' }} {{ $rapport->praticien->PRA_PRENOM ?? '' }}</span>
        </div>
        <div class="field">
            <label>Motif :</label>
            <span>{{ $rapport->RAP_MOTIF }}</span>
        </div>
    </div>

    <div class="section">
        <h2>Bilan</h2>
        <div class="wide">{{ $rapport->RAP_BILAN }}</div>
    </div>

    <footer>
        Généré le {{ \Carbon\Carbon::now()->format('d/m/Y H:i') }}
    </footer>
</body>
</html>
