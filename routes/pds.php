<?php

use App\Http\Controllers\PDS\FamilyBackgroundController;
use App\Http\Controllers\PDS\PersonalInformationController;
// use App\Http\Controllers\PDSController;
use Illuminate\Support\Facades\Route;


// PDS Controller
Route::prefix('profile/pds')
->middleware('auth')
->name('profile.pds.')
->group(function() {
    Route::name('personal_information.store_or_update')->post('/personal_information/{personal_information?}', [PersonalInformationController::class, 'store_or_update']);
    Route::name('personal_information.edit')->get('/personal_information/edit', [PersonalInformationController::class, 'edit']);

    Route::name('family_background.edit')->get('/family_background/edit', [FamilyBackgroundController::class, 'edit']);
    Route::name('family_background.store_child')->post('/family_background/store_child', [FamilyBackgroundController::class, 'store_child']);
    Route::name('children.delete')->delete('/family_background/children/{children}/delete', [FamilyBackgroundController::class, 'delete_child']);
    
    // Route::resource('personal_information', PersonalInformationController::class)->only(['store']);
});





?>