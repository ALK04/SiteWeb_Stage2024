<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use DateTime;

class ApiPappersController extends Controller
{
    public function show(Request $request)
    {
        // Récupérer le SIREN depuis la requête
        $siren = $request->query('siren');

        // URL de l'API avec le SIREN
        $url = "https://api.pappers.fr/v2/entreprise?siren=" . $siren;

        // Token de l'API
        $token = "ca82e5cde92c6cbaa3e1cd5530948584f377f63a61ede61c";

        try {
            // Faire la requête à l'API
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token
            ])->get($url);

            // Vérifier si la requête a réussi
            if ($response->successful()) {
                $data = $response->json();

                // Récupérer les informations requises en remplaçant les accents
                $numero_rcs = $this->remplacerAccents(htmlspecialchars($data['numero_rcs'] ?? ''));
                $numero = $this->remplacerAccents(htmlspecialchars($data['siren'] ?? ''));
                $date_immatriculation = $this->remplacerAccents(htmlspecialchars($data['date_immatriculation_rcs'] ?? ''));
                $denomination_raison_sociale = $this->remplacerAccents(htmlspecialchars($data['denomination'] ?? ''));
                $forme_juridique = $this->remplacerAccents(htmlspecialchars($data['forme_juridique'] ?? ''));
                $capital_social = $this->remplacerAccents(htmlspecialchars($data['capital_formate'] ?? ''));
                $devise = $this->remplacerAccents(htmlspecialchars($data['devise_capital'] ?? ''));

                $code_postal = $this->remplacerAccents(htmlspecialchars($data['siege']['code_postal'] ?? ''));
                $ville = $this->remplacerAccents(htmlspecialchars($data['siege']['ville'] ?? ''));

                $adresse_siege = $code_postal . ', ' . $ville;

                $duree_personne_morale = intval($data['duree_personne_morale'] ?? 0);
                $date_creation = $data['date_creation'] ?? '';

                // Calcul de la date de création
                if ($date_creation) {
                    $date_creation_dt = new DateTime($date_creation);
                    $date_creation_dt->modify("+{$duree_personne_morale} years");
                    $date_fin = $date_creation_dt->format('d/m/Y');
                } else {
                    $date_fin = '';
                }

                $duree_personne_morale = $this->remplacerAccents(htmlspecialchars($date_fin ?? $data['duree_personne_morale']));
                $date_cloture_exercice_social = $this->remplacerAccents(htmlspecialchars($data['date_cloture_exercice'] ?? '31 Décembre'));
                $nom = $this->remplacerAccents(htmlspecialchars($data['representants'][0]['nom'] ?? ''));
                $prenoms = $this->remplacerAccents(htmlspecialchars($data['representants'][0]['prenom'] ?? ''));
                $date_naissance = $this->remplacerAccents(htmlspecialchars($data['representants'][0]['date_de_naissance'] ?? ''));
                $lieu_naissance = $this->remplacerAccents(htmlspecialchars($data['representants'][0]['ville_de_naissance'] ?? ''));
                $nationalite = $this->remplacerAccents(htmlspecialchars($data['representants'][0]['nationalite'] ?? ''));
                $domicile_personnel_representant = $this->remplacerAccents(htmlspecialchars($data['representants'][0]['adresse_ligne_1'] ?? '') . ', ' . ($data['representants'][0]['code_postal'] ?? '') . ' ' . ($data['representants'][0]['ville'] ?? ''));
                $adresse_etablissement = $this->remplacerAccents(htmlspecialchars($data['etablissements'][0]['adresse_ligne_1'] ?? '') . ', ' . ($data['etablissements'][0]['code_postal'] ?? '') . ' ' . ($data['etablissements'][0]['ville'] ?? ''));
                $nom_commercial = $this->remplacerAccents(htmlspecialchars($data['denomination'] ?? ''));

                // Vérifier l'existence de 'domaine_activite'
                $activites_exercees =  $this->remplacerAccents(htmlspecialchars($data['objet_social'] ?? ($data['domaine_activite'] ?? '')));

                $date_commencement_activite = $this->remplacerAccents(htmlspecialchars($data['date_debut_activite'] ?? ($data['date_debut_premiere_activite'] ?? '')));

                $origine_fonds_activite = $this->remplacerAccents(htmlspecialchars($data['publications_bodacc']['type'] ?? 'Création'));
                $mode_exploitation = "Exploitation directe";

                // Stocker les informations dans la session
                $request->session()->put('numero_rcs', $numero_rcs);
                $request->session()->put('numero', $numero);
                $request->session()->put('date_immatriculation', $date_immatriculation);
                $request->session()->put('denomination_raison_sociale', $denomination_raison_sociale);
                $request->session()->put('forme_juridique', $forme_juridique);
                $request->session()->put('capital_social', $capital_social);
                $request->session()->put('devise', $devise);
                $request->session()->put('adresse_siege', $adresse_siege);
                $request->session()->put('duree_personne_morale', $duree_personne_morale);
                $request->session()->put('date_cloture_exercice_social', $date_cloture_exercice_social);
                $request->session()->put('nom', $nom);
                $request->session()->put('prenoms', $prenoms);
                $request->session()->put('date_naissance', $date_naissance);
                $request->session()->put('lieu_naissance', $lieu_naissance);
                $request->session()->put('nationalite', $nationalite);
                $request->session()->put('domicile_personnel_representant', $domicile_personnel_representant);
                $request->session()->put('adresse_etablissement', $adresse_etablissement);
                $request->session()->put('nom_commercial', $nom_commercial);
                $request->session()->put('activites_exercees', $activites_exercees);
                $request->session()->put('date_commencement_activite', $date_commencement_activite);
                $request->session()->put('origine_fonds_activite', $origine_fonds_activite);
                $request->session()->put('mode_exploitation', $mode_exploitation);

                // Afficher les informations sur le lieu
                if ($data && isset($data['siege'])) {
                    return redirect('email');
                }
            } else {
                // Rediriger avec un message d'erreur
                return redirect('/')->with('error', "Aucune entreprise correspondant à ces informations. Veuillez vérifier la dénomination ou fournir le SIREN pour une recherche plus précise.");
            }
        } catch (\Exception $e) {
            // Rediriger avec un message d'erreur en cas d'exception
            return redirect('/')->with('error', "Aucune entreprise correspondant à ces informations. Veuillez vérifier la dénomination ou fournir le SIREN pour une recherche plus précise.");
        }
    }

    // Fonction pour remplacer les accents
    private function remplacerAccents($str)
    {// Convertir les entités HTML en caractères normaux

        $str = html_entity_decode($str, ENT_QUOTES, 'UTF-8');

        $accentues = array(
            'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ð', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø',
            'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'à', 'á', 'â', 'ã', 'ä', 'å', 'æ', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ð', 'ñ', 'ò',
            'ó', 'ô', 'õ', 'ö', 'ø', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', 'Þ', 'ß', 'þ', 'Ÿ', 'Š', 'š', 'Ž', 'ž', 'ƒ', 'œ', 'Œ', '€', "'"
        );
        $sansAccent = array(
            'A', 'A', 'A', 'A', 'A', 'A', 'AE', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'D', 'N', 'O', 'O', 'O', 'O', 'O', 'O',
            'U', 'U', 'U', 'U', 'Y', 'a', 'a', 'a', 'a', 'a', 'a', 'ae', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'd', 'n', 'o',
            'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y', 'Th', 'ss', 'th', 'Y', 'S', 's', 'Z', 'z', 'f', 'oe', 'OE', 'EUR', ' '
        );

        return str_replace($accentues, $sansAccent, $str);
    }
}
