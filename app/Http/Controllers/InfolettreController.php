<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class InfolettreController extends Controller
{
    public function show(Request $request)
    {
        // Nom de l'entreprise à rechercher (saisi par l'utilisateur)
        $nom_entreprise = $request->query('nom_entreprise');

        // Validation de l'entrée utilisateur
        if (empty($nom_entreprise)) {
            return response()->json(['error' => 'Le nom de l\'entreprise est requis.'], 400);
        }

        // Construction de l'URL de l'API avec le nom de l'entreprise saisi
        $url = "https://recherche-entreprises.api.gouv.fr/search?q=" . urlencode($nom_entreprise);

        // Paramètres de traçabilité
        $context = "aides publiques"; // Cadre de la requête
        $recipient = "13002526500013"; // Bénéficiaire de l'appel
        $object = "marché numéro 127"; // Raison de l'appel

        // Construction des paramètres de requête
        $queryParams = http_build_query([
            'context' => $context,
            'recipient' => $recipient,
            'object' => $object
        ]);

        // Initialisation de la session cURL
        $ch = curl_init();

        // Configuration des options de cURL
        curl_setopt($ch, CURLOPT_URL, $url . '&' . $queryParams); // URL avec les paramètres de requête
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Retourner la réponse au lieu de l'afficher
        curl_setopt($ch, CURLOPT_TIMEOUT, 30); // Délai d'attente de 30 secondes
        curl_setopt($ch, CURLOPT_FAILONERROR, true); // Considérer les codes de réponse HTTP >= 400 comme des erreurs

        // Exécution de la requête
        $result = curl_exec($ch);

        // Gestion des erreurs cURL
        if (curl_errno($ch)) {
            $error_msg = curl_error($ch);
            curl_close($ch);
            return response()->json(['error' => 'Erreur cURL: ' . $error_msg], 500);
        }

        // Fermeture de la session cURL
        curl_close($ch);

        // Conversion de la réponse JSON en tableau associatif
        $data = json_decode($result, true);

        // Vérification des erreurs dans la réponse de l'API
        if (json_last_error() !== JSON_ERROR_NONE) {
            return response()->json(['error' => 'Erreur de décodage JSON: ' . json_last_error_msg()], 500);
        }

        // Extraction des SIREN, des noms complets, des adresses et des libellés de commune de tous les résultats
        $entreprises = [];
        if (isset($data['results']) && is_array($data['results'])) {
            foreach ($data['results'] as $result) {
                if (isset($result['siren']) && isset($result['nom_complet']) && isset($result['siege']['adresse']) && isset($result['siege']['libelle_commune'])) {
                    $entreprises[] = [
                        'siren' => $result['siren'],
                        'nom_complet' => $result['nom_complet'],
                        'adresse' => $result['siege']['adresse'],
                        'libelle_commune' => $result['siege']['libelle_commune']
                    ];
                }
            }
        }
        // Retourner la vue avec les données des entreprises
        return view('test', ['entreprises' => $entreprises]);
    }
    public function details($siren)
    {
        // Vous pouvez ici récupérer les détails spécifiques d'une entreprise en fonction du SIREN
        // Par exemple, faire une nouvelle requête à l'API ou utiliser une autre méthode pour récupérer les détails détaillés.

        // Exemple simplifié de récupération des détails pour un SIREN donné
        // Vous devrez adapter cette partie selon la logique de votre application
        $url = "https://recherche-entreprises.api.gouv.fr/siret/" . $siren;

        // Initialisation de la session cURL
        $ch = curl_init();

        // Configuration des options de cURL
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Exécution de la requête
        $result = curl_exec($ch);

        // Gestion des erreurs cURL
        if (curl_errno($ch)) {
            $error_msg = curl_error($ch);
            curl_close($ch);
            return response()->json(['error' => 'Erreur cURL: ' . $error_msg], 500);
        }

        // Fermeture de la session cURL
        curl_close($ch);

        // Conversion de la réponse JSON en tableau associatif
        $details = json_decode($result, true);

        // Vérification des erreurs dans la réponse de l'API
        if (json_last_error() !== JSON_ERROR_NONE) {
            return response()->json(['error' => 'Erreur de décodage JSON: ' . json_last_error_msg()], 500);
        }

        // Retourner la vue avec les détails de l'entreprise
        return view('details', ['details' => $details]);
    }
}
