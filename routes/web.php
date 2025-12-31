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
use App\Http\Controllers\AutreDocumentController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\TexteReglementaireController;
use App\Http\Controllers\Admin\TexteMedicamentController;
use App\Http\Controllers\Admin\TexteImportExportController;
use App\Http\Controllers\Admin\TexteVigilanceController;
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
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

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

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('produits/import', [App\Http\Controllers\ProduitController::class, 'import'])->name('produits.import');
    Route::get('produits/template', [App\Http\Controllers\ProduitController::class, 'downloadTemplate'])->name('produits.template');
    Route::resource('produits', ProduitController::class);
    Route::resource('partenaires', PartenaireController::class);
    Route::resource('point-entrees', PointEntreeController::class);
    Route::resource('avis-publics', AvisPublicController::class);
    Route::resource('notifications', NotificationController::class);
    Route::resource('texte', TexteReglementaireController::class);
    Route::resource('texte-medicaments', TexteMedicamentController::class);
    Route::resource('texte-import-export', TexteImportExportController::class);
    Route::resource('texte-vigilance', TexteVigilanceController::class);
    Route::resource('autres-documents', AutreDocumentController::class);
    Route::resource('equipe-directions', EquipeDirectionController::class)->parameters([
        'equipe-directions' => 'equipe'
    ]);
    Route::resource('publications', PublicationController::class);
    Route::resource('sliders', SliderController::class);
    Route::resource('image-labo', ImageLaboController::class);
    Route::resource('actualites', ActualiteController::class);
    Route::resource('clients', ClientsController::class);
    Route::get('colis', [ColisController::class, 'index'])->name('colis.index');
    Route::delete('colis/{colis}', [ColisController::class, 'destroy'])->name('colis.destroy');
});

Route::get('/admin/login', function () {
    return view('auth.login');
})->name('admin.login');

Route::post('/admin/login', [AuthenticatedSessionController::class, 'store'])
    ->name('admin.login.submit');


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
    Route::post('/submitcolis', [ColisController::class, 'store'])->name('submitcolis.store');
    Route::get('/submitcolis',[ServicesController::class,'colis'])->name('submitcolis');
});

Route::group(['prefix' => 'importexport'], function () {
    Route::get('/demande', [ImportExportController::class, 'demande'])->name('importexport.demande');
    Route::get('/pointentree', [ImportExportController::class, 'pointentree'])->name('importexport.pointentree');
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
    Route::get('/notification', [MedicamentController::class, 'notification'])->name('medicament.notifications');
    Route::get('/produits', [MedicamentController::class, 'produit'])->name('medicament.produits');
    Route::get('/textemedicament', [MedicamentController::class, 'textemedicament'])->name('medicament.textemedicament');
    Route::get('/listemedicament', [MedicamentController::class, 'listemedicament'])->name('medicament.listemedicament');
});

Route::group(['prefix' => 'vigilance'], function () {
    Route::get('/notofication', [VigilanceController::class, 'delegue'])->name('vigilance.delegue');
    Route::get('/notificationES', [VigilanceController::class, 'notificationES'])->name('vigilance.notificationES');
    Route::get('/rappel', [VigilanceController::class, 'rappel'])->name('vigilance.rappel');
    Route::get('/signalement', [VigilanceController::class, 'signalement'])->name('vigilance.signalement');
    Route::get('/textevigilance', [VigilanceController::class, 'texte'])->name('vigilance.textevigilance');
});

Route::get('/search', [SearchController::class, 'search'])->name('search');
Route::get('/actualite/{id}', [HomeController::class, 'showActualite'])->name('actualite.show');

Route::get('/produits/export-excel', [MedicamentController::class, 'exportExcel'])->name('produits.export.excel');
