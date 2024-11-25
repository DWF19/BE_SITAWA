<?php

use App\Http\Controllers\api\ComplaintController;
use App\Http\Controllers\api\ProductionController;
use App\Http\Controllers\api\ReplyController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::apiResource('/complaints', ComplaintController::class);
Route::apiResource('/replies', ReplyController::class);
Route::apiResource('/productions', ProductionController::class);
Route::get('/productionsByUser/{user_id}', [ProductionController::class, 'showByUserId']);
Route::get('/repliesByComplaint/{complaint_id}', [ReplyController::class, 'showByComplaintId']);
Route::get('/user', [AuthController::class, 'indexKecamatan']);

// Route::post('register', [AuthController::class, 'register']);
// Route::post('login', [AuthController::class, 'login']);

// Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::put('/user/{id}', [AuthController::class,'update']);
Route::delete('/user/{id}', [AuthController::class,'delete']);
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/profile', [AuthController::class, 'profile']);
});


// Route::middleware(['auth:sanctum'])->group(function () {
//     Route::post('logout', [AuthController::class, 'logout']);

//     Route::middleware('role:admin')->get('/admin', function () {
//         return response()->json(['message' => 'Admin access']);
//     });

//     Route::middleware('role:user')->get('/user', function () {
//         return response()->json(['message' => 'User access']);
//     });
// });
