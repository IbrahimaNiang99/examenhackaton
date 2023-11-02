<?php

use App\Http\Controllers\CalendrierController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth', 'admin'])->group(function () {
 
    Route::get('/utilisateur/liste', [App\Http\Controllers\UserController::class, 'listeUsers'])->name('listeutilisateur');
    Route::post('/utilisateur/ajout', [App\Http\Controllers\UserController::class, 'ajoututilisateur'])->name('ajoututilisateur');
    
    Route::get('/utilisateur/editapprenant/{id}', [App\Http\Controllers\UserController::class, 'editapprenant'])->name('editapprenant');
    Route::post('/utilisateur/updateapprenant', [App\Http\Controllers\UserController::class, 'updateapprenant'])->name('updateapprenant');
    Route::get('/utilisateur/deleteapprenant/{id}', [App\Http\Controllers\UserController::class, 'delete'])->name('deleteapprenant');
    
    Route::get('/apprenant/listeapprenant', [App\Http\Controllers\UserController::class, 'listeApprenant'])->name('listeApprenant');
    
    Route::get('/professeur/listeprof', [App\Http\Controllers\ProfesseurController::class, 'liste'])->name('listeprof');
    Route::get('/professeur/ajoutprof', [App\Http\Controllers\ProfesseurController::class, 'formulaireAjoutprof'])->name('formulaireAjoutprof');
    Route::post('/professeur/ajoutprof', [App\Http\Controllers\ProfesseurController::class, 'ajout'])->name('ajout');
    Route::get('/professeur/deleteprof/{id}', [App\Http\Controllers\ProfesseurController::class, 'deleteprof'])->name('deleteprof');
    Route::get('/professeur/changeretatprof/{id}', [App\Http\Controllers\ProfesseurController::class, 'changeretatprof'])->name('changeretatprof');
    Route::get('/professeur/detailsprof/{id}', [App\Http\Controllers\ProfesseurController::class, 'detailsprof'])->name('detailsprof');
    
    Route::get('/utilisateur/editprof/{id}', [App\Http\Controllers\ProfesseurController::class, 'editprof'])->name('editprof');
    Route::post('/utilisateur/updateprof', [App\Http\Controllers\ProfesseurController::class, 'updateprof'])->name('updateprof');

    Route::get('/calendrier/liste', [CalendrierController::class, 'listecalendrier'])->name('listecalendrier');
    Route::post('/calendrier/liste', [CalendrierController::class, 'ajoutCalendar'])->name('ajoutCalendar');
    

    Route::get('/cours/listecours', [App\Http\Controllers\CoursController::class, 'liste'])->name('listecours');
    Route::put('/cours/listecours/{id}', [App\Http\Controllers\CoursController::class, 'updatecours'])->name('updatecours');
    Route::post('/cours/listecours', [App\Http\Controllers\CoursController::class, 'ajoutCour'])->name('ajoutCour');
    Route::get('/cours/deletecours/{id}', [App\Http\Controllers\CoursController::class, 'deletecours'])->name('deletecours');
    Route::get('/cours/detailscour/{id}', [App\Http\Controllers\CoursController::class, 'detailscour'])->name('detailscour');

    Route::get('/unauthorizedaccess', [App\Http\Controllers\UserController::class, 'unauthorizedaccess'])->name('unauthorizedaccess');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
    Route::get('/changermdp/{id}', [App\Http\Controllers\UserController::class, 'changermdp'])->name('changermdp');
    

});

Route::get('/unauthorizedaccess', [App\Http\Controllers\UserController::class, 'unauthorizedaccess'])->name('unauthorizedaccess');

Route::middleware(['secure.after.logout'])->group(function () {
    Route::get('/cours/listecours', [App\Http\Controllers\CoursController::class, 'liste'])->name('listecours');
    Route::get('/cours/detailscour/{id}', [App\Http\Controllers\CoursController::class, 'detailscour'])->name('detailscour');
    Route::get('/calendrier/liste', [CalendrierController::class, 'listecalendrier'])->name('listecalendrier');

    Route::get('/unauthorizedaccess', [App\Http\Controllers\UserController::class, 'unauthorizedaccess'])->name('unauthorizedaccess');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

});