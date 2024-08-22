<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminPayments extends Model
{
    use HasFactory;
    protected $fillable = [
        'admin_id', 'enseignant_id', 'amount', 'currency',
        'payment_method', 'status', 'transaction_id'
    ];

    // Define the relationship with Admin
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    // Define the relationship with Enseignant
    public function enseignant()
    {
        return $this->belongsTo(Enseignant::class);
    }
}
