<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\info_pdf;
use App\Models\information;
use Illuminate\Http\Request;

class ApresPaiementController extends Controller
{
    public function envoyedonnee(Request $request)
    {
        // Récupérer les informations de session
        $numero_rcs = $request->session()->get('numero_rcs');
        $numero = $request->session()->get('numero');
        $date_immatriculation = $request->session()->get('date_immatriculation');
        $denomination_raison_sociale = $request->session()->get('denomination_raison_sociale');
        $forme_juridique = $request->session()->get('forme_juridique');
        $capital_social = $request->session()->get('capital_social');
        $devise = $request->session()->get('devise');
        $adresse_siege = $request->session()->get('adresse_siege');
        $duree_personne_morale = $request->session()->get('duree_personne_morale');
        $date_cloture_exercice_social = $request->session()->get('date_cloture_exercice_social');
        $nom = $request->session()->get('nom');
        $prenoms = $request->session()->get('prenoms');
        $date_naissance = $request->session()->get('date_naissance');
        $lieu_naissance = $request->session()->get('lieu_naissance');
        $nationalite = $request->session()->get('nationalite');
        $domicile_personnel_representant = $request->session()->get('domicile_personnel_representant');
        $adresse_etablissement = $request->session()->get('adresse_etablissement');
        $nom_commercial = $request->session()->get('nom_commercial');
        $activites_exercees = $request->session()->get('activites_exercees');
        $date_commencement_activite = $request->session()->get('date_commencement_activite');
        $origine_fonds_activite = $request->session()->get('origine_fonds_activite');
        $mode_exploitation = $request->session()->get('mode_exploitation');


        $email_acheteur = $request->session()->get('email');
        $heure_achat = date("Y-m-d H:i:s");


        $information = new Information();
        $information->heure_achat = $heure_achat;
        $information->nom_entreprise = $denomination_raison_sociale;
        $information->email_acheteur = $email_acheteur;
        $information->save();


        $info_pdf = new Info_pdf();
        $info_pdf->immatriculation_RDC = $numero_rcs;
        $info_pdf->numero = $numero;
        $info_pdf->date_immatriculation = $date_immatriculation;
        $info_pdf->denomination_raison_sociale = $denomination_raison_sociale;
        $info_pdf->forme_juridique = $forme_juridique;
        $info_pdf->capital_social = $capital_social;
        $info_pdf->adresse_siege = $adresse_siege;
        $info_pdf->duree_personne_morale = $duree_personne_morale;
        $info_pdf->date_cloture_exercice_social = $date_cloture_exercice_social;
        $info_pdf->nom = $nom;
        $info_pdf->prenoms = $prenoms;
        $info_pdf->date_naissance = $date_naissance;
        $info_pdf->lieu_naissance = $lieu_naissance;
        $info_pdf->nationalite = $nationalite;
        $info_pdf->domicile_personnel = $domicile_personnel_representant;
        $info_pdf->adresse_etablissement = $adresse_etablissement;
        $info_pdf->nom_commercial = $nom_commercial;
        $info_pdf->activites_exercees = $activites_exercees;
        $info_pdf->date_commencement_activite = $date_commencement_activite;
        $info_pdf->origine_fonds_activite = $origine_fonds_activite;
        $info_pdf->mode_exploitation = $mode_exploitation;
        $info_pdf->devise = $devise;

        $info_pdf->save();

        if ($information->save() && $info_pdf->save()) {
            return redirect()->route('generate.pdf');
        }
    }
}
