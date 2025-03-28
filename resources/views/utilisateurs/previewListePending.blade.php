<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Commandes en Attente</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        .total {
            font-weight: bold;
            background-color: #f8f9fa;
        }
    </style>
</head>

<body>

    <h2 style="text-align: center; color: #007bff;">Liste des Commandes en Attente</h2>
    <p><strong>Période :</strong> {{ $date_debut }} au {{ $date_fin }}</p>

    <table>
        <thead>
            <tr>
                <th>N° Commande</th>
                <th>Client</th>
                <th>Heure de Retrait</th>
                <th>Montant</th>
                <th>Statut</th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0; @endphp
            @foreach ($commandes as $commande)
                @php $total += $commande->total; @endphp
                <tr>
                    <td>{{ $commande->numero }}</td>
                    <td>{{ $commande->client }}</td>
                    <td>{{ $commande->heure_retrait }}</td>
                    <td>{{ number_format($commande->total, 2, ',', ' ') }} FCFA</td>
                    <td>{{ $commande->statut }}</td>
                </tr>
            @endforeach
            <tr class="total">
                <td colspan="3">Total :</td>
                <td>{{ number_format($total, 2, ',', ' ') }} FCFA</td>
                <td></td>
            </tr>
        </tbody>
    </table>

</body>

</html>
