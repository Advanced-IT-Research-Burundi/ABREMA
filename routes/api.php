<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::apiResource('produits', App\Http\Controllers\ProduitController::class);

Route::apiResource('partenaires', App\Http\Controllers\PartenaireController::class);

Route::apiResource('point-entrees', App\Http\Controllers\PointEntreeController::class);

Route::apiResource('colis', App\Http\Controllers\ColisController::class);

Route::apiResource('avis-publics', App\Http\Controllers\AvisPublicController::class);

Route::apiResource('notifications', App\Http\Controllers\NotificationController::class);

Route::apiResource('texte-reglementaires', App\Http\Controllers\TexteReglementaireController::class);

Route::apiResource('equipe-directions', App\Http\Controllers\EquipeDirectionController::class);

Route::apiResource('publications', App\Http\Controllers\PublicationController::class);

Route::apiResource('sliders', App\Http\Controllers\SliderController::class);

Route::apiResource('image-labos', App\Http\Controllers\ImageLaboController::class);

Route::apiResource('users', App\Http\Controllers\UserController::class);
