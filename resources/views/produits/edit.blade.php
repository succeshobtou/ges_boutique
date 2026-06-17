@extends('layouts.app')

@section('content')

<h2>Modifier un Produit</h2>

<form action="{{ route('produits.update', $produit->id) }}" method="POST">

    @csrf
    @method('PUT')

    <input type="text"
           name="reference"
           value="{{ $produit->reference }}"
           class="form-control mb-2">

    <input type="text"
           name="designation"
           value="{{ $produit->designation }}"
           class="form-control mb-2">

    <input type="number"
           step="0.01"
           name="prix_unitaire"
           value="{{ $produit->prix_unitaire }}"
           class="form-control mb-2">

    <input type="number"
           name="quantite_stock"
           value="{{ $produit->quantite_stock }}"
           class="form-control mb-2">

    <textarea name="description"
              class="form-control mb-2">{{ $produit->description }}</textarea>

    <button type="submit" class="btn btn-success">
        Mettre à jour
    </button>

</form>

@endsection