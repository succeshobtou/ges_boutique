@extends('layouts.app')

@section('content')

<h2>Liste des Commandes</h2>

<a href="{{ route('commandes.create') }}"
   class="btn btn-primary mb-3">
   Nouvelle Commande
</a>

<table class="table table-bordered">

    <tr>
        <th>ID</th>
        <th>Client</th>
        <th>Date</th>
        <th>Montant</th>
        <th>Facture</th>
    </tr>

    @foreach($commandes as $commande)

    <tr>
        <td>{{ $commande->id }}</td>

        <td>
            {{ $commande->client->nom }}
            {{ $commande->client->prenom }}
        </td>

        <td>{{ $commande->date_commande }}</td>

        <td>{{ $commande->montant_total }} FCFA</td>
        <td>
    <a href="{{ route('commandes.facture', $commande->id) }}"
       class="btn btn-success">
        Généré Facture
    </a>
</td>
    </tr>
    

    @endforeach

</table>

@endsection