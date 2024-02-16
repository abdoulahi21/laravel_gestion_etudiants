<?php

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
    return view('auth.login');
});

// Authentification
Route::get('/login',[\App\Http\Controllers\AuthController::class,'login'])->name('auth.login');
Route::delete('/logout',[\App\Http\Controllers\AuthController::class,'logout'])->name('auth.logout');
Route::post('/login',[\App\Http\Controllers\AuthController::class,'doLogin']);
// Etudiant
Route::get('/add_etudiant',[\App\Http\Controllers\StudentController::class,'index'])->name('auth.etudiant')->middleware('auth');
Route::get('/detail/{id}',[\App\Http\Controllers\StudentController::class,'show'])->name('auth.detail')->middleware('auth');
Route::get('/formetudiant',[\App\Http\Controllers\StudentController::class,'create'])->name("auth.formulaireetudiant");
Route::get('/pagemodifier/{id}',[\App\Http\Controllers\StudentController::class,'edit'])->name("auth.modifetudiant");
Route::post('/createetudiant',[\App\Http\Controllers\StudentController::class,'store'])->name("auth.createetudiant");
Route::delete('/deleteetudiant/{objet}',[\App\Http\Controllers\StudentController::class,'destroy'])->name("auth.deleteetudiant");
Route::put('/updateetudiant/{id}',[\App\Http\Controllers\StudentController::class,'update'])->name("auth.updateetudiant");
Route::get('/search',[\App\Http\Controllers\StudentController::class,'search'])->name("search");
Route::post('/import-excel', [\App\Http\Controllers\ExcelImportController::class,'import'])->name('import.excel');
Route::get('/export-excel', [\App\Http\Controllers\StudentController::class,'export'])->name('export.excel');
// Classe
Route::get('/classe',[\App\Http\Controllers\ClasseController::class,'index'])->name('auth.classe')->middleware('auth');
Route::get('/formclasse',[\App\Http\Controllers\ClasseController::class,'create'])->name('auth.formulaireclasse')->middleware('auth');
Route::post('/createclasse',[\App\Http\Controllers\ClasseController::class,'store'])->name('auth.createclasse');
Route::delete('/deleteclasse/{objet}',[\App\Http\Controllers\ClasseController::class,'destroy'])->name("auth.deleteclasse");
