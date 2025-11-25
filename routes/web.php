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
use App\Http\Controllers\ColisController;
use App\Http\Controllers\user\AboutController;
use App\Http\Controllers\user\ImportExportController;
use App\Http\Controllers\user\InspectionController;
use App\Http\Controllers\user\LaboController;
use App\Http\Controllers\user\MedicamentController;
use App\Http\Controllers\user\ServicesController;
use App\Http\Controllers\user\VigilanceController;

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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('AvisPublics', AvisPublicController::class); 
    Route::resource('Colis', ColisController::class);
    Route::resource('equipes', EquipeDirectionController::class);
    Route::resource('imagelabos', ImageLaboController::class);
    Route::resource('notifications', NotificationController::class);
    Route::resource('partenaires', PartenaireController::class);
    Route::resource('points', PointEntreeController::class);
    Route::resource('produits', ProduitController::class);
    Route::resource('publications', PublicationController::class);
    Route::resource('Sliders', SliderController::class);
    Route::resource('textes', TexteReglementaireController::class);
});

require __DIR__.'/auth.php';


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/avis', [HomeController::class, 'avis'])->name('avis');
Route::get('/publication', [HomeController::class, 'publication'])->name('publication');

Route::group(['prefix' => 'about'], function () {
    Route::get('/profilabrema', [AboutController::class, 'profilabrema'])->name('about.profilabrema');
    Route::get('/qms', [AboutController::class, 'qms'])->name('about.qms');
    Route::get('/equipe', [AboutController::class, 'equipe'])->name('about.equipe');
    Route::get('/fonction', [AboutController::class, 'fonction'])->name('about.fonction');
    Route::get('/organigramme', [AboutController::class, 'organigramme'])->name('about.organigramme');
});

Route::group(['prefix' => 'service'], function () {
    Route::get('/colis', [ServicesController::class, 'colis'])->name('service.colis'); 
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
    Route::get('/notofication', [MedicamentController::class, 'notification'])->name('medicament.notification');
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












