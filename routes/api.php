<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

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
// =================public routes=============
Route::resource('students',StudentController::class);
Route::get('/students/search/{name}', [StudentController::class, 'search']);
// Route::get('/students', [StudentController::class, 'show']);

// Route::post('/students', [StudentController::class, 'store']);

//================= protected routes=============
Route::group(['middleware'=>['auth:sanctum']], function () {

});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
