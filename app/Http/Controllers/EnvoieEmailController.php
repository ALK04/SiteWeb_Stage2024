<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EnvoieEmailController extends Controller
{
    public function envoyerEmail(Request $request)
    {
        // Envoi de l'email au client
        $recipient_email = $request->session()->get('email');
        $subject = 'Extrait kbis.';
        $message = 'Bonjour, vous trouverez ci-dessous le mail envoyé pour avoir acheté le KBIS.';
        $pdfContent = public_path('mon_pdf.pdf');

        // Envoyer le courriel avec le PDF en pièce jointe
        Mail::to($recipient_email)->send(new ContactFormMail($subject, $message, $pdfContent));

        // Envoi de l'email à une adresse pour l'entreprise
        $predefined_email = env('AUTRE_EMAIL');
        Mail::to($predefined_email)->send(new ContactFormMail($subject, $message, $pdfContent));

        $request->session()->flash('success', 'Email envoyé avec succès.');

        return redirect()->route('home');
    }
}
