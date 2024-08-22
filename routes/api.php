<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminPaymentsController;
use App\Http\Controllers\FavorisController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\PlanningController;
use App\Http\Controllers\SessionController;

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
Route::post('/register/enseignants', [AuthController::class, 'registerEnseignant']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/login-enseignant', [AuthController::class, 'loginEnseignant']);
Route::get('/students/{id}', [StudentController::class, 'show']);
Route::get('/students/search/{name}', [StudentController::class, 'search']);
Route::get('/students', [StudentController::class, 'index']); 






// =================protected routes=============
Route::group(['middleware' => ['auth:sanctum']], function () {   
    Route::put('/students/{id}', [StudentController::class, 'update']);
    Route::delete('/students/{id}', [StudentController::class, 'destroy']);
    Route::post('/logout', [AuthController::class, 'logout']);

    // Enseignant routes
    Route::get('/enseignants', [EnseignantController::class, 'index']);
    Route::post('/enseignants', [EnseignantController::class, 'store']);
    Route::get('/enseignants/{id}', [EnseignantController::class, 'show']);
    Route::put('/enseignants/{id}', [EnseignantController::class, 'update']);
    Route::delete('/enseignants/{id}', [EnseignantController::class, 'destroy']);

    // Admin routes
    Route::get('/admins', [AdminController::class, 'index']);
    Route::post('/admins', [AdminController::class, 'store']);
    Route::get('/admins/{id}', [AdminController::class, 'show']);
    Route::put('/admins/{id}', [AdminController::class, 'update']);
    Route::delete('/admins/{id}', [AdminController::class, 'destroy']);

    // AdminPayments routes
    Route::get('/admin-payments', [AdminPaymentsController::class, 'index']);
    Route::post('/admin-payments', [AdminPaymentsController::class, 'store']);
    Route::get('/admin-payments/{id}', [AdminPaymentsController::class, 'show']);
    Route::put('/admin-payments/{id}', [AdminPaymentsController::class, 'update']);
    Route::delete('/admin-payments/{id}', [AdminPaymentsController::class, 'destroy']);

    // Favoris routes
    Route::get('/favoris', [FavorisController::class, 'index']);
    Route::post('/favoris', [FavorisController::class, 'store']);
    Route::get('/favoris/{id}', [FavorisController::class, 'show']);
    Route::put('/favoris/{id}', [FavorisController::class, 'update']);
    Route::delete('/favoris/{id}', [FavorisController::class, 'destroy']);

    // Booking routes
    Route::get('/bookings', [BookingController::class, 'index']);
    Route::post('/bookings', [BookingController::class, 'store']);
    Route::get('/bookings/{id}', [BookingController::class, 'show']);
    Route::put('/bookings/{id}', [BookingController::class, 'update']);
    Route::delete('/bookings/{id}', [BookingController::class, 'destroy']);

    // Payments routes
    Route::get('/payments', [PaymentsController::class, 'index']);
    Route::post('/payments', [PaymentsController::class, 'store']);
    Route::get('/payments/{id}', [PaymentsController::class, 'show']);
    Route::put('/payments/{id}', [PaymentsController::class, 'update']);
    Route::delete('/payments/{id}', [PaymentsController::class, 'destroy']);

    // Planning routes
    Route::get('/plannings', [PlanningController::class, 'index']);
    Route::post('/plannings', [PlanningController::class, 'store']);
    Route::get('/plannings/{id}', [PlanningController::class, 'show']);
    Route::put('/plannings/{id}', [PlanningController::class, 'update']);
    Route::delete('/plannings/{id}', [PlanningController::class, 'destroy']);

    // Session routes
    Route::get('/sessions', [SessionController::class, 'index']);
    Route::post('/sessions', [SessionController::class, 'store']);
    Route::get('/sessions/{id}', [SessionController::class, 'show']);
    Route::put('/sessions/{id}', [SessionController::class, 'update']);
    Route::delete('/sessions/{id}', [SessionController::class, 'destroy']);
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
