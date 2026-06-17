<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Client extends Model
{
    protected $fillable = [
        'nom',
        'prenom',
        'telephone',
        'adresse',
        'email'
    ];

    public function commandes(): HasMany
    {
        return $this->hasMany(Commande::class);
    }
}