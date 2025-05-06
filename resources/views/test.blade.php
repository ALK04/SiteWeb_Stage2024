@extends('layouts.main')

@section('title', 'Obtenir son extrait Kbis - K-bis')
@section('description', "Réponse de l'API Infolettre pour voir si ça fonctionne.")
@section('content')
    <style>
        .entreprise {
            width: 60%;
            margin-bottom: 20px;
            padding: 20px; /* Espacement uniforme autour de la boîte */
            border-radius: 30px;
            margin-left: auto;
            margin-right: auto;
            display: flex; /* Utilisation de flexbox pour aligner le contenu */
            align-items: center; /* Alignement vertical */
            justify-content: space-between; /* Espace entre les éléments */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            background-color: #FFF;
        }
        .entreprise h3 {
            margin: 0;
            color: #324FBE;
            font-weight: bold;
            font-family: 'Calibri', sans-serif;
        }
        .entreprise p {
            margin: 5px 0;
            color: #2B2D42;
            font-weight: bold;
            font-family: 'Calibri', sans-serif;
        }
        .pour_le_bouton {
            padding-bottom: 3%;
        }
        .btn-siren {
            background-color: #324FBE;
            color: #ffffff;
            font-style: normal;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 200px; /* Largeur fixe */
            margin: 10px 0; /* Marge autour du bouton */
            font-weight: bold;
            padding: 14px 0; /* Haut, Bas */
            border: none;
            border-radius: 30px;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s; /* Transition pour le changement de couleur */
            text-decoration: none;
            text-align: center;
        }
        .btn-siren:hover {
            background-color: #1212ff;
        }
        .image {
            width: 20%; /* Ajustement de la largeur de la colonne de l'image */
            text-align: right; /* Alignement de l'image à droite */
        }
        .image img {
            max-width: 100%; /* Pour s'assurer que l'image reste dans les limites de sa colonne */
            height: auto; /* Ajustement automatique de la hauteur de l'image */
        }
        .espace {
            margin-top: 2%;
        }
        @media screen and (max-width: 500px) {
            .image img {
                display: none;
            }
            .entreprise {
                width: 80%;
                flex-direction: column; /* Colonne pour petits écrans */
                text-align: center; /* Centrer le texte */
            }
            .pour_le_bouton {
                margin-top: 10%;
                padding-bottom: 3%;
            }
            .btn-siren {
                width: 100%; /* Largeur complète */
                padding: 14px 0; /* Haut, Bas */
            }
        }
    </style>
    <div class="espace">
        @if (!empty($entreprises))
            @foreach ($entreprises as $entreprise)
                <div class="entreprise">
                    <div class="texte">
                        <h3>{{ $entreprise['nom_complet'] }}</h3>
                        <p><strong>SIREN:</strong> {{ $entreprise['siren'] }}</p>
                        <p><strong>Adresse:</strong> {{ $entreprise['adresse'] }}</p>
                        <p class="pour_le_bouton"><strong>Ville:</strong> {{ $entreprise['libelle_commune'] }}</p>
                        <a href="{{ route('api_pappers', ['siren' => $entreprise['siren']]) }}" class="btn-siren">Valider</a>
                    </div>
                    <div class="image">
                        <img src="{{ asset('image/kbis_flou.png') }}" alt="image">
                    </div>
                </div>
            @endforeach
        @else
            <p>Aucune entreprise trouvée pour cette recherche.</p>
        @endif
    </div>
@endsection
