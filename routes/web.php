<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\PokemonController::class, 'index'])->name('viewPoke');
// Route::get('/', function () {
//     return view('viewPoke');
// });
