@extends('layouts.app')

@section('content')

<h2>Modifier un Client</h2>

<form action="{{ route('clients.update', $client->id) }}" method="POST">

    @csrf
    @method('PUT')

    <input type="text"
           name="nom"
           value="{{ $client->nom }}"
           class="form-control mb-2">

    <input type="text"
           name="prenom"
           value="{{ $client->prenom }}"
           class="form-control mb-2">

    <input type="text"
           name="telephone"
           value="{{ $client->telephone }}"
           class="form-control mb-2">

    <input type="email"
           name="email"
           value="{{ $client->email }}"
           class="form-control mb-2">

    <textarea name="adresse"
              class="form-control mb-2">{{ $client->adresse }}</textarea>

    <button type="submit" class="btn btn-success">
        Mettre à jour
    </button>

</form>

@endsection