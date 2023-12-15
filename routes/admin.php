<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\SliderController;



Route::get('/admin/dashboard',[AdminController::class,'dashboard'])->middleware(['auth','role:admin']);
Route::get('/admin/logout',[AdminController::class,'destroy'])->middleware(['auth','role:admin'])->name('admin.logout');
Route::get('/admin/login',[AdminController::class,'login'])->name('admin.login');

Route::controller(AdminController::class)->prefix('/admin')->as('admin.')->middleware(['auth','role:admin'])->group(function () {
    Route::get('/profile', 'profile')->name('profile');
    Route::post('/profile/update', 'update')->name('profile.update');
    Route::get('/change/password','changePassword')->name('change.passowrd');
    Route::post('/update/password', 'updatePassword')->name('update.password');

    // Slider

    Route::resource('slider', SliderController::class);

});



require __DIR__.'/auth.php';
