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
            margin: 0;
            padding: 10px;
            background: #ffffff;
            font-size: 14px;
            color: #2d3748;
        }

        .container {
            margin: auto;
            padding: 20px;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 3px solid #38a169;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .brand-section h1 {
            color: #38a169;
            font-size: 22px;
            margin: 0;
        }

        .invoice-info {
            text-align: right;
        }

        .invoice-info h2 {
            margin: 0;
            font-size: 18px;
            color: #2d3748;
        }

        .details-grid {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        .detail-block {
            flex: 1;
            padding: 10px;
            background: #f8fafc;
            border-radius: 6px;
            margin-right: 10px;
        }

        .items-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 13px;
        }

        .items-table th,
        .items-table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #e2e8f0;
        }

        .items-table th {
            background: #38a169;
            color: white;
        }

        .total-section {
            padding: 15px;
            background: #f8fff9;
            border-radius: 6px;
            margin-top: 20px;
        }

        .total-line {
            display: flex;
            justify-content: space-between;
            padding: 6px 0;
        }

        .badge {
            padding: 5px 10px;
            border-radius: 5px;
            background: #38a169;
            color: white;
            font-weight: bold;
        }

        .agence-info {
            font-size: 12px;
            padding: 10px;
            background: #f0fff4;
            border-left: 4px solid #38a169;
            margin-top: 20px;
        }

        .historique-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-size: 13px;
        }

        .historique-table th,
        .historique-table td {
            padding: 10px;
            border: 1px solid #e2e8f0;
            text-align: left;
        }

        .historique-table th {
            background-color: #f8fafc;
            color: #38a169;
        }

        .historique-table tr:hover {
            background-color: #f0fff4;
        }

        .historique-header {
            background-color: #38a169;
            color: white;
            font-weight: bold;
            text-align: center;
        }

        .historique-no-notes {
            text-align: center;
            background-color: #f7b7b7;
            padding: 10px;
            font-weight: bold;
            color: white;
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
                    <th>Prix U.</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($commande->objets as $objet)
                    <tr>
                        <td>{{ $objet->nom }}</td>
                        <td>{{ $objet->pivot->quantite }}</td>
                        <td>{{ $objet->pivot->description }}</td>
                        <td>{{ number_format($objet->prix_unitaire, 2, ',', ' ') }} F</td>
                        <td>{{ number_format($objet->pivot->quantite * $objet->prix_unitaire, 2, ',', ' ') }} F</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Historique des Retraits / Notes -->
        <div class="historique">
            <h3 class="historique-header">Historique des Retraits / Notes</h3>
            @if ($notes->isNotEmpty())
                <table class="historique-table">
                    <thead>
                        <tr>
                            <th>Numéro de Facture</th>
                            <th>Utilisateur</th>
                            <th>Note</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($notes as $note)
                            <tr>
                                <td>{{ $commande->numero }}</td>
                                <td>{{ $note->user->name ?? $note->user_id }}</td>
                                <td>{{ $note->note }}</td>
                                <td>{{ \Carbon\Carbon::parse($note->created_at)->format('d/m/Y H:i') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="historique-no-notes">Aucune note enregistrée pour cette commande.</p>
            @endif
        </div>

        <div class="total-section">
            <div class="total-line"><span>Total brut:</span> <span>{{ number_format($originalTotal, 2, ',', ' ') }}
                    FCFA</span></div>
            @if ($remiseReduction > 0)
                <div class="total-line"><span>Réduction ({{ $remiseReduction }}%):</span>
                    <span>-{{ number_format($discountAmount, 2, ',', ' ') }} FCFA</span>
                </div>
            @endif
            <div class="total-line" style="font-weight: bold;"><span>Total net:</span>
                <span>{{ number_format($commande->total, 2, ',', ' ') }} FCFA</span>
            </div>
            <div class="total-line"><span>Avance:</span>
                <span>{{ number_format($commande->avance_client, 2, ',', ' ') }} FCFA</span>
            </div>
            <div class="total-line"><span>Solde:</span> <span
                    class="badge">{{ number_format($commande->solde_restant, 2, ',', ' ') }} FCFA</span></div>
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
