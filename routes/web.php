<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrawlerController;

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
    return redirect('respostas');
});

Route::get('respostas', [CrawlerController::class, 'answers'])->name('answers');
Route::get('buscaresposta', [CrawlerController::class, 'doFindAnswer'])->name('doFindAnswer');
