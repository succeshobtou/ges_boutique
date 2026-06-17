@extends('layouts.app')

@section('content')

<h2>Nouvelle Commande</h2>

<form action="{{ route('commandes.store') }}"
      method="POST">

    @csrf

    <label>Client</label>

    <select name="client_id"
            class="form-control mb-3">

        @foreach($clients as $client)

            <option value="{{ $client->id }}">
                {{ $client->nom }}
                {{ $client->prenom }}
            </option>

        @endforeach

    </select>

    <label>Produit</label>

    <select name="produits[]"
            class="form-control mb-2">

        @foreach($produits as $produit)

            <option value="{{ $produit->id }}">
                {{ $produit->designation }}
                (Stock : {{ $produit->quantite_stock }})
            </option>

        @endforeach

    </select>

    <input type="number"
           name="quantites[]"
           class="form-control mb-3"
           placeholder="Quantité">

    <button class="btn btn-success">
        Valider la commande
    </button>

</form>

@endsection