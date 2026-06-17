<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    public function index()
    {
        $produits = Produit::all();

        return view('produits.index', compact('produits'));
    }

    public function create()
    {
        return view('produits.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'reference' => 'required|unique:produits',
            'designation' => 'required',
            'prix_unitaire' => 'required|numeric',
            'quantite_stock' => 'required|integer'
        ]);

        Produit::create($request->all());

        return redirect()
            ->route('produits.index')
            ->with('success', 'Produit ajouté');
    }

    public function edit(Produit $produit)
    {
        return view('produits.edit', compact('produit'));
    }

    public function update(Request $request, Produit $produit)
    {
        $request->validate([
            'reference' => 'required|unique:produits,reference,' . $produit->id,
            'designation' => 'required',
            'prix_unitaire' => 'required|numeric',
            'quantite_stock' => 'required|integer'
        ]);

        $produit->update($request->all());

        return redirect()
            ->route('produits.index')
            ->with('success', 'Produit modifié');
    }

    public function destroy(Produit $produit)
    {
        $produit->delete();

        return redirect()
            ->route('produits.index')
            ->with('success', 'Produit supprimé');
    }
}