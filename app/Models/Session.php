<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;
    protected $fillable = [
        'planning_id', 'enseignant_id', 'student_id', 'date', 
        'time_debut', 'time_fin'
    ];

    // Define the relationship with Planning
    public function planning()
    {
        return $this->belongsTo(Planning::class);
    }

    // Define the relationship with Enseignant
    public function enseignant()
    {
        return $this->belongsTo(Enseignant::class);
    }

    // Define the relationship with Eleve
    public function eleve()
    {
        return $this->belongsTo(Student::class);
    }

    // Define the relationship with Booking
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    // Define the relationship with Payments
    public function payments()
    {
        return $this->hasMany(Payments::class);
    }
}
