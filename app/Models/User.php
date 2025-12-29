<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'utilisateurs';

    protected $fillable = [
        'nom_utilisateur',
        'mot_de_passe',
        'adresse',
        'telephone',
        'email',
        'id_role',
    ];

    protected $hidden = [
        'mot_de_passe',
    ];

    // 🔐 OBLIGATOIRE POUR AUTH
    public function getAuthPassword()
    {
        return $this->mot_de_passe;
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'id_role');
    }

    public function isAcheteur()
    {
        return $this->role && $this->role->nom_role === 'acheteur';
    }
}
