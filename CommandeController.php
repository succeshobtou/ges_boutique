<?php
namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Produit;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommandeController extends Controller {
    public function index() {
        $commandes = Commande::with('client')->orderBy('date_commande', 'desc')->get();
        return view('commandes.index', compact('commandes'));
    }

    public function create() {
        $clients = Client::all();
        $produits = Produit::where('quantite_stock', '>', 0)->get();
        return view('commandes.create', compact('clients', 'produits'));
    }

    public function store(Request $request) {
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

            $totalCalcule = 0;

            foreach ($request->produits as $index => $produit_id) {
                $quantiteCommande = $request->quantites[$index];
                $produit = Produit::lockForUpdate()->find($produit_id);

                if ($produit && $produit->quantite_stock >= $quantiteCommande) {
                    $commande->produits()->attach($produit_id, [
                        'quantite' => $quantiteCommande,
                        'prix_unitaire' => $produit->prix_unitaire
                    ]);

                    $totalCalcule += $produit->prix_unitaire * $quantiteCommande;
                    $produit->decrement('quantite_stock', $quantiteCommande);
                }
            }

            $commande->update(['montant_total' => $totalCalcule]);
        ]);

        return redirect()->route('commandes.index')->with('success', 'Commande enregistrée avec succès.');
    }
}