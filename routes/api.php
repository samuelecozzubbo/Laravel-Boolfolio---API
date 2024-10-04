<?php

use App\Http\Controllers\Api\PageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LeadController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//ROTE API
Route::get('/', [PageController::class, 'index']);
Route::get('/technologies', [PageController::class, 'technologies']);
Route::get('/types', [PageController::class, 'types']);
Route::get('project-by-slug/{slug}', [PageController::class, 'projectBySlug']);
Route::get('project-by-type/{slug}', [PageController::class, 'projectByType']);
Route::post('/send-email', [LeadController::class, 'store']);
