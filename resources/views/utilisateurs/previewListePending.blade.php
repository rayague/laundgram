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
    <div class="header">
        <div class="brand-section">
            <h1>CICA NOBLESSE PRESSING</h1>
            <p>Bureau situé à côté du dépôt de ciment Zogbo (annexe Godomey).</p>
            <p>0272 BP 81</p>
            <p>Tél. (+229) 97 89 36 99 / 99 10 73 96 / 44 67 50</p>
            <p>Zogbo - Rép. Bénin</p>
            <p>RC 13-A-17728 | IFU : 2201300990000</p>
        </div>

    </div>

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


    <div class="container">
        <h2>Conditions Générales de Pressing</h2>
        <ul>
            <li><strong>1.</strong> 10 Frs par jour pour frais de magasinage seront perçus à partir du 10<sup>ème</sup>
                jour après dépôt.</li>
            <li><strong>2.</strong> Après deux (02) mois, la maison n'est plus responsable des pertes ou avaries
                (<strong>60 jours</strong>).</li>
            <li><strong>3.</strong> En cas de dommages causés aux effets, la responsabilité du pressing est limitée à :
                <ul class="sub-list">
                    <li>Huit (8) fois le prix du blanchissage pour tout effet non griffé.</li>
                    <li>Dix (10) fois pour les linges griffés.</li>
                    <li>Une (1) fois le prix du blanchissage pour les draps.</li>
                </ul>
            </li>
            <li><strong>4.</strong> Les synthétiques, boucles, boutons, fermetures, broderies de fil sur Bazin ne sont
                pas pris en compte.</li>
            <li><strong>5.</strong> Les effets dépourvus d'étiquetage d'entretien ne sont pas garantis.</li>
        </ul>
    </div>

</body>

</html>
