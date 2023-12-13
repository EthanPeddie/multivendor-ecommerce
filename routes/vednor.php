<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VendorController;



Route::get('/vendor/dashboard',[VendorController::class,'dashboard'])->middleware((['auth','role:vendor']));

require __DIR__.'/auth.php';
