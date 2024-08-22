<?php

namespace App\Http\Controllers;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        return Booking::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'session_id' => 'required|exists:sessions,id',
            'enseignant_id' => 'required|exists:enseignants,id',
            'date' => 'required|date',
        ]);

        $booking = Booking::create($validated);

        return response()->json($booking, 201);
    }

    public function show($id)
    {
        return Booking::find($id);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'student_id' => 'sometimes|exists:students,id',
            'session_id' => 'sometimes|exists:sessions,id',
            'enseignant_id' => 'sometimes|exists:enseignants,id',
            'date' => 'sometimes|date',
        ]);

        $booking = Booking::find($id);
        $booking->update($validated);

        return $booking;
    }

    public function destroy($id)
    {
        return Booking::destroy($id);
    }
}
