<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Bulletin - {{ $report->student->matricule }}</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 40px;
            color: #333;
        }

        .header {
            text-align: center;
            border-bottom: 3px solid #4f46e5;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }

        .header h1 {
            color: #4f46e5;
            font-size: 28px;
            margin: 0;
        }

        .info {
            display: flex;
            justify-content: space-between;
            margin-bottom: 40px;
        }

        .info div {
            flex: 1;
        }

        .results {
            background: #f8f9fa;
            padding: 30px;
            border-radius: 10px;
            text-align: center;
            border: 2px solid #4f46e5;
        }

        .average {
            font-size: 60px;
            font-weight: bold;
            color: #4f46e5;
            margin: 20px 0;
        }

        .decision {
            font-size: 36px;
            font-weight: bold;
            margin: 15px 0;
        }

        .mention {
            font-size: 28px;
            color: #059669;
        }

        .footer {
            text-align: center;
            margin-top: 50px;
            font-size: 12px;
            color: #666;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>BULLETIN DE NOTES</h1>
        <p style="font-size: 18px; margin-top: 10px;">
            {{ $report->academicYear->libelle }} – Semestre {{ $report->semester }}
        </p>
    </div>

    <div class="info">
        <div>
            <strong>Étudiant :</strong><br>
            <span style="font-size: 20px;">{{ $report->student->first_name }}
                {{ $report->student->last_name }}</span><br>
            <strong>Matricule :</strong> {{ $report->student->matricule }}<br>
            <strong>Spécialité :</strong> {{ $report->student->specialty->name ?? 'Non définie' }}
        </div>
        <div style="text-align: right;">
            <strong>Date :</strong> {{ now()->format('d/m/Y') }}<br>
            <strong>Généré par :</strong> Système de Gestion Académique
        </div>
    </div>

    <div class="results">
        <h2 style="font-size: 24px; margin-bottom: 20px;">RÉSULTATS</h2>
        <div class="average">{{ number_format($report->average, 2) }} / 20</div>
        <div class="decision {{ $report->decision == 'Admis' ? 'text-success' : 'text-danger' }}">
            {{ $report->decision }}
        </div>
        <div class="mention">
            Mention : {{ $report->mention }}
        </div>
        @if ($report->remark)
            <div style="margin-top: 30px; font-style: italic;">
                <strong>Observations :</strong><br>
                {{ $report->remark }}
            </div>
        @endif
    </div>

    <div class="footer">
        Document officiel généré le {{ now()->format('d/m/Y à H:i') }}
    </div>
</body>

</html>
