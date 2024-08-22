<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planning extends Model
{
    use HasFactory;
    protected $fillable = [
        'enseignant_id', 'jour', 'matin_debut', 'matin_fin',
        'apres_midi_debut', 'apres_midi_fin'
    ];

    // Define the relationship with Enseignant
    public function enseignant()
    {
        return $this->belongsTo(Enseignant::class);
    }

    // Define the relationship with Session
    public function sessions()
    {
        return $this->hasMany(Session::class);
    }
}
