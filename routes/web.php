<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InfolettreController;
use App\Http\Controllers\ApiPappersController;
use App\Http\Controllers\ApresPaiementController;
use App\Http\Controllers\GenerationPdfController;
use App\Http\Controllers\EnvoieEmailController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PaiementController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('CGV', function () {
    return view('CGV');
})->name('CGV');

Route::get('Mention_legale', function () {
    return view('Mentions_legales');
})->name('Mention_legale');

Route::get('contact', function () {
    return view('contact');
});

Route::get('infolettre', [InfolettreController::class, 'show'])->name('infolettre');
Route::get('api_pappers', [ApiPappersController::class, 'show'])->name('api_pappers');

Route::get('page_paiement', function () {
    return view('page_paiement');
})->name('page_paiement');

Route::get('email', function () {
    return view('email');
})->name('email');

Route::post('email', function () {
    $email = request()->input('email');
    session(['email' => $email]);
    return redirect()->route('page_paiement');
})->name('email.post');

Route::get('page_apres_paiement', [ApresPaiementController::class, 'envoyedonnee'])->name('page_apres_paiement');
Route::get('generate-pdf', [GenerationPdfController::class, 'generatePdf'])->name('generate.pdf');
Route::get('envoyer-email', [EnvoieEmailController::class, 'envoyerEmail'])->name('envoyer-email');
Route::post('/contact-submit', [ContactController::class, 'submit'])->name('contact.submit');
Route::post('/paiementApi', [PaiementController::class, 'pagepaiement'])->name('paiementApi');
Route::get('/download-pdf/{id}', [GenerationPdfController::class, 'downloadPdf'])->name('download-pdf');

Route::get('test', 'InfolettreController@show')->name('test');
