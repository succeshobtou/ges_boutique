<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Produit extends Model
{
    protected $fillable = [
        'reference',
        'designation',
        'prix_unitaire',
        'quantite_stock',
        'description'
    ];

    public function commandes(): BelongsToMany
    {
        return $this->belongsToMany(Commande::class)
                    ->withPivot('quantite', 'prix_unitaire')
                    ->withTimestamps();
    }
}