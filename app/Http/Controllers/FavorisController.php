<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favoris;
class FavorisController extends Controller
{
    public function index()
    {
        return Favoris::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'enseignant_id' => 'required|exists:enseignants,id',
        ]);

        $favoris = Favoris::create($validated);

        return response()->json($favoris, 201);
    }

    public function show($id)
    {
        return Favoris::find($id);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'student_id' => 'sometimes|exists:students,id',
            'enseignant_id' => 'sometimes|exists:enseignants,id',
        ]);

        $favoris = Favoris::find($id);
        $favoris->update($validated);

        return $favoris;
    }

    public function destroy($id)
    {
        return Favoris::destroy($id);
    }
}
