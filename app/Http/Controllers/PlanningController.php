<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Planning;
class PlanningController extends Controller
{
    public function index()
    {
        return Planning::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'enseignant_id' => 'required|exists:enseignants,id',
            'jour' => 'required|string|max:10',
            'matin_debut' => 'nullable|date_format:H:i',
            'matin_fin' => 'nullable|date_format:H:i',
            'apres_midi_debut' => 'nullable|date_format:H:i',
            'apres_midi_fin' => 'nullable|date_format:H:i',
        ]);

        $planning = Planning::create($validated);

        return response()->json($planning, 201);
    }

    public function show($id)
    {
        return Planning::find($id);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'enseignant_id' => 'sometimes|exists:enseignants,id',
            'jour' => 'sometimes|string|max:10',
            'matin_debut' => 'nullable|date_format:H:i',
            'matin_fin' => 'nullable|date_format:H:i',
            'apres_midi_debut' => 'nullable|date_format:H:i',
            'apres_midi_fin' => 'nullable|date_format:H:i',
        ]);

        $planning = Planning::find($id);
        $planning->update($validated);

        return $planning;
    }

    public function destroy($id)
    {
        return Planning::destroy($id);
    }
}
