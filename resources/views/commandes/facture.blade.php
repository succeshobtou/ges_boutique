@extends('layouts.app')

@section('content')

<div class="container">

    <h1 class="text-center">FACTURE</h1>

    <hr>

    <p><strong>N° Commande :</strong> {{ $commande->id }}</p>
    <p><strong>Date :</strong> {{ $commande->date_commande }}</p>

    <h4>Informations Client</h4>

    <p>
        {{ $commande->client->nom }}
        {{ $commande->client->prenom }}
    </p>

    <p>{{ $commande->client->telephone }}</p>

    <p>{{ $commande->client->email }}</p>

    <table class="table table-bordered">

        <thead>
            <tr>
                <th>Produit</th>
                <th>Prix</th>
                <th>Quantité</th>
                <th>Sous-total</th>
            </tr>
        </thead>

        <tbody>

        @foreach($commande->produits as $produit)

            <tr>

                <td>{{ $produit->designation }}</td>

                <td>{{ $produit->pivot->prix_unitaire }} FCFA</td>

                <td>{{ $produit->pivot->quantite }}</td>

                <td>
                    {{ $produit->pivot->prix_unitaire * $produit->pivot->quantite }}
                    FCFA
                </td>

            </tr>

        @endforeach

        </tbody>

    </table>

    <h3 class="text-end">
        Total : {{ $commande->montant_total }} FCFA
    </h3>

    <button onclick="window.print()" class="btn btn-primary">
        Imprimer la facture
    </button>

</div>

@endsection