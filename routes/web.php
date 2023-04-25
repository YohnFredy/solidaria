<?php

use App\Http\Controllers\Office\ConfirmationPayu;
use App\Http\Controllers\Office\Response;
use App\Http\Controllers\Office\Solidaria;
use App\Http\Controllers\Proof;
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

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/', function () {
    return view('index');
})->name('index');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

/* Route::get('{sponsor_user}/{user_side}', [Affiliate::class, 'create']); */

Route::get('solidaria',[Solidaria::class, 'index'])->name('office.solidaria');
Route::get('response-payu',[Response::class, 'index']);
Route::post('confirmation-payu',[ConfirmationPayu::class, 'index']);

Route::post('/upload-image', [Proof::class, 'upload'])->name('upload.image');

Route::get('proof',[Proof::class, 'show']);