<?php

use App\Http\Controllers\EquipeDirectionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageLaboController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PartenaireController;
use App\Http\Controllers\PointEntreeController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\TexteReglementaireController;
use App\Http\Controllers\AvisPublicController;
use App\Http\Controllers\user\AboutController;
use App\Http\Controllers\user\ImportExportController;
use App\Http\Controllers\user\InspectionController;
use App\Http\Controllers\user\LaboController;
use App\Http\Controllers\user\MedicamentController;
use App\Http\Controllers\user\ServicesController;
use App\Http\Controllers\user\VigilanceController;
use App\Http\Controllers\ActualiteController;
use App\Http\Controllers\ColisController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {

    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('produits', ProduitController::class);
    Route::resource('partenaires', PartenaireController::class);
    Route::resource('point-entrees', PointEntreeController::class);
    Route::resource('avis-publics', AvisPublicController::class);
    Route::resource('notifications', NotificationController::class);
    Route::resource('texte-reglementaires', TexteReglementaireController::class);
    Route::resource('equipe-directions', EquipeDirectionController::class);
    Route::resource('publications', PublicationController::class);
    Route::resource('sliders', SliderController::class);
    Route::resource('image-labo', ImageLaboController::class);
    Route::resource('actualites', ActualiteController::class);
});

require __DIR__ . '/auth.php';


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/information/evenement', [HomeController::class, 'evenement'])->name('information.evenement');
Route::get('/information/actualite', [HomeController::class, 'actualite'])->name('information.actualite');
Route::get('/information/document', [HomeController::class, 'document'])->name('information.document');

Route::group(['prefix' => 'about'], function () {
    Route::get('/profilabrema', [AboutController::class, 'profilabrema'])->name('about.profilabrema');
    Route::get('/qms', [AboutController::class, 'qms'])->name('about.qms');
    Route::get('/equipe', [AboutController::class, 'equipe'])->name('about.equipe');
    Route::get('/fonction', [AboutController::class, 'fonction'])->name('about.fonction');
    Route::get('/organigramme', [AboutController::class, 'organigramme'])->name('about.organigramme');
});

Route::group(['prefix' => 'service'], function () {
    Route::get('/colis', [ColisController::class, 'index'])->name('colis.index');
    Route::post('/colis', [ColisController::class, 'store'])->name('colis.store');
});

Route::group(['prefix' => 'importexport'], function () {
    Route::get('/demande', [ImportExportController::class, 'demande'])->name('importexport.demande');
    Route::get('/pointentree', [ImportExportController::class, 'pointentree'])->name('importexort.pointentree');
    Route::get('/texteimport', [ImportExportController::class, 'texteimport'])->name('importexport.texteimport');
});
Route::group(['prefix' => 'inspection'], function () {
    Route::get('/etablissement', [InspectionController::class, 'etablissement'])->name('inspection.etablissement');
    Route::get('/gdp', [InspectionController::class, 'GDP'])->name('inspection.GDP');
    Route::get('/gmp', [InspectionController::class, 'GMP'])->name('inspection.GMP');
});

Route::group(['prefix' => 'labocontrol'], function () {
    Route::get('/aboutlabo', [LaboController::class, 'aboutlabo'])->name('labocontrol.aboutlabo');
    Route::get('/servicelabo', [LaboController::class, 'servicelabo'])->name('labocontrol.servicelabo');
});
Route::group(['prefix' => 'medicament'], function () {
    Route::get('/notification', [MedicamentController::class, 'notification'])->name('medicament.notification');
    Route::get('/produits', [MedicamentController::class, 'produit'])->name('medicament.produits');
    Route::get('/textemedicament', [MedicamentController::class, 'textemedicament'])->name('medicament.textemedicament');
});

Route::group(['prefix' => 'vigilance'], function () {
    Route::get('/notofication', [VigilanceController::class, 'delegue'])->name('vigilance.delegue');
    Route::get('/notificationES', [VigilanceController::class, 'notificationES'])->name('vigilance.notificationES');
    Route::get('/rappel', [VigilanceController::class, 'rappel'])->name('vigilance.rappel');
    Route::get('/signalement', [VigilanceController::class, 'signalement'])->name('vigilance.signalement');
    Route::get('/textevigilance', [VigilanceController::class, 'texte'])->name('vigilance.textevigilance');
});
