<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TodoApiController;
use App\Http\Controllers\Api\ProjectApiController;
use App\Http\Controllers\Api\TaskApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::get('/projects', [ProjectApiController::class, 'index']);
Route::get('/projects/{id}', [ProjectApiController::class, 'show']);
Route::post('/projects', [ProjectApiController::class, 'store']);
Route::put('/projects/{id}', [ProjectApiController::class, 'update']);
Route::delete('/projects/{id}', [ProjectApiController::class, 'destroy']);

Route::get('/tasks', [TaskApiController::class, 'index']);
Route::post('/task/status', [TaskApiController::class, 'status']);
Route::get('/tasks/{id}', [TaskApiController::class, 'show']);
Route::post('/tasks', [TaskApiController::class, 'store']);
Route::put('/tasks/{id}', [TaskApiController::class, 'update']);
Route::delete('/tasks/{id}', [TaskApiController::class, 'destroy']);

// Route::get('/projects', [ProjectApiController::class, 'index']);
// Route::get('/projects/{id}', [ProjectApiController::class, 'show']);

// Route::get('/tasks', [TodoApiController::class, 'index']);
// Route::get('/tasks/{id}', [TodoApiController::class, 'show']);



// Route::get('tasks', [TodoApiController::class, 'index']);
// Route::get('tasks/{id}', [TodoApiController::class, 'edit']);
// Route::post('tasks', [TodoApiController::class, 'store']);
// Route::delete('tasks/{id}', [TodoApiController::class, 'destroy']);
// Route::patch('tasks/{id}/status', [TodoApiController::class, 'toggleStatus']);
// Route::put('tasks/{id}', [TodoApiController::class, 'update']);
