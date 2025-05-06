@extends('layouts.main')
@section('title', 'Obtenir son extrait Kbis - K-bis')
@section('description', 'Découvrez notre site de Kbis et obtenez rapidement votre extrait Kbis en ligne. Services rapides, fiables et sécurisés pour tous vos besoins administratifs concernant une entreprise.')
@section('content')

    @php
        if (request()->isMethod('post')) {
            if (request()->has('email')) {
                session(['email_contact' => request()->input('email')]);
                session(['nom_contact' => request()->input('nom')]);
                session(['prenom_contact' => request()->input('prenom')]);
                session(['tel_contact' => request()->input('phone')]);
                session(['message_contact' => request()->input('message')]);
            }
        }
    @endphp
{{--    formulaire de contact    --}}
    <div class="container2">
        <div class="contact">
            <form id="contact-form" method="post" action="{{ route('contact.submit') }}" onsubmit="return validateForm()">
                @csrf
                <input id="form_prenom" name="prenom" placeholder="Prénom" class="contact prenom" type="text" value="{{ old('prenom') }}">
                <input id="form_nom" name="nom" placeholder="Nom" class="contact nom" type="text" value="{{ old('nom') }}">
                <input id="form_tel" name="phone" placeholder="0768143035" class="contact telephone" type="tel" value="{{ old('phone') }}">
                <img class="image_taille2" src="{{ asset('image/5860.jpg') }}" alt="Logo Formulaire">
                <input id="form_email" name="email" placeholder="example@email.com" class="contact email" type="email" value="{{ old('email') }}">
                <textarea id="form_message" name="message" placeholder="Tapez votre message" class="contact message" cols="30" rows="10">{{ old('message') }}</textarea>
                <button type="submit">Envoyer votre demande</button>
            </form>
        </div>
    </div>
@endsection
