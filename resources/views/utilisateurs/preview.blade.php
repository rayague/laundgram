{{-- <!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facture {{ $commande->numero }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        @page {
            size: A4 landscape;
            margin: 0;
        }

        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 10px;
            background: #ffffff;
            font-size: 8px;
            color: #2d3748;
            display: flex;
            min-height: 100vh;
        }

        .container {
            display: flex;
            width: 100%;
            gap: 4%;
            page-break-inside: avoid;
        }

        .invoice-column {
            flex: 1;
            max-width: 48%;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 10px;
            position: relative;
            box-sizing: border-box;
        }

        .invoice-column::after {
            content: "";
            border-right: 2px dashed #ccc;
            position: absolute;
            right: -2%;
            top: 0;
            height: 100%;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 3px solid #38a169;
            padding-bottom: 8px;
            margin-bottom: 15px;
        }

        .brand-section h1 {
            color: #38a169;
            font-size: 18px;
            margin: 0;
            line-height: 1.2;
        }

        .details-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 8px;
            margin-bottom: 12px;
        }

        .items-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 10px;
        }

        .items-table th {
            padding: 6px;
            background: #38a169;
            color: white;
        }

        .items-table td {
            padding: 6px;
            border-bottom: 1px solid #e2e8f0;
        }

        .total-section {
            padding: 10px;
            margin-top: 15px;
        }

        /* Adaptation pour l'impression */
        @media print {
            body {
                padding: 0;
                font-size: 9px;
            }

            .container {
                gap: 0;
            }

            .invoice-column {
                max-width: 49%;
                border: none;
                box-shadow: none;
            }

            .invoice-column::after {
                border-right-style: dashed;
            }
        }

        .text-green {
            color: #38a169;
        }

        .sub-list {
            padding-left: 15px;
        }

        .historique-table {
            font-size: 9px;
        }

        .badge {
            padding: 3px 6px;
        }
    </style>
</head>

<body>
    <!-- Début du conteneur principal -->
    <div class="container">
        <!-- Colonne de gauche -->
        <div class="invoice-column">
            <!-- Insérer ici TOUT le contenu de la facture -->
            <!-- (Header, détails client, tableau articles, total, conditions) -->
            <!-- Utiliser exactement la même structure que votre code original -->
            <div class="invoice">
                <div class="container">
                    <div class="header">
                        <div class="brand-section">
                            <h1>CICA NOBLESSE PRESSING</h1>
                            <p>Annexe Godomey, Zogbo - Bénin</p>
                            <p>0272 BP 81 • IFU : 2201300990000</p>
                            <p>Tél : (+229) 97 89 36 99 / 96 44 67 50</p>
                        </div>
                        <div class="invoice-info">
                            <h2>Facture #{{ $commande->numero }}</h2>
                            <p>{{ \Carbon\Carbon::parse($commande->date_depot)->locale('fr')->isoFormat('LL') }}</p>
                            <p>Agent : {{ $commande->user->name ?? $commande->user_id }}</p>
                        </div>
                    </div>

                    <div class="details-grid">
                        <div class="detail-block">
                            <strong>CLIENT</strong><br>
                            {{ $commande->client }}<br>
                            WhatsApp : {{ $commande->numero_whatsapp }}
                        </div>
                        <div class="detail-block">
                            <strong>DATES</strong><br>
                            Dépôt : {{ \Carbon\Carbon::parse($commande->date_depot)->isoFormat('LL') }}<br>
                            Retrait : {{ \Carbon\Carbon::parse($commande->date_retrait)->isoFormat('LL') }}
                        </div>
                    </div>

                    <table>
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
                                    <td>{{ number_format($objet->prix_unitaire, 2, ',', ' ') }} FCFA</td>
                                    <td>{{ number_format($objet->pivot->quantite * $objet->prix_unitaire, 2, ',', ' ') }}
                                        FCFA</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div>
                        <h3 class="historique-header">Historique Retraits / Notes</h3>
                        @if ($notes->isNotEmpty())
                            <table>
                                <thead>
                                    <tr>
                                        <th>Facture</th>
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
                                            <td>{{ \Carbon\Carbon::parse($note->created_at)->format('d/m/Y H:i') }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p style="text-align:center; font-weight:bold; background:#f7b7b7; color:#fff;">Aucune note
                                enregistrée</p>
                        @endif
                    </div>

                    <div class="total-section">
                        <div class="total-line"><span>Total
                                brut:</span><span>{{ number_format($originalTotal, 2, ',', ' ') }} FCFA</span></div>
                        @if ($remiseReduction > 0)
                            <div class="total-line"><span>Remise
                                    ({{ $remiseReduction }}%):</span><span>-{{ number_format($discountAmount, 2, ',', ' ') }}
                                    FCFA</span></div>
                        @endif
                        <div class="total-line" style="font-weight:bold;"><span>Total
                                net:</span><span>{{ number_format($commande->total, 2, ',', ' ') }} FCFA</span></div>
                        <div class="total-line">
                            <span>Avance:</span><span>{{ number_format($commande->avance_client, 2, ',', ' ') }}
                                FCFA</span>
                        </div>
                        <div class="total-line"><span>Solde:</span><span
                                class="badge">{{ number_format($commande->solde_restant, 2, ',', ' ') }} FCFA</span>
                        </div>
                    </div>

                    <div style="margin-top:6px; font-size:9px;">
                        <strong>Conditions :</strong>
                        <ul style="padding-left:12px;">
                            <li>10 FCFA/jour après 10<sup>ème</sup> jour.</li>
                            <li>Responsabilité limitée après 60 jours.</li>
                            <li>Indemnités selon barème en cas d'avaries.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Colonne de droite -->
        <div class="invoice-column">
            <!-- Dupliquer ici le même contenu que la colonne de gauche -->
            <!-- Veiller à utiliser les mêmes variables et structure -->
            <div class="invoice">
                <div class="container">
                    <div class="header">
                        <div class="brand-section">
                            <h1>CICA NOBLESSE PRESSING</h1>
                            <p>Annexe Godomey, Zogbo - Bénin</p>
                            <p>0272 BP 81 • IFU : 2201300990000</p>
                            <p>Tél : (+229) 97 89 36 99 / 96 44 67 50</p>
                        </div>
                        <div class="invoice-info">
                            <h2>Facture #{{ $commande->numero }}</h2>
                            <p>{{ \Carbon\Carbon::parse($commande->date_depot)->locale('fr')->isoFormat('LL') }}</p>
                            <p>Agent : {{ $commande->user->name ?? $commande->user_id }}</p>
                        </div>
                    </div>

                    <div class="details-grid">
                        <div class="detail-block">
                            <strong>CLIENT</strong><br>
                            {{ $commande->client }}<br>
                            WhatsApp : {{ $commande->numero_whatsapp }}
                        </div>
                        <div class="detail-block">
                            <strong>DATES</strong><br>
                            Dépôt : {{ \Carbon\Carbon::parse($commande->date_depot)->isoFormat('LL') }}<br>
                            Retrait : {{ \Carbon\Carbon::parse($commande->date_retrait)->isoFormat('LL') }}
                        </div>
                    </div>

                    <table>
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
                                    <td>{{ number_format($objet->prix_unitaire, 2, ',', ' ') }} FCFA</td>
                                    <td>{{ number_format($objet->pivot->quantite * $objet->prix_unitaire, 2, ',', ' ') }}
                                        FCFA</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div>
                        <h3 class="historique-header">Historique Retraits / Notes</h3>
                        @if ($notes->isNotEmpty())
                            <table>
                                <thead>
                                    <tr>
                                        <th>Facture</th>
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
                                            <td>{{ \Carbon\Carbon::parse($note->created_at)->format('d/m/Y H:i') }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p style="text-align:center; font-weight:bold; background:#f7b7b7; color:#fff;">Aucune note
                                enregistrée</p>
                        @endif
                    </div>

                    <div class="total-section">
                        <div class="total-line"><span>Total
                                brut:</span><span>{{ number_format($originalTotal, 2, ',', ' ') }} FCFA</span></div>
                        @if ($remiseReduction > 0)
                            <div class="total-line"><span>Remise
                                    ({{ $remiseReduction }}%):</span><span>-{{ number_format($discountAmount, 2, ',', ' ') }}
                                    FCFA</span></div>
                        @endif
                        <div class="total-line" style="font-weight:bold;"><span>Total
                                net:</span><span>{{ number_format($commande->total, 2, ',', ' ') }} FCFA</span></div>
                        <div class="total-line">
                            <span>Avance:</span><span>{{ number_format($commande->avance_client, 2, ',', ' ') }}
                                FCFA</span>
                        </div>
                        <div class="total-line"><span>Solde:</span><span
                                class="badge">{{ number_format($commande->solde_restant, 2, ',', ' ') }} FCFA</span>
                        </div>
                    </div>

                    <div style="margin-top:6px; font-size:9px;">
                        <strong>Conditions :</strong>
                        <ul style="padding-left:12px;">
                            <li>10 FCFA/jour après 10<sup>ème</sup> jour.</li>
                            <li>Responsabilité limitée après 60 jours.</li>
                            <li>Indemnités selon barème en cas d'avaries.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html> --}}


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facture {{ $commande->numero }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        @page {
            size: A4 landscape;
            margin: 10mm;
        }

        body {
            font-family: 'Poppins', sans-serif;
            font-size: 10px;
            margin: 0;
            padding: 0;
            color: #2d3748;
        }

        .sheet-table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
        }

        .sheet-table td {
            width: 50%;
            vertical-align: top;
            padding: 5mm;
        }

        .invoice-column {
            border: 1px solid #e2e8f0;
            border-radius: 4px;
            padding: 5mm;
        }

        .header {
            display: flex;
            justify-content: space-between;
            border-bottom: 2px solid #38a169;
            margin-bottom: 4mm;
            padding-bottom: 3mm;
        }

        .brand-section {
            width: 60%;
        }

        .brand-section h1 {
            font-size: 12px;
            margin: 0 0 2mm 0;
            color: #38a169;
        }

        .brand-section p {
            margin: 0;
            font-size: 9px;
        }

        .invoice-info {
            text-align: right;
            font-size: 9px;
        }

        .invoice-info h2 {
            margin: 0 0 1mm 0;
            font-size: 10px;
        }

        .details-grid {
    /* display: flex; */
    justify-content: space-between;
    background: #f0fdf4;
    border: 1px solid #c6f6d5;
    padding: 4mm;
    border-radius: 5px;
    margin-bottom: 5mm;
}

.detail-block {
    width: 48%;
    font-size: 9px;
    display: flex;

}

.detail-block h4 {
    margin: 0 0 2mm 0;
    font-size: 10px;
    color: #38a169;
    text-transform: uppercase;
}


        .items-table {
            width: 100%;
            font-size: 8px;
            border-collapse: collapse;
            margin: 3mm 0;
        }

        .items-table th {
            background-color: #38a169;
            color: white;
            padding: 2mm;
            text-align: left;
        }

        .items-table td {
            border-bottom: 1px solid #e2e8f0;
            padding: 2mm;
        }

        .total-section {
            margin-top: 4mm;
            font-size: 9px;
        }

        .total-line {
            display: flex;
            justify-content: space-between;
            margin: 1mm 0;
        }

        .badge {
            padding: 1mm 3mm;
            background-color: #edf2f7;
            border-radius: 3px;
            font-weight: bold;
        }

        .historique-header {
            margin-top: 6mm;
            font-size: 9px;
            font-weight: bold;
        }

        .notes-table {
            width: 100%;
            font-size: 8px;
            border-collapse: collapse;
            margin-top: 2mm;
        }

        .notes-table th {
            background-color: #38a169;
            color: white;
            padding: 2mm;
        }

        .notes-table td {
            padding: 2mm;
            border-bottom: 1px solid #e2e8f0;
        }

        .conditions {
            margin-top: 6mm;
            font-size: 8px;
        }

        .conditions ul {
            padding-left: 14px;
        }

        @media print {
            .invoice-column {
                border: none;
                padding: 0;
            }

            .sheet-table td {
                padding: 0;
            }
        }
    </style>
</head>

<body>
    <table class="sheet-table">
        <tr>
            @for ($i = 0; $i < 2; $i++)
                <td>
                    <div class="invoice-column">
                        <div class="header">
                            <div class="brand-section">
                                <h1>CICA NOBLESSE PRESSING</h1>
                                <p>Annexe Godomey, Zogbo - Bénin</p>
                                <p>0272 BP 81 • IFU : 2201300990000</p>
                                <p>Tél : (+229) 97 89 36 99 / 96 44 67 50</p>
                            </div>
                            <div class="invoice-info">
                                <h2>Facture</h2>
                                <p><strong>N° :</strong> {{ $commande->numero }}</p>
                                <p><strong>Date dépôt :</strong><br>{{ \Carbon\Carbon::parse($commande->date_depot)->locale('fr')->isoFormat('LL') }}</p>
                                <p><strong>Agent :</strong> {{ $commande->user->name ?? $commande->user_id }}</p>
                            </div>
                        </div>

                        <div class="details-grid">
                            <div class="detail-block">
                                <strong>CLIENT :</strong>
                                {{ $commande->client }}<br>
                                WhatsApp : {{ $commande->numero_whatsapp }}
                            </div>
                            <div class="detail-block">
                                <strong>DATES</strong><br>
                                Dépôt : {{ \Carbon\Carbon::parse($commande->date_depot)->isoFormat('LL') }}<br>
                                Retrait : {{ \Carbon\Carbon::parse($commande->date_retrait)->isoFormat('LL') }}
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
                                        <td>{{ number_format($objet->prix_unitaire, 2, ',', ' ') }} FCFA</td>
                                        <td>{{ number_format($objet->pivot->quantite * $objet->prix_unitaire, 2, ',', ' ') }} FCFA</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="historique">
                            <h3 class="historique-header">Historique Retraits / Notes</h3>
                            @if ($notes->isNotEmpty())
                                <table class="notes-table">
                                    <thead>
                                        <tr>
                                            <th>Facture</th>
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
                                <p style="text-align:center; font-weight:bold; background:#f56565; color:#fff;">Aucune note enregistrée</p>
                            @endif
                        </div>

                        <div class="total-section">
                            <h4 class="total-title">Récapitulatif de la commande</h4>
                            <div class="total-line">
                                <span class="label">Total brut :</span>
                                <span class="value">{{ number_format($originalTotal, 2, ',', ' ') }} FCFA</span>
                            </div>

                            @if ($remiseReduction > 0)
                                <div class="total-line">
                                    <span class="label">Remise ({{ $remiseReduction }}%) :</span>
                                    <span class="value text-red">-{{ number_format($discountAmount, 2, ',', ' ') }} FCFA</span>
                                </div>
                            @endif

                            <div class="total-line total-net">
                                <span class="label">Total net :</span>
                                <span class="value">{{ number_format($commande->total, 2, ',', ' ') }} FCFA</span>
                            </div>

                            <div class="total-line">
                                <span class="label">Avance versée :</span>
                                <span class="value">{{ number_format($commande->avance_client, 2, ',', ' ') }} FCFA</span>
                            </div>

                            <div class="total-line solde">
                                <span class="label">Solde à payer :</span>
                                <span class="badge">{{ number_format($commande->solde_restant, 2, ',', ' ') }} FCFA</span>
                            </div>
                        </div>


                        <div class="conditions">
                            <strong>Conditions :</strong>
                            <ul>
                                <li>10 FCFA/jour après 10<sup>e</sup> jour.</li>
                                <li>Responsabilité limitée après 60 jours.</li>
                                <li>Indemnités selon barème en cas d'avaries.</li>
                            </ul>
                        </div>
                    </div>
                </td>
            @endfor
        </tr>
    </table>
</body>

</html>

