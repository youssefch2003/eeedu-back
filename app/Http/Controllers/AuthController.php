<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function registerStudent(Request $request)
    {
        try {
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

            // Generate token
            $token = $student->createToken('StudentToken')->plainTextToken;

            // Return student and token
            return response()->json([
                'student' => $student,
                'token' => $token
            ], 200);

        } catch (ValidationException $e) {
            // Handle validation exceptions
            return response()->json([
                'error' => 'Validation failed',
                'message' => $e->validator->errors()
            ], 422);
        }
    }

    public function login(Request $request) {
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        // Check email
        $student = Student::where('email', $fields['email'])->first();

        // Check password
        if(!$student || !Hash::check($fields['password'], $student->mot_de_passe)) {
            return response([
                'message' => 'Bad creds'
            ], 401);
        }

        $token = $student->createToken('StudentToken')->plainTextToken;

        $response = [
            'student' => $student,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function logout (Request $req){
        auth()->user()->tokens()->delete();

        return[
            'message'=>'logged out' 
        ];
    }
}
