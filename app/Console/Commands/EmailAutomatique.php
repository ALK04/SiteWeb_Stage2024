<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class EmailAutomatique extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:automatique';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Envoie un e-mail automatique chaque semaine';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $amount = env('PRIX_API');
        // Exécuter la requête SQL pour récupérer le nombre de requêtes de la semaine
        $nombre_de_requete = DB::table('information')
            ->where('heure_achat', '>=', DB::raw('DATE_SUB(NOW(), INTERVAL 1 WEEK)'))
            ->count();
        $ACHAT = $nombre_de_requete*$amount;

        // Construire le message avec le nombre de requêtes
        $message = "Voici le revenu de cette semaine : $ACHAT € gagnés.";

        // Envoyer l'e-mail
        Mail::raw($message, function ($mail) {
            $mail->to(env('MAIL_AUTO'))
                ->subject('Rapport hebdomadaire - Nombre de requêtes');
        });

        $this->info('E-mail automatique envoyé avec succès !');

    }
}
