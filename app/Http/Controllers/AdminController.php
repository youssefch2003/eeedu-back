<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return Admin::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email',
            'mot_de_passe' => 'required|string|min:6',
        ]);

        // Hash the password
        $validated['mot_de_passe'] = Hash::make($validated['mot_de_passe']);

        $admin = Admin::create($validated);

        return response()->json($admin, 201);
    }

    public function show($id)
    {
        return Admin::find($id);
    }

    public function update(Request $request, $id)
    {
        $admin = Admin::find($id);

        $validated = $request->validate([
            'nom' => 'sometimes|string|max:255',
            'prenom' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|unique:admins,email,' . $id,
            'mot_de_passe' => 'sometimes|string|min:6',
        ]);

        if (isset($validated['mot_de_passe'])) {
            // Hash the password
            $validated['mot_de_passe'] = Hash::make($validated['mot_de_passe']);
        }

        $admin->update($validated);

        return $admin;
    }

    public function destroy($id)
    {
        return Admin::destroy($id);
    }
}
