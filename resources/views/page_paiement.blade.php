<?php
    // information nécéssaire pour le fonctionnement de l'api.
$orderid = uniqid('order_');
$merchant_id = env('MERCHAND_ID');
$apipassword = env('API_PASSWORD');
$amount = env('PRIX_API');
// Générer l'URL de redirection
$returnUrl = route('page_apres_paiement', ['email' => urlencode(request()->input('email'))]);
$currency = 'EUR';
$merchant_name = 'TEST ACCOUNT';
$order_description = 'TEST D API';


$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://mcb.gateway.mastercard.com/api/nvp/version/59");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array(
    'apiOperation' => 'CREATE_CHECKOUT_SESSION',
    'apiPassword' => $apipassword,
    'apiUsername' => 'merchant.' . $merchant_id,
    'merchant' => $merchant_id,
    'interaction.operation' => 'PURCHASE',   //  AUTHORIZE
    'interaction.merchant.name' => $merchant_name,
    'interaction.returnUrl' => $returnUrl,
    'order.id' => $orderid,
    'order.amount' => $amount,
    'order.currency' => $currency,
    'order.description' => $order_description
)));

$headers = array();
$headers[] = "Content-Type: application/x-www-form-urlencoded";
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);

$sessionid = explode("=",explode("&", $result)[2])[1];
?>
@extends('layouts.main')
@section('title', 'Obtenir son extrait Kbis - K-bis')
@section('description', 'Découvrez notre site de Kbis et obtenez rapidement votre extrait Kbis en ligne. Services rapides, fiables et sécurisés pour tous vos besoins administratifs concernant une entreprise.')
@section('content')

<html>
<head>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, Liberation Sans, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", Segoe UI Symbol, "Noto Color Emoji";
            font-size: 1rem;
            background-color: #fff;
        }

        #embed-target {
            width: 100%;
            max-width: 800px;
            margin: auto;
            margin-top: 5%;
            margin-bottom: 2%;
            padding: 14px 8px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);

        }

    </style>
    <script src="https://mcb.gateway.mastercard.com/static/checkout/checkout.min.js"
            data-error="errorCallback"
            data-cancel="{{ route('home') }}"
            data-complete="complete"></script>

    <script type="text/javascript">
        var urlPageApresPaiement = "{{ route('page_apres_paiement') }}";
        var urlPagePrincipale = "{{ route('page_paiement') }}";
        function errorCallback(error) {
            alert("Error: " + JSON.stringify(error));
            window.location.href = urlPagePrincipale;
        }

        Checkout.configure({
            session: {
                id: '<?php echo $sessionid; ?>'
            }
        });

        // Afficher l'interface de paiement intégrée
        window.onload = function() {
            Checkout.showEmbeddedPage('#embed-target');
        };

        function complete(complete) {
            alert("enregistrement réussie ");
            window.location.href = urlPageApresPaiement;
        }
    </script>
</head>
<body>
    <div id="embed-target">

        </div>
</body>
</html>
@endsection

