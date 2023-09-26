<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\UserController;
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

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/filter', [HomeController::class, 'filter'])->name('filter');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// user
Route::get('/user', [UserController::class, 'index'])->name('user.index');

// cars
Route::get('cars', [CarController::class, 'index'])->name('cars.index');

// rentals
Route::get('/my-booked', [RentalController::class, 'index'])->name('rentals.index');
Route::get('/booked/{rental}', [RentalController::class, 'show'])->name('rentals.show');
Route::get('/booking/create/{car}/{start_at_date_filter}/{end_at_date_filter}/{start_at_time_filter}/{end_at_time_filter}', [RentalController::class, 'create'])->name('rentals.create');
Route::post('/booking/create/{car}/{driver}/{start_at_date_filter}/{end_at_date_filter}/{start_at_time_filter}/{end_at_time_filter}', [RentalController::class, 'store'])->name('rentals.store');

// drivers
Route::get('/driver{driver}', [DriverController::class, 'show'])->name('drivers.show');
