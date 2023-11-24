<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\ProfileController;
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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin
Route::get('/admin/dashboard',[AdminController::class,'dashboard'])->middleware(['auth','role:admin']);
Route::get('/admin/logout',[AdminController::class,'destroy'])->middleware(['auth','role:admin'])->name('admin.logout');
Route::get('/admin/login',[AdminController::class,'login'])->name('admin.login');

Route::controller(AdminController::class)->prefix('/admin')->as('admin.')->middleware(['auth','role:admin'])->group(function () {
    Route::get('/profile', 'profile')->name('profile');
    Route::post('/profile/update', 'update')->name('profile.update');
    Route::get('/change/password','changePassword')->name('change.passowrd');
    Route::post('/update/password', 'updatePassword')->name('update.password');

});
// End
Route::get('/agent/dashboard',[AgentController::class,'dashboard'])->middleware((['auth','role:agent']));

require __DIR__.'/auth.php';
