<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
// Route::resource('students',StudentController::class);

// =================public routes=============
Route::post('/register/students', [AuthController::class, 'registerStudent']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/students/{id}', [StudentController::class, 'show']);
Route::get('/students/search/{name}', [StudentController::class, 'search']);





//================= protected routes=============
Route::group(['middleware' => ['auth:sanctum']], function () {   
    Route::get('/students', [StudentController::class, 'index']); 
    Route::put('/students/{id}', [StudentController::class, 'update']);
    Route::delete('/students/{id}', [StudentController::class, 'destroy']);
    Route::post('/logout', [AuthController::class, 'logout']);

});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
