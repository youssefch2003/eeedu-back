<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;


     // Specify which attributes are mass assignable
     protected $fillable = [
        'nom',
        'prenom',
        'email',
        'telephone',
        'mot_de_passe',
        'date_naissance',
        'genre',
    ];
}
