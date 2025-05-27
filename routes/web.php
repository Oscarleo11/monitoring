<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\ReminderController;

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
    Route::resource('contracts', \App\Http\Controllers\ContractController::class);
    Route::get('/contracts/create', [ContractController::class, 'create'])->name('contracts.create');
    Route::resource('contracts', ContractController::class);
});

Route::middleware(['auth'])->group(function () {
    Route::get('reminders/create/{contract}', [\App\Http\Controllers\ReminderController::class, 'create'])->name('reminders.create');
    Route::post('reminders', [\App\Http\Controllers\ReminderController::class, 'store'])->name('reminders.store');
    Route::get('/reminders/create/{contractId}', [ReminderController::class, 'create'])->name('reminders.create');
    Route::get('/reminders/create/{contract}', [ReminderController::class, 'create'])->name('reminders.create');
    Route::get('/contracts/{contract}/reminders/create', [ReminderController::class, 'create'])->name('reminders.create');
    Route::post('/contracts/{contract}/reminders', [ReminderController::class, 'store'])->name('reminders.store');
});

Route::get('/test-reminder', function () {
    $contract = App\Models\Contract::first();
    return new App\Mail\ReminderMail(
        $contract->title,
        $contract->description,
        $contract->start_date,
        $contract->end_date
    );
});




require __DIR__ . '/auth.php';
