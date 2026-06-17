@extends('layouts.app')

@section('content')

<h2>Produits</h2>

<a href="{{ route('produits.create') }}"
   class="btn btn-primary mb-3">
    Nouveau Produit
</a>

<table class="table table-bordered">

    <tr>
        <th>Référence</th>
        <th>Désignation</th>
        <th>Prix</th>
        <th>Stock</th>
    </tr>

    @foreach($produits as $produit)

    <tr>
        <td>{{ $produit->reference }}</td>
        <td>{{ $produit->designation }}</td>
        <td>{{ $produit->prix_unitaire }}</td>
        <td>{{ $produit->quantite_stock }}</td>
    </tr>

    @endforeach

</table>

@endsection