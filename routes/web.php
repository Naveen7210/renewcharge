<?php

use App\Http\Controllers\ApiCirclecodeController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\ApiProviderController;
use App\Http\Controllers\ApiroutesController;
use App\Http\Controllers\CircleCodesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProvidercodeController;
use App\Http\Controllers\RechargesController;
use App\Http\Controllers\userController;
use App\Http\Controllers\ProvidersController;
use App\Http\Controllers\ServiceProvidersController;
use App\Http\Controllers\ServiceTypesController;
use App\Http\Controllers\walletController;
use Carbon\Laravel\ServiceProvider;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('/members', userController::class);

Route::resource('/wallet', walletController::class);

Route::resource('/apiwallet', ApiController::class);

Route::resource('/apicircle', ApiCirclecodeController::class);

Route::resource('/providers', ProvidersController::class);
    
Route::resource('/serviceproviders', ServiceProvidersController::class);

Route::resource('/apiroutes', ApiroutesController::class);

Route::resource('/recharges', RechargesController::class);

Route::resource('/servicetype', ServiceTypesController::class);

Route::resource('/circlecodes', CircleCodesController::class);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
