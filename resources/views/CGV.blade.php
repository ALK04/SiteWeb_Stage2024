@extends('layouts.main')
@section('title', 'Obtenir son extrait Kbis - K-bis')
@section('description', 'Découvrez notre site de Kbis et obtenez rapidement votre extrait Kbis en ligne. Services rapides, fiables et sécurisés pour tous vos besoins administratifs concernant une entreprise.')
@section('content')

    @vite('resources/scss/CGV.scss')
    @stack('styles')

<div class="container">
    <h1>Conditions Générales de Vente (CGV)</h1>

    <h2>1. Caractéristiques essentielles des biens et/ou services</h2>
    <p>Nous vendons des extraits Kbis, qui sont des documents officiels attestant de l'existence juridique d'une entreprise en France. Ces documents sont indispensables pour de nombreuses démarches administratives et commerciales.</p>

    <h2>2. Prix TTC</h2>
    <p>Les prix des Kbis sont indiqués toutes taxes comprises (TTC) en euros sur notre site internet.</p>

    <h2>3. Frais, date et modalités de livraison</h2>
    <p>Les frais de livraison varient en fonction du mode de livraison choisi :</p>
    <ul>
        <li>Livraison électronique : Instantané après validation de la commande.</li>
    </ul>
    <p>Les frais de livraison sont spécifiés lors du processus de commande.</p>

    <h2>4. Modalités d'exécution du contrat</h2>
    <p>Le contrat est exécuté dès la réception du paiement. Les Kbis sont fournis après la validation de la commande et du paiement.</p>

    <h2>5. Modalités de paiement</h2>
    <p>Nous acceptons les modes de paiement suivants :</p>
    <ul>
        <li>Carte bancaire</li>
    </ul>
    <p>En cas de retard de paiement, des pénalités de retard calculées sur la base de 3 fois le taux d'intérêt légal s'appliquent, ainsi qu'une indemnité forfaitaire de 40 € pour frais de recouvrement.</p>

    <h2>6. Garantie légale de conformité et des vices cachés</h2>
    <p>Nous garantissons la conformité des Kbis vendus. En cas de défaut de fabrication ou de vice caché rendant le Kbis impropre à son usage, vous pouvez nous retourner le document pour un remplacement ou un remboursement.</p>

    <h2>7. Garantie commerciale et service après-vente</h2>
    <p>Nous offrons une garantie commerciale couvrant tous les défauts de fabrication lors de l'achat ou de la livraison d'un Kbis. Pour toute demande de service après-vente, vous pouvez nous contacter par email. Les coûts de communication à distance sont à la charge de l'utilisateur.</p>

    <h2>8. Durée du contrat et conditions de résiliation</h2>
    <p>Le contrat est conclu pour une durée indéterminée et peut être résilié à tout moment par l'une ou l'autre des parties, sous réserve de l'exécution des obligations en cours.</p>

    <h2>9. Caution ou garantie à fournir par le client</h2>
    <p>Aucune caution ou garantie n'est exigée de la part du client.</p>

    <h2>10. Durée minimale des obligations contractuelles du client</h2>
    <p>Aucune durée minimale des obligations contractuelles n'est imposée au client.</p>

    <h2>11. Existence d'un code de conduite applicable au contrat</h2>
    <p>Aucun code de conduite spécifique n'est applicable au contrat.</p>

    <h2>12. Modalités de règlement des litiges</h2>
    <p>En cas de litige, vous pouvez contacter notre service client pour une tentative de résolution amiable. Si aucune solution amiable n'est trouvée, les tribunaux français seront compétents pour régler le différend. Vous avez également la possibilité de recourir à un médiateur de la consommation.</p>
</div>
@endsection
