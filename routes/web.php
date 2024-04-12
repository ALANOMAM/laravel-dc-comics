<?php

use App\Http\Controllers\ComicController;
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

//modo tradizionale in cui avrei gestito le rotte  se i controllers non fossero tìdi tipo resources
//avrei dovuto farne una per ogni url o pagina
//Route::get('/',  [ComicController::class, "index"])->name("home");

//questo è come si gestiscono le rotte quando usiamo i controllers tipo "resources"
// questo ci crea tutte le rotte(create, store, show, update,delete) in modo automatico
//perchè è compreso nel pachetto.
Route::resource('comics',ComicController::class);