<?php

use App\Http\Controllers\PDS\CivilServiceEligibilityController;
use App\Http\Controllers\PDS\EducationalBackgroundController;
use App\Http\Controllers\PDS\FamilyBackgroundController;
use App\Http\Controllers\PDS\PersonalInformationController;
use App\Http\Controllers\PDS\WorkExperienceController;
use App\Models\CivilServiceEligibility;
use Illuminate\Support\Facades\Route;


// PDS Controller
Route::prefix('profile/pds')
->middleware('auth')
->name('profile.pds.')
->group(function() {

    // personal information
    Route::name('personal_information.store_or_update')->post('/personal_information', [PersonalInformationController::class, 'store_or_update']);
    Route::name('personal_information.edit')->get('/personal_information/edit', [PersonalInformationController::class, 'edit']);

    // family background
    Route::name('family_background.edit')->get('/family_background/edit', [FamilyBackgroundController::class, 'edit']);
    Route::name('family_background.store_or_update')->post('/family_background/store_or_update', [FamilyBackgroundController::class, 'store_or_update']);
    Route::name('family_background.store_child')->post('/family_background/store_child', [FamilyBackgroundController::class, 'store_child']);
    Route::name('children.delete')->delete('/family_background/children/{children}/delete', [FamilyBackgroundController::class, 'delete_child']);
    
    // educational background
    Route::name('educational_background.edit')->get('/educational_background/edit', [EducationalBackgroundController::class, 'edit']);
    Route::name('educational_background.store_or_update')->post('/educational_background/store_or_update', [EducationalBackgroundController::class, 'store_or_update']);

    // civil service eligiblity
    Route::resource('civil_service_eligibility', CivilServiceEligibilityController::class)->only(['index', 'store', 'destroy', 'create', 'edit', 'update']);

    // work experience
    Route::resource('work_experience', WorkExperienceController::class)->only(['index', 'store', 'destroy', 'create', 'edit', 'update']);
});





?>