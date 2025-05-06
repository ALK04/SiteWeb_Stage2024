@extends('layouts.main')

@section('title', 'Obtenir son extrait Kbis - K-bis')
@section('description', 'Découvrez notre site de Kbis et obtenez rapidement votre extrait Kbis en ligne. Services rapides, fiables et sécurisés pour tous vos besoins administratifs concernant une entreprise. Document KBIS.')
@section('content')

    {{-- Inclusion de SweetAlert2 une seule fois --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    {{-- Affichage de l'alerte en cas d'erreur ou de succès --}}
    @if(session('error'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Oups...',
                    text: @json(session('error')),
                    confirmButtonText: 'OK'
                });
            });
        </script>
    @endif

    @if(session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Succès',
                    text: @json(session('success')),
                    timer: 2500,  // Durée en millisecondes avant la fermeture automatique
                    timerProgressBar: true,
                    showConfirmButton: false
                });
            });
        </script>
    @endif

    <div class="recherche_kbis">
        <h2>Obtenir son extrait kbis :</h2>
        <input type="text" id="texteInput" placeholder="Entrez le nom d’une entreprise ou le SIREN" aria-label="Nom de l'entreprise ou SIREN">
        <button id="submitButton" disabled class="disabled-button" onclick="validerNom_entreprise()">Rechercher mon KBIS</button>
    </div>

    <div class="containerblanc">
        <h2>Plus de 22 millions d’entreprises</h2>
        <div class="containergris">
            <img class="image_taille5" src="{{ asset('image/entreprise.webp') }}" alt="Image d'ordinateur">
            <p>Notre base de données, alimentée par l'API Pappers, couvre l'ensemble des entreprises françaises.
                Elle est régulièrement mise à jour pour fournir des informations légales et concurrentielles,
                qui sont constamment actualisées. Vous y trouverez des données détaillées sur les statuts juridiques,
                les bilans financiers, les dirigeants et les activités de chaque entreprise. </p>
        </div>
    </div>

    <div id="tarif-section">
        <div class="containertarif">
            <div class="three">
                <h1>Tarif‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎  ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ </h1>
                <h2>Tarif</h2>
            </div>
            <div class="cubeblanc">
                <h4>Notre offre</h4>
                <p style="font-size: 25px">19.99 €</p> <p>/Kbis</p><br>
                <button onclick="scrollToTop()" id="scrollButton" class="button">Rechercher</button>
            </div>
            <p>Accès simple et rapide à des informations sur les entreprises grâce à [Nom entreprise],<br> le tout à un tarif unique.</p>
        </div>
    </div>
@endsection

