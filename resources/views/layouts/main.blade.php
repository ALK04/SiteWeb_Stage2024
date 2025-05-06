<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="Content-Language" content="{{ app()->getLocale() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="keywords" content="Kbis, achat Kbis, obtenir Kbis, Kbis en ligne, Kbis rapide, Kbis entreprise, Kbis facile, certificat Kbis, document Kbis, Kbis express, Kbis direct, Kbis officiel, Kbis simplifié, Kbis professionnel, Kbis service, commande Kbis, Kbis France, Kbis pour entreprise">

    {{-- Favicons --}}
    {{-- <link rel="apple-touch-icon" sizes="180x180" href="{{ Vite::image('favicon/apple-touch-icon.png') }}"> --}}
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('image/faticon.webp') }}">
    {{-- <link rel="icon" type="image/png" sizes="16x16" href="{{ Vite::image('favicon/favicon-16x16.png') }}"> --}}
    {{-- <link rel="manifest" href="{{ Vite::image('favicon/site.webmanifest') }}"> --}}

    @vite('resources/scss/main.scss')
    @vite('resources/scss/nav.scss')
    @vite('resources/scss/footer.scss')
    @vite('resources/scss/contact.scss')
    @vite('resources/scss/welcome.scss')

    @stack('styles')

    {{-- Title & Description & Canonical url --}}
    <title>
        @if (view()->hasSection('title'))
            @yield('title')
        @else
            {{ config('app.name') }}
        @endif
    </title>
    <meta name="description" content="@if (view()->hasSection('description')) @yield('description') @else {{ config('app.name') }} @endif" />

    @if (view()->hasSection('canonical'))
        <link rel="canonical" href="@yield('canonical')">
    @else
        <link rel="canonical" href="{{ url()->current() }}">
    @endif

    {{-- OG metas --}}
    <meta property="og:site_name" content="">
    <meta property="og:title" content="@if (view()->hasSection('title')) @yield('title') @else {{ config('app.name') }} @endif">
    <meta property="og:description" content="@if (view()->hasSection('description')) @yield('description') @else {{ config('app.name') }} @endif">
    <meta property="og:language" content="{{ app()->getLocale() }}">
    <meta property="og:type" content="website">
    {{-- Image à insérer --}}
    {{-- <meta property="og:image" content="{{ Vite::image('blank.jpg') }}"> --}}

    @if (!app()->environment('production'))
        <meta name="robots" content="index, follow">
    @endif
</head>

<body>
<div style="background-color: #F5F5FE; font-family: 'Calibri', sans-serif;">
    <img class="image_taille" src="{{ asset('image/format_png.webp') }}" alt="Logo">
    <p class="centre" style="font-size: 14px;" >Trouvez votre extrait kbis en deux cliques ! </p>

    <nav class="sticky">
        <img class="header_mobile2" src="{{ asset('image/format_png.webp') }}" alt="Logo">
        <p class="header_mobile">Trouvez votre extrait kbis en un clin d'œil ! </p>
{{--
        <button id="burgermenu"><img src="{{ asset('image/burger.svg') }}" alt="Bouton"></button>
--}}
        <label class="burger" for="burger">
            <input type="checkbox" id="burger">
            <span></span>
            <span></span>
            <span></span>
        </label>

        <ul class="list-inline" id="menu" class="menu">
            <li><a href="{{ url('/') }}">Page principale</a></li>
            <li><a href="{{ url('/#tarif-section') }}">Tarif</a></li>
            <li><a href="{{ url('contact') }}">Contact</a></li>
        </ul>
        {{--<a href="#" class="right">Logo</a>--}}
    </nav>

    <main>
        @yield('content')
    </main>

    <!-- footer -->
    <div class="footer-basic">
        <footer>
            <div class="footer-top">
                <div class="left-side">
                    <img class="image_tailleM" src="{{ asset('image/republique.svg') }}" alt="Logo">
                </div>
            </div>
            <div class="footer-bot">
                <div class="bot-left">
                    <span>© 2024 - Tous Droits Réservés</span>
                </div>
                <div class="bot-right">
                    <a href="{{ url('contact') }}">Contact</a>
                    <a href="{{ route('CGV') }}">Condition Générales de ventes</a>
                    <a href="{{ route('Mention_legale') }}">Mentions légales</a>
                </div>
            </div>
        </footer>
    </div>

</div>
{{-- @include('layouts.partials.cookies') --}}
@vite('public/js/app.js')
@stack('scripts')

{{-- script pour le lien tarif de la barre de nav --}}

<!-- Scripts -->
<script src="{{ asset('js/bootstrap.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>

<script>
    // Cibler le changement d'état du bouton burger
    document.querySelector('.burger input').addEventListener('change', function() {
        // Toggle la classe 'mobile' sur le menu pour le faire apparaître/disparaître
        document.getElementById('menu').classList.toggle('mobile');
    });

    // Scrolling doux pour les ancres
    document.querySelectorAll('a[href^="#"], a[href*="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            if (this.pathname === window.location.pathname) {
                e.preventDefault();
                document.querySelector(this.hash).scrollIntoView({
                    behavior: 'smooth'
                });
                // Fermer le menu si un lien est cliqué (pour une meilleure expérience utilisateur)
                document.getElementById('menu').classList.remove('mobile');
            }
        });
    });

    // Si l'URL contient une ancre au chargement de la page, scrolle doucement vers la div pour le tarif
    if (window.location.hash) {
        document.querySelector(window.location.hash).scrollIntoView({
            behavior: 'smooth'
        });
    }
</script>


</body>
</html>
