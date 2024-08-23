<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Enseignant extends Model implements CanResetPassword
{
    use HasFactory,HasApiTokens;
    use Notifiable;
    protected $fillable = [
        'nom', 'prenom', 'email', 'telephone', 'mot_de_passe', 
        'date_naissance', 'genre', 'niveau_etude', 'photo_diplome', 
        'matiere_a_enseigner', 'photo_profile', 'description', 'is_active'
    ];

      // Define the relationship with Planning
      public function plannings()
      {
          return $this->hasMany(Planning::class);
      }
  
      // Define the relationship with Session
      public function sessions()
      {
          return $this->hasMany(Session::class);
      }
  
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
  
      // Define the relationship with AdminPayments
      public function adminPayments()
      {
          return $this->hasMany(AdminPayments::class);
      }
}
