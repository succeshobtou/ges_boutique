@extends('layouts.app')

@section('content')

<h2>Ajouter un Client</h2>

<form action="{{ route('clients.store') }}" method="POST">

    @csrf

    <input type="text"
           name="nom"
           placeholder="Nom"
           class="form-control mb-2">

    <input type="text"
           name="prenom"
           placeholder="Prénom"
           class="form-control mb-2">

    <input type="text"
           name="telephone"
           placeholder="Téléphone"
           class="form-control mb-2">

    <input type="email"
           name="email"
           placeholder="Email"
           class="form-control mb-2">

    <textarea name="adresse"
              class="form-control mb-2"
              placeholder="Adresse"></textarea>

    <button class="btn btn-success">
        Enregistrer
    </button>

</form>

@endsection