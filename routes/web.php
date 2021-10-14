<?php

use App\Http\Controllers\EtudiantController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name("accueil");

Route::get('/etudiant', [EtudiantController::class,"index"])->name("etudiant"); //index vas nous permettre de lister nos elts
//Route pour la création d'un user via le formulaire
Route::get('/etudiant/create',[EtudiantController::class,"create"])->name('etudiant.create');
//Route pour d'ajout pour le traitement
Route::post('/etudiant/create',[EtudiantController::class, "store"])->name('etudiant.ajouter');
//Route pour la suppresion
Route::delete('etudiant/{etudiant}',[EtudiantController::class,"delete"])->name("etudiant.supprimer");
//Route pour le triatement de la modification
Route::put('etudiant/{etudiant}', [EtudiantController::class,"update"])->name('etudiant.update');
//Route pour affcihage du formulaire de modification
Route::get('etudiant/{etudiant}',[EtudiantController::class,'edit'])->name('etudiant.edit');
