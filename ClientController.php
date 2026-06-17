<?php
namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller {
    public function index() {
        $clients = Client::all();
        return view('clients.index', compact('clients'));
    }

    public function store(Request $request) {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'telephone' => 'required|string',
            'email' => 'required|email|unique:clients,email'
        ]);

        Client::create($request->all());
        return redirect()->route('clients.index')->with('success', 'Client créé avec succès.');
    }

    public function update(Request $request, Client $client) {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'telephone' => 'required|string',
            'email' => 'required|email|unique:clients,email,' . $client->id
        ]);

        $client->update($request->all());
        return redirect()->route('clients.index')->with('success', 'Client mis à jour.');
}
    public function destroy(Client $client) {
        $client->delete();
        return redirect()->route('clients.index')->with('success', 'Client supprimé.');
    
}
}