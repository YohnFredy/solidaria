<?php

use App\Http\Controllers\ContactanosController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\Office\ConfirmationPayu;
use App\Http\Controllers\Office\IndexController;
use App\Http\Controllers\Office\Response;
use App\Http\Controllers\Office\Solidaria;
use App\Http\Controllers\Office\UnilevelData;
use App\Http\Controllers\Proof;
use App\Http\Controllers\Register\Affiliate;
use App\Http\Livewire\Office\BinaryTree;
use App\Http\Livewire\Office\UnilevelTree;
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
    return view('index');
})->name('index');

Route::get('opportunity', function () {
    return view('principal.opportunity');
})->name('principal.opportunity');


Route::get('contactanos', [ContactanosController::class, 'index'])->name('contactanos.index');
Route::post('contactanos', [ContactanosController::class, 'store'])->name('contactanos.store');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('office', [IndexController::class, 'index'])->name('office.index');
    Route::get('binary-tree', BinaryTree::class)->name('tree.binary');
    Route::get('unilevel-tree', UnilevelTree::class)->name('tree.unilevel');
    route::get('unilevel-data', [UnilevelData::class, 'index'])->name('tree.unilevel_data');
    /* Route::get('Solidaria',[RifaSolidaria::class, 'index'])->name('office.rifa');
    Route::get('response-payu',[Response::class, 'index']);  */
    Route::get('solidaria', [Solidaria::class, 'index'])->name('office.solidaria');
});

Route::get('response-payu', [Response::class, 'index']);
Route::post('confirmation-payu', [ConfirmationPayu::class, 'index']);

Route::get('proof', [Proof::class, 'create']);

Route::get('upload-image', [ImageUploadController::class, 'index']);
Route::post('upload-image', [ImageUploadController::class, 'store'])->name('image.store');

Route::get('{sponsor_user}/{user_side}', [Affiliate::class, 'create']);
