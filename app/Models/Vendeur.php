<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vendeur extends Model
{
    protected $table = 'vendeurs'; // pluriel

       protected $fillable = [
        'id_utilisateur',
        'id_march',
    ];

    public function Utilisateur()
    {
        return $this->belongsTo(Utilisateur::class, 'id_utilisateur');
    }
}


