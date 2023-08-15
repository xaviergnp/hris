<?php

use App\Http\Controllers\PDS\PersonalInformationController;
// use App\Http\Controllers\PDSController;
use Illuminate\Support\Facades\Route;


// PDS Controller
Route::prefix('pds')
->middleware('auth')
->name('pds.')
->group(function() {
    Route::name('personal_information.store_or_update')->post('/personal_information/{personal_information?}', [PersonalInformationController::class, 'store_or_update']);
    Route::resource('personal_information', PersonalInformationController::class)->only(['edit']);
    // Route::resource('personal_information', PersonalInformationController::class)->only(['store']);
});





?>