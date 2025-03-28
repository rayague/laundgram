<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facture {{ $commande->numero }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0.5cm auto;
            color: #2d3748;
            background: #ffffff;
            font-size: 13px;
            line-height: 1.4;
        }

        .container {
            max-width: 21cm;
            min-height: 29.7cm;
            margin: 0 auto;
            padding: 30px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            border-bottom: 3px solid #38a169;
            padding-bottom: 15px;
            margin-bottom: 15px;
        }

        .brand-section h1 {
            color: #38a169;
            font-size: 20px;
            margin: 0 0 5px 0;
        }

        .brand-section p {
            margin: 2px 0;
            font-size: 0.8em;
        }

        .invoice-info {
            text-align: right;
        }

        .invoice-info h2 {
            margin: 0;
            font-size: 18px;
        }

        .details-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
            margin-bottom: 15px;
        }

        .detail-block {
            padding: 10px;
            background: #f8fafc;
            border-radius: 4px;
        }

        .items-table {
            width: 100%;
            border-collapse: collapse;
            margin: 15px 0;
            font-size: 12px;
        }

        .items-table th {
            background: #38a169;
            color: white;
            padding: 8px;
            font-weight: 600;
        }

        .items-table td {
            padding: 8px;
            border-bottom: 1px solid #e2e8f0;
        }

        .total-section {
            margin: 15px 0;
            padding: 15px;
            background: #f8fff9;
            border-radius: 4px;
        }

        .total-line {
            display: flex;
            justify-content: space-between;
            margin: 6px 0;
        }

        .agence-info {
            font-size: 11px;
            padding: 12px;
            background: #f0fff4;
            border-left: 3px solid #38a169;
            margin-top: 15px;
        }

        .text-green {
            color: #38a169;
        }

        .text-right {
            text-align: right;
        }

        .badge {
            padding: 3px 6px;
            font-size: 11px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="brand-section">
                <h1>CICA NOBLESSE PRESSING</h1>
                <p>Bureau situé à côté du dépôt de ciment Zogbo (annexe Godomey).</p>
                <p>0272 BP 81</p>
                <p>Tél. (+229) 97 89 36 99 / 99 10 73 96 / 44 67 50</p>
                <p>Zogbo - Rép. Bénin</p>
                <p>RC 13-A-17728 | IFU : 2201300990000</p>
            </div>
            <div class="invoice-info">
                <h2>Facture #{{ $commande->numero }}</h2>
                <p>{{ \Carbon\Carbon::parse($commande->date_depot)->locale('fr')->isoFormat('LL') }}</p>
                <p>Agent: {{ $commande->user_id }}</p>
            </div>
        </div>

        <div class="details-grid">
            <div class="detail-block">
                <strong class="text-green">CLIENT</strong><br>
                {{ $commande->client }}<br>
                Numéro WhatsApp : {{ $commande->numero_whatsapp }}
            </div>
            <div class="detail-block">
                <strong class="text-green">DATES</strong><br>
                Dépôt: {{ \Carbon\Carbon::parse($commande->date_depot)->isoFormat('LL') }}<br>
                Retrait: {{ \Carbon\Carbon::parse($commande->date_retrait)->isoFormat('LL') }}
            </div>
        </div>


        <table class="items-table">
            <thead>
                <tr>
                    <th>Objet</th>
                    <th>Qté</th>
                    <th>Description</th>
                    <th class="text-right">Prix U.</th>
                    <th class="text-right">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($commande->objets as $objet)
                    <tr>
                        <td>{{ $objet->nom }}</td>
                        <td>{{ $objet->pivot->quantite }}</td>
                        <td>{{ $objet->pivot->description }}</td>
                        <td class="text-right">{{ number_format($objet->prix_unitaire, 2, ',', ' ') }} F</td>
                        <td class="text-right">
                            {{ number_format($objet->pivot->quantite * $objet->prix_unitaire, 2, ',', ' ') }} F</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="total-section">
            <div class="total-line">
                <span>Total brut:</span>
                <span>{{ number_format($originalTotal, 2, ',', ' ') }} FCFA</span>
            </div>
            @if ($remiseReduction > 0)
                <div class="total-line">
                    <span>Réduction ({{ $remiseReduction }}%):</span>
                    <span>-{{ number_format($discountAmount, 2, ',', ' ') }} FCFA</span>
                </div>
            @endif
            <div class="total-line" style="font-weight: 600;">
                <span>Total net:</span>
                <span>{{ number_format($commande->total, 2, ',', ' ') }} FCFA</span>
            </div>
            <div class="total-line">
                <span>Avance:</span>
                <span>{{ number_format($commande->avance_client, 2, ',', ' ') }} FCFA</span>
            </div>
            <div class="total-line">
                <span>Solde:</span>
                <span class="text-green">{{ number_format($commande->solde_restant, 2, ',', ' ') }} FCFA</span>
            </div>
            <div class="text-right" style="margin-top: 10px;">
                <span class="badge badge-success">{{ $commande->statut }}</span>
            </div>
        </div>


        <div class="container">
            <h2>Conditions Générales de Pressing</h2>
            <ul>
                <li><strong>1.</strong> 10 Frs par jour pour frais de magasinage seront perçus à partir du
                    10<sup>ème</sup> jour après dépôt.</li>
                <li><strong>2.</strong> Après deux (02) mois, la maison n'est plus responsable des pertes ou avaries
                    (<strong>60 jours</strong>).</li>
                <li><strong>3.</strong> En cas de dommages causés aux effets, la responsabilité du pressing est limitée
                    à :
                    <ul class="sub-list">
                        <li>Huit (8) fois le prix du blanchissage pour tout effet non griffé.</li>
                        <li>Dix (10) fois pour les linges griffés.</li>
                        <li>Une (1) fois le prix du blanchissage pour les draps.</li>
                    </ul>
                </li>
                <li><strong>4.</strong> Les synthétiques, boucles, boutons, fermetures, broderies de fil sur Bazin ne
                    sont pas pris en compte.</li>
                <li><strong>5.</strong> Les effets dépourvus d'étiquetage d'entretien ne sont pas garantis.</li>
            </ul>
        </div>
    </div>
</body>

</html>
