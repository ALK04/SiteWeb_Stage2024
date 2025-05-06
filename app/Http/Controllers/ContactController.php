<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Formulaire_contact;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        $nom = $request->input('nom');
        $prenom = $request->input('prenom');
        $tel = $request->input('phone');
        $email = $request->input('email');
        $message = $request->input('message');

        // Enregistrer les données dans la base de données
        $contact = new Formulaire_contact;
        $contact->nom = $nom;
        $contact->prenom = $prenom;
        $contact->tel = $tel;
        $contact->email= $email;
        $contact->message = $message;
        $contact->save();

        // Redirection avec un message de succès
        return redirect()->back()->with('success', 'Votre demande a été envoyée avec succès.');
    }
}
