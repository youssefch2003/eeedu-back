<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Session;
class SessionController extends Controller
{
    public function index()
    {
        return Session::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'planning_id' => 'required|exists:plannings,id',
            'enseignant_id' => 'required|exists:enseignants,id',
            'student_id' => 'required|exists:students,id',
            'date' => 'required|date',
            'time_debut' => 'required|date_format:H:i',
            'time_fin' => 'required|date_format:H:i',
        ]);

        $session = Session::create($validated);

        return response()->json($session, 201);
    }

    public function show($id)
    {
        return Session::find($id);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'planning_id' => 'sometimes|exists:plannings,id',
            'enseignant_id' => 'sometimes|exists:enseignants,id',
            'student_id' => 'sometimes|exists:students,id',
            'date' => 'sometimes|date',
            'time_debut' => 'sometimes|date_format:H:i',
            'time_fin' => 'sometimes|date_format:H:i',
        ]);

        $session = Session::find($id);
        $session->update($validated);

        return $session;
    }

    public function destroy($id)
    {
        return Session::destroy($id);
    }
}
