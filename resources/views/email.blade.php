{{--
Page plus utilisé depuis l'implémention de l'api
--}}
@extends('layouts.main')
@section('title', 'Obtenir son extrait Kbis - K-bis')
@section('description', 'Découvrez notre site de Kbis et obtenez rapidement votre extrait Kbis en ligne. Services rapides, fiables et sécurisés pour tous vos besoins administratifs concernant une entreprise.')
@section('content')

{{-- formulaire de contact pour récupéré l'email  --}}
    <div class="container3">
        <div class="paiement">
            <form id="contact-form" method="post" action="{{ route('email.post') }}">
                @csrf
                <input type="email" id="email" name="email" placeholder="example@email.com" value="{{ old('email') }}" class="paiement email" required><br>
                <button type="submit">Paiement</button>
            </form>
        </div>
    </div>
@endsection
