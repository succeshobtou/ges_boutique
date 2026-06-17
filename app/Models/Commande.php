<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Commande extends Model
{
    protected $fillable = [
        'client_id',
        'date_commande',
        'montant_total'
    ];

    protected $casts = [
        'date_commande' => 'date'
    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function produits(): BelongsToMany
    {
        return $this->belongsToMany(Produit::class)
                    ->withPivot('quantite', 'prix_unitaire')
                    ->withTimestamps();
    }
}