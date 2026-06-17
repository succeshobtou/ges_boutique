@extends('layouts.app')

@section('content')

<h2>Ajouter un Produit</h2>

<form action="{{ route('produits.store') }}"
      method="POST">

    @csrf

    <input type="text"
           name="reference"
           class="form-control mb-2"
           placeholder="Référence">

    <input type="text"
           name="designation"
           class="form-control mb-2"
           placeholder="Désignation">

    <input type="number"
           step="0.01"
           name="prix_unitaire"
           class="form-control mb-2"
           placeholder="Prix">

    <input type="number"
           name="quantite_stock"
           class="form-control mb-2"
           placeholder="Stock">

    <textarea name="description"
              class="form-control mb-2"></textarea placeholder="Descriptions">

    <button class="btn btn-success">
        Enregistrer
    </button>

</form>

@endsection