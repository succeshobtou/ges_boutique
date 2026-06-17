<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Commande;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommandeController extends Controller
{
    public function index()
    {
        $commandes = Commande::with('client')
                    ->orderBy('date_commande', 'desc')
                    ->get();

        return view('commandes.index', compact('commandes'));
    }

    public function create()
    {
        $clients = Client::all();

        $produits = Produit::where(
            'quantite_stock',
            '>',
            0
        )->get();

        return view(
            'commandes.create',
            compact('clients', 'produits')
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'produits' => 'required|array',
            'quantites' => 'required|array'
        ]);

        DB::transaction(function () use ($request) {

            $commande = Commande::create([
                'client_id' => $request->client_id,
                'date_commande' => now(),
                'montant_total' => 0
            ]);

            $total = 0;

            foreach ($request->produits as $index => $produit_id) {

                $quantite = $request->quantites[$index];

                $produit = Produit::find($produit_id);

                if (
                    $produit &&
                    $produit->quantite_stock >= $quantite
                ) {

                    $commande->produits()->attach(
                        $produit_id,
                        [
                            'quantite' => $quantite,
                            'prix_unitaire' => $produit->prix_unitaire
                        ]
                    );

                    $total +=
                        $produit->prix_unitaire *
                        $quantite;

                    $produit->decrement(
                        'quantite_stock',
                        $quantite
                    );
                }
            }

            $commande->update([
                'montant_total' => $total
            ]);
        });

        return redirect()
            ->route('commandes.index')
            ->with('success', 'Commande enregistrée');
    }
    public function facture(Commande $commande)
{
    $commande->load('client', 'produits');

    return view('commandes.facture', compact('commande'));
}
}