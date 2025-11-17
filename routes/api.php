<?php

use App\Http\Controllers\AvisPublicController;
use App\Http\Controllers\ColisController;
use App\Http\Controllers\EquipeDirectionController;
use App\Http\Controllers\ImageLaboController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PartenaireController;
use App\Http\Controllers\PointEntreeController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\TexteReglementaireController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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


Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);


Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [UserController::class, 'logout']);
    Route::apiResource('users', UserController::class);
    Route::apiResource('produits', ProduitController::class);
    Route::apiResource('partenaires', PartenaireController::class);
    Route::apiResource('point-entrees', PointEntreeController::class);
    Route::apiResource('colis', ColisController::class);
    Route::apiResource('avis-publics', AvisPublicController::class);
    Route::apiResource('notifications', NotificationController::class);
    Route::apiResource('texte-reglementaires', TexteReglementaireController::class);
    Route::apiResource('equipe-directions', EquipeDirectionController::class);
    Route::apiResource('publications', PublicationController::class);
    Route::apiResource('sliders', SliderController::class);
    Route::apiResource('image-labos', ImageLaboController::class);
});

   