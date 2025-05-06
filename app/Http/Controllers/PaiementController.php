<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaiementController extends Controller
{
    public function recupereDonner(Request $request)
    {
        // Récupérer l'e-mail soumis dans le formulaire
        $email = $request->input('email');
        // Stocker l'e-mail dans la session
        $request->session()->put('email', $email);
        // Rediriger l'utilisateur vers une autre page ou effectuer toute autre action nécessaire
        return redirect()->route('page_apres_paiement');
    }
}
