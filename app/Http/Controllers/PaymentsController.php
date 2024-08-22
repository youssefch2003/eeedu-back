<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payments;
class PaymentsController extends Controller
{
    public function index()
    {
        return Payments::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'session_id' => 'required|exists:sessions,id',
            'booking_id' => 'required|exists:bookings,id',
            'amount' => 'required|numeric|min:0',
            'currency' => 'required|string|max:255',
            'payment_method' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'transaction_id' => 'nullable|string|max:255',
        ]);

        $payment = Payments::create($validated);

        return response()->json($payment, 201);
    }

    public function show($id)
    {
        return Payments::find($id);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'student_id' => 'sometimes|exists:students,id',
            'session_id' => 'sometimes|exists:sessions,id',
            'booking_id' => 'sometimes|exists:bookings,id',
            'amount' => 'sometimes|numeric|min:0',
            'currency' => 'sometimes|string|max:255',
            'payment_method' => 'sometimes|string|max:255',
            'status' => 'sometimes|string|max:255',
            'transaction_id' => 'nullable|string|max:255',
        ]);

        $payment = Payments::find($id);
        $payment->update($validated);

        return $payment;
    }

    public function destroy($id)
    {
        return Payments::destroy($id);
    }
}
