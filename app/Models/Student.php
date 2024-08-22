<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Student extends Model
{
    use HasFactory,HasApiTokens;


     // Specify which attributes are mass assignable
     protected $fillable = [
        'nom',
        'prenom',
        'email',
        'telephone',
        "niveau_classe",
        'mot_de_passe',
        'date_naissance',
        'genre',
    ];
    // Define the relationship with Booking
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    // Define the relationship with Favoris
    public function favoris()
    {
        return $this->hasMany(Favoris::class);
    }

    // Define the relationship with Payments
    public function payments()
    {
        return $this->hasMany(Payments::class);
    }
}
