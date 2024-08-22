<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Model
{
    use HasFactory,HasApiTokens;
    protected $fillable = [
        'nom', 'prenom', 'email', 'mot_de_passe'
    ];

    // Define the relationship with AdminPayments
    public function adminPayments()
    {
        return $this->hasMany(AdminPayments::class);
    }
}
