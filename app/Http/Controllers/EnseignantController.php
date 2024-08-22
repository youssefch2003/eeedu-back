<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enseignant;


class EnseignantController extends Controller
{
    public function index()
    {
        return Enseignant::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:enseignants,email',
            'telephone' => 'nullable|string|max:15',
            'mot_de_passe' => 'required|string|min:6',
            'date_naissance' => 'required|date',
            'genre' => 'nullable|string|max:10',
            'niveau_etude' => 'nullable|string|max:255',
            'photo_diplome' => 'nullable|string|max:255',
            'matiere_a_enseigner' => 'nullable|string|max:255',
            'photo_profile' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'is_active' => 'required|boolean',
        ]);

        $validated['mot_de_passe'] = Hash::make($validated['mot_de_passe']);

        $enseignant = Enseignant::create($validated);

        return response()->json($enseignant, 201);
    }

    public function show($id)
    {
        return Enseignant::find($id);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nom' => 'sometimes|string|max:255',
            'prenom' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|unique:enseignants,email,' . $id,
            'telephone' => 'nullable|string|max:15',
            'mot_de_passe' => 'nullable|string|min:6',
            'date_naissance' => 'sometimes|date',
            'genre' => 'nullable|string|max:10',
            'niveau_etude' => 'nullable|string|max:255',
            'photo_diplome' => 'nullable|string|max:255',
            'matiere_a_enseigner' => 'nullable|string|max:255',
            'photo_profile' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'is_active' => 'sometimes|boolean',
        ]);

        $enseignant = Enseignant::find($id);

        if (isset($validated['mot_de_passe'])) {
            $validated['mot_de_passe'] = Hash::make($validated['mot_de_passe']);
        }

        $enseignant->update($validated);

        return $enseignant;
    }

    public function destroy($id)
    {
        return Enseignant::destroy($id);
    }
}
