<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id', 'session_id', 'booking_id', 'amount', 'currency',
        'payment_method', 'status', 'transaction_id'
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

    // Define the relationship with Booking
    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
