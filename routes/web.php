<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\CommandeController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('clients', ClientController::class);
Route::resource('produits', ProduitController::class);

Route::resource('commandes', CommandeController::class)
    ->only(['index', 'create', 'store']);
Route::get('/facture/{commande}', [CommandeController::class, 'facture'])
    ->name('commandes.facture');