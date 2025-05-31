<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MachineController;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\MachineWorkController;
use App\Http\Controllers\MachineTypeController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\ReasonEndController;
use App\Http\Controllers\MaintenanceTypeController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('machines', MachineController::class)->except(['show']);
});


Route::middleware(['auth'])->group(function () {
    Route::resource('maintenances', MaintenanceController::class)->except(['show']);
});

Route::middleware(['auth'])->group(function () {
    Route::resource('works', WorkController::class)->except(['show']);
});

Route::middleware(['auth'])->group(function () {
    Route::resource('machineWorks', MachineWorkController::class)->except(['show']);
    Route::get('machineWorks/{machineWork}/finish', [MachineWorkController::class, 'finish'])->name('machineWorks.finish');
    Route::put('machineWorks/{machineWork}/storeFinish', [MachineWorkController::class, 'storeFinish'])->name('machineWorks.storeFinish');

});
Route::middleware(['auth'])->group(function () {
    Route::resource('machineTypes', MachineTypeController::class)->except(['show']);
});
Route::middleware(['auth'])->group(function () {
    Route::resource('reasonEnds', ReasonEndController::class)->except(['show']);
});
Route::middleware(['auth'])->group(function () {
    Route::resource('provinces', ProvinceController::class)->except(['show']);
});
Route::middleware(['auth'])->group(function () {
    Route::resource('maintenanceTypes', MaintenanceTypeController::class)->except(['show']);
});



require __DIR__.'/auth.php';
