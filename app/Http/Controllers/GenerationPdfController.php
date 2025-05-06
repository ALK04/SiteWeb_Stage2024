<?php

namespace App\Http\Controllers;
use App\Models\info_pdf;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Log;
use TCPDF;

class GenerationPdfController extends Controller
{

    public function downloadPdf($id)
    {

        $infoPdf = info_pdf::find($id);


        $pdf = new TCPDF();

        $pdf->AddPage();
        $pdfFileName = 'kbis_' . str_replace(' ', '_', $infoPdf->denomination_raison_sociale) . '.pdf';

        //image :
        $imagePath1 = public_path('image/output-onlinepngtools.jpg');
        $imagePath2 = public_path('image/tampon-v1-blue.jpg');

        $date_actuelle = strftime('%e %B %Y');

        $width = 150; 
        $height = 150; 
        $pageWidth = 210; 
        $pageHeight = 297; 
        $x = ($pageWidth - $width) / 2; 
        $y = ($pageHeight - $height) / 2; 
        $pdf->Image($imagePath1, $x, $y, $width, $height); 

        $pdf->Cell(70, 5, 'Greffe du Tribunal de Reims', 0, 1);
        $pdf->Cell(70, 5, '55-57 Rue Thiers, ', 0, 1);
        $pdf->Cell(70, 5, '51100 Reims', 0, 1);
        $pdf->Cell(70, 5, ' ', 0, 1); 
        $pdf->Cell(70, 5, ' ', 0, 1); 
        $pdf->SetFont('times','B',40);
        $pdf->SetX(55);
        $pdf->Cell(70, 5, 'EXTRAIT KBIS', 0, 1);
        $pdf->SetFont('times','B',11);
        $pdf->Cell(70, 5, ' ', 0, 1); 
        $pdf->Cell(70, 5, ' ', 0, 1);
        $pdf->Cell(70, 5, "EXTRAIT D'IMMATRICULATION PRINCIPALE AU REGISTRE DU COMMERCE ET DES SOCIETES", 0, 1);
        $pdf->SetFont('times','',10);
        $pdf->SetX(85);
        $pdf->Cell(70, 5, "A jour au $date_actuelle", 0, 1);
        $pdf->Cell(70, 5, ' ', 0, 1);  
        $pdf->SetFont('times','I',12);
        $pdf->SetX(10);
        $pdf->Cell(70, 5, "IDENTIFICATION DE LA PERSONNE MORALE", 0, 1);
        $pdf->Cell(70, 5, ' ', 0, 1); 
        $pdf->SetFont('times','',9);
        $pdf->Cell(70, 5, "Immatriculation au RCS, numero ", 0, 0);
        $pdf->Cell(70, 5, $infoPdf->immatriculation_RDC, 0, 1);
        $pdf->Cell(70, 5, "Date d'immatriculation ", 0, 0);
        $pdf->Cell(70, 5, $infoPdf->date_immatriculation, 0, 1);
        $pdf->Cell(70, 5, "Denomination ou raison sociale ", 0, 0);
        $pdf->Cell(70, 5, $infoPdf->denomination_raison_sociale , 0, 1);
        $pdf->Cell(70, 5, "Forme juridique ", 0, 0);
        $pdf->Cell(70, 5, $infoPdf->forme_juridique, 0, 1);
        $pdf->Cell(70, 5, "Capital social ", 0, 0);
        $pdf->Cell(70, 5, $infoPdf->capital_social, 0, 1);
        $pdf->Cell(70, 5, "Adresse du siege ", 0, 0);
        $pdf->Cell(70, 5, $infoPdf->adresse_siege, 0, 1);
        $pdf->Cell(70, 5, "Duree de la personne morale ", 0, 0);
        $pdf->Cell(70, 5, "Jusqu'au " . $infoPdf->duree_personne_morale, 0, 1);
        $pdf->Cell(70, 5, "Date de cloture de l'exercice social ", 0, 0);
        $pdf->Cell(70, 5,  $infoPdf->date_cloture_exercice_social, 0, 1);
        $pdf->Cell(70, 5, ' ', 0, 1); 
        $pdf->SetFont('times','I',12);
        $pdf->SetX(10);
        $pdf->Cell(70, 5, "GESTION, DIRECTION, ADMINISTRATION, CONTROLE, ASSOCIES OU MEMBRES", 0, 1);
        $pdf->Cell(70, 5, ' ', 0, 1); 
        $pdf->SetFont('times','',12);
        $pdf->Cell(70, 5, "Gerant", 0, 1);
        $pdf->Cell(70, 5, ' ', 0, 1); 
        $pdf->SetFont('times','',9);
        $pdf->SetX(30);
        $pdf->Cell(51, 5, "Nom, prenoms ", 0, 0);
        $pdf->Cell(70, 5, $infoPdf->nom . ' , ' . $infoPdf->prenoms, 0, 1);
        $pdf->SetX(30);
        $pdf->Cell(51, 5, "Date et lieu de naissance", 0, 0);
        $pdf->Cell(70, 5, $infoPdf->date_naissance. ' , ' . $infoPdf->lieu_naissance, 0, 1);
        $pdf->SetX(30);
        $pdf->Cell(51, 5, "Nationalite", 0, 0);
        $pdf->Cell(70, 5, $infoPdf->nationalite, 0, 1);
        $pdf->SetX(30);
        $pdf->Cell(51, 5, "Domicile personnel", 0, 0);
        $pdf->Cell(70, 5, $infoPdf->domicile_personnel, 0, 1);
        $pdf->Cell(70, 5, ' ', 0, 1); 
        $pdf->SetFont('times','I',12);
        $pdf->SetX(10);
        $pdf->Cell(70, 5, "RENSEIGNEMENTS RELATIFS A L'ACTIVITE ET A L'ETABLISSEMENT PRINCIPAL", 0, 1);
        $pdf->Cell(70, 5, ' ', 0, 1);
        $pdf->SetFont('times','',9);
        $pdf->Cell(70, 5, "Adresse de l'établissement", 0, 0);
        $pdf->Cell(70, 5, $infoPdf->adresse_etablissement, 0, 1);
        $pdf->Cell(70, 5, "Nom commercial", 0, 0);
        $pdf->Cell(70, 5, $infoPdf->nom_commercial, 0, 1);
        $pdf->Cell(70, 5, "Activite(s) exercee(s)", 0, 0);
        $cellWidth = 70;
        $pdf->MultiCell($cellWidth, 5, $infoPdf->activites_exercees, 0, 'L');
        $pdf->Cell(70, 5, "Date de commencement d'activité", 0, 0);
        $pdf->Cell(70, 5, $infoPdf->date_commencement_activite, 0, 1);
        $pdf->Cell(70, 5, "Origine du fonds ou de l'activite", 0, 0);
        $pdf->Cell(70, 5, $infoPdf->origine_fonds_activite, 0, 1);
        $pdf->Cell(70, 5, "Mode d'exploitation", 0, 0);
        $pdf->Cell(70, 5, $infoPdf->mode_exploitation, 0, 1);
        $pdf->Cell(70, 5, ' ', 0, 1); 
        $pdf->SetX(165);
        $pdf->Image($imagePath2, $pdf->GetX(), $pdf->GetY(), 34);
        $pdf->Ln(30);
        $pdf->SetX(170);
        $pdf->Cell(70, 5, "Fin de l'extrait", 0, 1);

        
        $pdfContent = $pdf->Output($pdfFileName, 'S');
        
        return response()->streamDownload(function() use ($pdfContent) {
            echo $pdfContent;
        }, $pdfFileName);
    }
    public function generatePdf(Request $request)
    {
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

        setlocale(LC_TIME, 'fr_FR.UTF-8', 'fra');
        $date_actuelle = strftime('%e %B %Y'); // date

        // Générer le PDF
        $pdf = new TCPDF();

        $pdf->AddPage();

        //image :
        $imagePath1 = public_path('image/output-onlinepngtools.jpg');
        $imagePath2 = public_path('image/tampon-v1-blue.jpg');

        $width = 150; // Largeur de l'image
        $height = 150; // Hauteur de l'image
        $pageWidth = 210; // Largeur
        $pageHeight = 297; // Hauteur
        $x = ($pageWidth - $width) / 2; // Calcul de la position X pour centrer l'image
        $y = ($pageHeight - $height) / 2; // Calcul de la position Y pour centrer l'image
        $pdf->Image($imagePath1, $x, $y, $width, $height); // Ajustez la taille et la position de l'image selon vos besoins

        $pdf->Cell(70, 5, 'Greffe du Tribunal de Reims', 0, 1);
        $pdf->Cell(70, 5, '55-57 Rue Thiers, ', 0, 1);
        $pdf->Cell(70, 5, '51100 Reims', 0, 1);
        $pdf->Cell(70, 5, ' ', 0, 1);  // Cellules vides
        $pdf->Cell(70, 5, ' ', 0, 1);  // Cellules vides
        $pdf->SetFont('times','B',40);
        $pdf->SetX(55);
        $pdf->Cell(70, 5, 'EXTRAIT KBIS', 0, 1);
        $pdf->SetFont('times','B',11);
        $pdf->Cell(70, 5, ' ', 0, 1);  // Cellules vides
        $pdf->Cell(70, 5, ' ', 0, 1);  // Cellules vides
        $pdf->Cell(70, 5, "EXTRAIT D'IMMATRICULATION PRINCIPALE AU REGISTRE DU COMMERCE ET DES SOCIETES", 0, 1);
        $pdf->SetFont('times','',10);
        $pdf->SetX(85);
        $pdf->Cell(70, 5, "A jour au $date_actuelle", 0, 1);
        $pdf->Cell(70, 5, ' ', 0, 1);  // Cellules vides
        $pdf->SetFont('times','I',12);
        $pdf->SetX(10);
        $pdf->Cell(70, 5, "IDENTIFICATION DE LA PERSONNE MORALE", 0, 1);
        $pdf->Cell(70, 5, ' ', 0, 1);  // Cellules vides
        $pdf->SetFont('times','',9);
        $pdf->Cell(70, 5, "Immatriculation au RCS, numero ", 0, 0);
        $pdf->Cell(70, 5, $numero_rcs, 0, 1);
        $pdf->Cell(70, 5, "Date d'immatriculation ", 0, 0);
        $pdf->Cell(70, 5, $date_immatriculation, 0, 1);
        $pdf->Cell(70, 5, "Denomination ou raison sociale ", 0, 0);
        $pdf->Cell(70, 5, $denomination_raison_sociale , 0, 1);
        $pdf->Cell(70, 5, "Forme juridique ", 0, 0);
        $pdf->Cell(70, 5, $forme_juridique, 0, 1);
        $pdf->Cell(70, 5, "Capital social ", 0, 0);
        $pdf->Cell(70, 5, $capital_social, 0, 1);
        $pdf->Cell(70, 5, "Adresse du siege ", 0, 0);
        $pdf->Cell(70, 5, $adresse_siege, 0, 1);
        $pdf->Cell(70, 5, "Duree de la personne morale ", 0, 0);
        $pdf->Cell(70, 5, "Jusqu'au " . $duree_personne_morale, 0, 1);
        $pdf->Cell(70, 5, "Date de cloture de l'exercice social ", 0, 0);
        $pdf->Cell(70, 5,  $date_cloture_exercice_social, 0, 1);
        $pdf->Cell(70, 5, ' ', 0, 1);  // Cellules vides
        $pdf->SetFont('times','I',12);
        $pdf->SetX(10);
        $pdf->Cell(70, 5, "GESTION, DIRECTION, ADMINISTRATION, CONTROLE, ASSOCIES OU MEMBRES", 0, 1);
        $pdf->Cell(70, 5, ' ', 0, 1);  // Cellules vides
        $pdf->SetFont('times','',12);
        $pdf->Cell(70, 5, "Gerant", 0, 1);
        $pdf->Cell(70, 5, ' ', 0, 1);  // Cellules vides
        $pdf->SetFont('times','',9);
        $pdf->SetX(30);
        $pdf->Cell(51, 5, "Nom, prenoms ", 0, 0);
        $pdf->Cell(70, 5, $nom . ' , ' . $prenoms, 0, 1);
        $pdf->SetX(30);
        $pdf->Cell(51, 5, "Date et lieu de naissance", 0, 0);
        $pdf->Cell(70, 5, $date_naissance. ' , ' . $lieu_naissance, 0, 1);
        $pdf->SetX(30);
        $pdf->Cell(51, 5, "Nationalite", 0, 0);
        $pdf->Cell(70, 5, $nationalite, 0, 1);
        $pdf->SetX(30);
        $pdf->Cell(51, 5, "Domicile personnel", 0, 0);
        $pdf->Cell(70, 5, $domicile_personnel_representant, 0, 1);
        $pdf->Cell(70, 5, ' ', 0, 1);  // Cellules vides
        $pdf->SetFont('times','I',12);
        $pdf->SetX(10);
        $pdf->Cell(70, 5, "RENSEIGNEMENTS RELATIFS A L'ACTIVITE ET A L'ETABLISSEMENT PRINCIPAL", 0, 1);
        $pdf->Cell(70, 5, ' ', 0, 1);  // Cellules vides
        $pdf->SetFont('times','',9);
        $pdf->Cell(70, 5, "Adresse de l'établissement", 0, 0);
        $pdf->Cell(70, 5, $adresse_etablissement, 0, 1);
        $pdf->Cell(70, 5, "Nom commercial", 0, 0);
        $pdf->Cell(70, 5, $nom_commercial, 0, 1);
        $pdf->Cell(70, 5, "Activite(s) exercee(s)", 0, 0);
        $cellWidth = 70;
        $pdf->MultiCell($cellWidth, 5, $activites_exercees, 0, 'L');
        $pdf->Cell(70, 5, "Date de commencement d'activité", 0, 0);
        $pdf->Cell(70, 5, $date_commencement_activite, 0, 1);
        $pdf->Cell(70, 5, "Origine du fonds ou de l'activite", 0, 0);
        $pdf->Cell(70, 5, $origine_fonds_activite, 0, 1);
        $pdf->Cell(70, 5, "Mode d'exploitation", 0, 0);
        $pdf->Cell(70, 5, $mode_exploitation, 0, 1);
        $pdf->Cell(70, 5, ' ', 0, 1);  // Cellules vides
        $pdf->SetX(165);
        $pdf->Image($imagePath2, $pdf->GetX(), $pdf->GetY(), 34);
        $pdf->Ln(30); // Saut de ligne après l'image
        $pdf->SetX(170);
        $pdf->Cell(70, 5, "Fin de l'extrait", 0, 1);

        // Générer le PDF
        $pdfFilePath = public_path('mon_pdf.pdf'); // Spécifiez le chemin complet avec le nom du fichier PDF
        $pdf->Output($pdfFilePath, 'F'); // Récupérer le contenu du PDF

        // Nettoie (efface) le contenu de la temporisation de sortie
        ob_clean();

        // Rediriger vers une autre page
        return redirect()->route('envoyer-email');
    }
}
