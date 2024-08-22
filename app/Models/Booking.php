<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id', 'session_id', 'enseignant_id', 'date'
    ];

    // Define the relationship with Eleve
    public function eleve()
    {
        return $this->belongsTo(Student::class);
    }

    // Define the relationship with Session
    public function session()
    {
        return $this->belongsTo(Session::class);
    }

    // Define the relationship with Enseignant
    public function enseignant()
    {
        return $this->belongsTo(Enseignant::class);
    }
}
