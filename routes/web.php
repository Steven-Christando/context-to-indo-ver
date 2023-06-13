<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API;

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
    return view('home',["title" => "Konteks"]);
});

Route::get('/init', [API::class, 'init']);
Route::get('/word/{word}', [API::class, 'word']);
Route::get('/rank/{word}', [API::class, 'rank']);
Route::get('/regenerate', [API::class, 'regenerate']);
Route::get('/answer', [API::class, 'answer']);
Route::get('/hint/{top}', [API::class, 'hint']);
