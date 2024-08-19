<?php

namespace App\Http\Controllers;
use App\Http\Controllers\StudentController;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Student::all();

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
           // Validate the request data
    $validated = $request->validate([
        'nom' => 'required|string|max:255',
        'prenom' => 'required|string|max:255',
        'email' => 'required|email|unique:students,email',
        'telephone' => 'nullable|string|max:15',
        'mot_de_passe' => 'required|string|min:6',
        'date_naissance' => 'required|date',
        'genre' => 'nullable|string|max:10',
    ]);

    // Hash the password
    $validated['mot_de_passe'] = Hash::make($validated['mot_de_passe']);

    // Create and return the student record
    $student = Student::create($validated);

    return response()->json($student, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Student::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $student = Student::find($id);
        $student->update($request->all());

        return $student;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return Student::destroy($id);
    }
    /**
     * Search a student by his name 
     */
    public function search(string $name)
    {
        return Student::where('nom','like','%' .$name. '%')->get();
    }
}
