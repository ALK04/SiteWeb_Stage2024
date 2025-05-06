@extends('layouts.main')
@section('title', 'Obtenir son extrait Kbis - K-bis')
@section('description', 'Découvrez notre site de Kbis et obtenez rapidement votre extrait Kbis en ligne. Services rapides, fiables et sécurisés pour tous vos besoins administratifs concernant une entreprise.')
@section('content')

    @vite('resources/scss/CGV.scss')
    @stack('styles')

<div class="container">
    <h1>Mentions Légales</h1>

    <h2>Identité de l'entreprise</h2>
    <p>Nom : [Votre nom ou raison sociale]</p>
    <p>Prénom : [Votre prénom, si applicable]</p>
    <p>Adresse : [Votre adresse]</p>
    <p>Numéro d'immatriculation au RCS : [Votre numéro RCS]</p>
    <p>Mail : <a href="mailto:votre.email@example.com">votre.email@example.com</a></p>
    <p>Téléphone : <a href="tel:+33000000000">+33 0 00 00 00 00</a></p>
    <p>Numéro d'identification à la TVA : [Votre numéro de TVA]</p>

    <h2>Identité de l'hébergeur</h2>
    <p>Nom de l'hébergeur : [Nom de l'hébergeur]</p>
    <p>Adresse de l'hébergeur : [Adresse de l'hébergeur]</p>
    <p>Numéro de téléphone de l'hébergeur : [Numéro de téléphone de l'hébergeur]</p>

    <h2>Activité réglementée</h2>
    <p>Si vous exercez une activité réglementée soumise à autorisation, mentionnez le nom et l'adresse de l'autorité qui a délivré l'autorisation : [Nom et adresse de l'autorité compétente]</p>

</div>
@endsection
